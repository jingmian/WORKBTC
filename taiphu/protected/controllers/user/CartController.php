<?php

class CartController extends Controller {

    public function beforeAction($action) {
        if (parent::beforeAction($action)) {
            
        }
        if (Yii::app()->session['lang']) {
            $this->changeLanguage(Yii::app()->session['lang']);
        } else {
            if (isset($_GET['lg'])) {
                $this->changeLanguage($_GET['lg']);
            }
        }
        return true;
    }

    public function actionChangeLanguage($lg) {
        $this->changeLanguage($lg);
        if (!Yii::app()->request->isAjaxRequest) {
            $this->redirect(Yii::app()->createUrl('site/index', array('lg' => $lg)));
        }
    }

    public function changeLanguage($lg) {
        if (in_array($lg, array('vi', 'en'))) {
            $this->language = $lg;
            Yii::app()->language = $lg;
            Yii::app()->session['lang'] = $lg;
        } else {
            $this->changeLanguage('vi');
        }
    }

    public function actionOrder() {
        if (isset($_POST['id'])):
            $id = $_POST['id'];
        endif;
        $model = $this->loadModel($id);
        $this->addCart($model);
        Yii::app()->user->setFlash('success', 'Sản Phẩm đã được thêm thành công vào giỏ hàng');
        echo 0;
//        $this->redirect($this->createUrl('/product/ViewProduct', array('slug' => $slug)));
    }

    public function loadModel($id) {
        $model = MProducts::model()->findByPK($id);
        if (!$model) {
            throw new CHttpException(404, 'Không tìm thấy nội dung');
        }
        return $model;
    }

    public function actionIndex() {
        if (isset(Yii::app()->session['cart']) && Yii::app()->session['cart']) {
            $cart = Yii::app()->session['cart'];
            $this->render('index', array('cart' => $cart));
        } else {
            $this->redirect($this->createUrl('site/index'));
        }
    }

    public function addCart($model) {
        $cart = isset(Yii::app()->session['cart']) ? Yii::app()->session['cart'] : array();
        $old = false;
        foreach ($cart as $key => $val) {
            if ($val['id'] == $model->id) {
                $cart[$key]['number'] ++;
                $old = true;
            }
        }
        if ($old == false) {
            $cart[] = array('id' => $model->id, 'price' => $model->price, 'name_vi' => $model->name_vi, 'name_en' => $model->name_en, 'number' => 1);
        }
        Yii::app()->session['cart'] = $cart;
    }

    public function checkOut($id, $orderID) {
        if (isset(Yii::app()->session['cart']) && Yii::app()->session['cart']) {
            $cart = Yii::app()->session['cart'];
            foreach ($cart as $key => $val) {
                $order = new MOrders();
                $order->productId = $val['id'];
                $order->productName = $val['name_vi'];
                $order->number = $val['number'];
                $order->custommerId = $id;
                $order->order_ID = $orderID;
                $order->check = 0;
                $order->date_time = date('Y-m-d', time());
                $order->save(false);
            }
            Yii::app()->session['cart'] = null;
        }
    }

    public function actionUpdateNumber($id, $data) {
        if (isset(Yii::app()->session['cart']) && Yii::app()->session['cart']) {
            if (Yii::app()->request->isAjaxRequest) {
                $number = intval($data);
                $cart = isset(Yii::app()->session['cart']) ? Yii::app()->session['cart'] : array();
                foreach ($cart as $key => $val) {
                    if ($val['id'] == $id) {
                        if ($number <= 0) {
                            echo 0;
//                            unset($cart[$key]);
                        } else {
                            $cart[$key]['number'] = ($number);
                            echo 1;
                        }
                    }
                }
                Yii::app()->session['cart'] = $cart;
            }
        }
    }

    public function actionDelete($id) {
        $cart = isset(Yii::app()->session['cart']) ? Yii::app()->session['cart'] : array();
        foreach ($cart as $key => $val) {
            if ($val['id'] == $id) {
                unset($cart[$key]);
            }
        }
        Yii::app()->session['cart'] = $cart;
        $this->redirect($this->createUrl('index'));
    }

    public function actionCheckOut() {
        $strid = $_REQUEST['strid'];
        if (isset(Yii::app()->session['cart']) && Yii::app()->session['cart']) {
            $model = new MCustomer();
            if (isset($_POST['MCustomer'])) {
                $model->attributes = $_POST['MCustomer'];
                $postcode = mt_rand(0, 999999);
                if ($model->validate()) {
                    $model->save();
                    $order = new Order();
                    $order->customer_ID = $model->id;
                    $order->price = $_POST['MCustomer']['date_order'];
                    $order->code_order = $postcode;
                    $order->status = 1; //1 is nonactive
                    $order->save();
                    //End Save To Order
                    $this->checkOut($model->id, $order->ID);
                    $this->CompleteNotPayment($order->ID);
                    Yii::app()->user->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
                    $this->redirect(Yii::app()->createUrl('cart/thanks'));
                } else {
                    Yii::app()->user->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
                    $this->redirect(Yii::app()->createUrl('cart/thanks'));
                }
            }
            
            $cart = Yii::app()->session['cart'];
            $this->render('form', array('strid' => $strid, 'model' => $model,'cart' => $cart));
        }
    }

    public function CompleteNotPayment($orderID) {
        if (isset(Yii::app()->session['cart']) && Yii::app()->session['cart']) {
            $confirmOrder = Order::model()->findByPk($orderID);
            if ($confirmOrder) {
                $orderID = $confirmOrder->ID;
                $customerID = $confirmOrder->customer_ID;
                $customerInfor = MCustomer::model()->findByPk($customerID);
                $customerName = $customerInfor->name;
                $customerEmail = $customerInfor->email;
                $customerPhone = $customerInfor->phone;
                $customerAddress = $customerInfor->address;
                $orderDeTail = MOrders::model()->findAll(array('condition' => 'order_ID = ' . $orderID));
                $to = $customerEmail;
                $subject = 'Thông Tin Đơn Hàng';
                $from_name = 'Namjean';
                if (is_array($orderDeTail)) {
                    $message = '<html><body>';
                    $message .= '<table width="650" border="0" cellspacing="0" cellpadding="0" style="background:#fff">';
                    $message .= '<tbody>';
                    $message .= '<tr>';
                    $message .= '<td>';
                    $message .= '<table width="650" border="0" cellspacing="0" cellpadding="0">';
                    $message .= '<tbody>';
                    $message .= '</tbody>';
                    $message .= '</table>';
                    $message .= '</td>';
                    $message .= '</tr>';
                    $message .= '<tr>';
                    $message .= '<td>';
                    $message .= '<table width="650" border="0" cellspacing="0" cellpadding="0">';
                    $message .= '<tbody>';
                    $message .= '<tr>';
                    $message .= '<td width="30">&nbsp;</td>';
                    $message .= '<td width="590"><p style="color:#000;font-size:16px;line-height:17px;text-align:left;letter-spacing:0px;margin-top:30px;font-family:Myriad Pro"> Kính chào Quý khách hàng <strong style="text-transform:uppercase">' . $customerName . '</strong>,</p>';
                    $message .= '<p style="color:#000;font-size:16px;line-height:18px;text-align:justify;letter-spacing:0px;font-family:Myriad Pro">Cảm ơn Quý khách đã đặt hàng tại webstite chúng tôi</p>';
                    $message .= '<p style="line-height:20px;font-family:Myriad Pro;font-size:17px">Thông tin Quý khách đã đăng kí:<br>';
                    $message .= '<b>Họ tên : </b>' . $customerName . '<br>';
                    $message .= '<b>Số điện thoại : </b>' . $customerPhone . '<br>';
                    $message .= '<b>Địa Chỉ : </b>' . $customerAddress . '<br>';
                    $message .= '<b>Địa chỉ email : </b>' . $customerEmail . '</p><p>';
                    $message .= '</p>';
                    $message .= '</td>';
                    $message .= '<td width="30">&nbsp;</td>';
                    $message .= '</tr>';
                    $message .= '</tbody>';
                    $message .= '</table>';
                    $message .= '</td>';
                    $message .= '</tr>';
                    $message .= '</tbody>';
                    $message .= '</table>';
                    $message .= '<table width="100%"; rules="all" style="border:1px solid #3A5896;" cellpadding="10">';
                    $message .= "<tr style='background:#ecebeb'><td>STT</td><td>Tên Sản Phẩm</td><td>Số Lượng</td><td>Đơn Giá</td></tr>";
                    $stt = 0;
                    foreach ($orderDeTail as $items_detail_order) {
                        $stt++;
                        $productID = $items_detail_order->productId;
                        $modelProduct = MProducts::model()->findByPk($productID);
                        $productPrice = $modelProduct->price;
                        $productName = $items_detail_order->productName;
                        $quantity = $items_detail_order->number;
                        $dateCreate = $items_detail_order->date_time;
                        $message .= "<tr><td>$stt</td><td>$productName</td><td>$quantity</td><td>$productPrice VNĐ</td></tr>";
                    }

                    $message .= "</table>";
                    $message .= "<table>";
                    $message .= "</table>";
                    $message .= '<p style="color:#000;font-size:14px;line-height:17px;text-align:center;margin-top:5px;margin-bottom:0px;font-family:Myriad Pro"><strong>Gấu Shop</strong></p>';
                    $message .= '<p style="color:#000;font-size:11px;line-height:15px;text-align:center;margin-top:10px;margin-bottom:10px;font-family:Myriad Pro"><strong>Địa Chỉ  : </strong> ' . $this->website['address_' . Yii::app()->language] . '</p>';
                    $message .= '<p style="color:#000;font-size:11px;line-height:15px;text-align:center;margin-top:10px;margin-bottom:10px;font-family:Myriad Pro"><strong>Địện Thoại  :  </strong> ' . $this->website['phone'] . '</p>';
                    $message .= '<p style="color:#000;font-size:11px;line-height:15px;text-align:center;margin-top:10px;margin-bottom:10px;font-family:Myriad Pro"><strong> Email : </strong> <a href="mailto:' . $this->website['email'] . '" target="_blank">' . $this->website['email'] . '</a></p>';
                    $message .= "</body></html>";
                    // Start Send To Email
                    include 'smtpmail/library.php';
                    include "smtpmail/classes/class.phpmailer.php"; // include the class name
                    $mail = new PHPMailer(); // create a new object
                    $mail->IsSMTP(); // enable SMTP
                    $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
                    $mail->SMTPAuth = true; // authentication enabled
                    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
                    $mail->Host = "smtp.gmail.com";
                    $mail->Port = 465; // or 587
                    $mail->IsHTML(true);
                    $mail->Username = $this->config['email'];
                    $mail->Password = $this->config['password'];
                    $mail->SetFrom($this->config['email']);
                    $mail->Subject = "=?UTF-8?B?" . base64_encode(html_entity_decode("Namjean - Thông Tin Đơn Hàng", ENT_COMPAT, 'UTF-8')) . "?=";
                    $mail->Body = $message;
                    $mail->AddAddress($to);
                    $mail->Send();
                }
            }
        }
    }

    public function actionSaveCheckOutNganLuong() {
        require_once("nganluong.php");
        if (isset(Yii::app()->session['cart']) && Yii::app()->session['cart']) {
            $model = new MCustomer();
            $address = $_POST['address'];
            $email = $_POST['email'];
            $fullname = $_POST['fullname'];
            $phone = $_POST['phone'];
            $model->name = $fullname;
            $model->email = $email;
            $model->phone = $phone;
            $model->address = $address;
            $priceTotal = $_POST['priceTotal'];
            $postcode = mt_rand(0, 999999);
            $emailReceiveMoney = "distancelove10@gmail.com";
            if ($model->validate()) {
                $model->save();
                //save to Order
                $order = new Order();
                $order->customer_ID = $model->id;
                $order->price = $priceTotal;
                $order->code_order = $postcode;
                $order->status = 1; //1 is nonactive
                $order->save();
                //End Save To Order
                $this->checkOut($model->id, $order->ID);
                //Tài khoản nhận tiền
                $receiver = $emailReceiveMoney;
                //Khai báo url trả về 
                $return_url = "http://gingsenganphar.dev/Cart/Complete";
                //Giá của cả giỏ hàng 
                $price = $priceTotal;
                //Mã giỏ hàng 
                $order_code = $postcode;
                //Thông tin giao dịch
                $transaction_info = "Hãy lập trình thông tin giao dịch của bạn vào đây";
                //Khai báo đối tượng của lớp NL_Checkout
                $nl = new NL_Checkout();
                //Tạo link thanh toán đến nganluong.vn
                $url = $nl->buildCheckoutUrl($return_url, $receiver, $transaction_info, $order_code, $price);
                echo $url;
            } else {
                echo 0;
            }
        }
    }

    public function actionComplete() {
        //Thêm class NL_Checkout 
        require_once("nganluong.php");
        //Lấy kết quả trả về từ ngân lượng
        //Lấy thông tin giao dịch
        $transaction_info = $_GET["transaction_info"];
        //Lấy mã đơn hàng 
        $order_code = $_GET["order_code"];
        //Lấy tổng số tiền thanh toán tại ngân lượng 
        $price = $_GET["price"];
        //Lấy mã giao dịch thanh toán tại ngân lượng
        $payment_id = $_GET["payment_id"];
        //Lấy loại giao dịch tại ngân lượng (1=thanh toán ngay ,2=thanh toán tạm giữ)
        $payment_type = $_GET["payment_type"];
        //Lấy thông tin chi tiết về lỗi trong quá trình giao dịch
        $error_text = $_GET["error_text"];
        //Lấy mã kiểm tra tính hợp lệ của đầu vào 
        $secure_code = $_GET["secure_code"];
        //Xử lí đầu vào 
        $nl = new NL_Checkout();
        $check = $nl->verifyPaymentUrl($transaction_info, $order_code, $price, $payment_id, $payment_type, $error_text, $secure_code);
        if ($check) {
            $confirmOrder = Order::model()->find(array('condition' => 'code_order = ' . $order_code));
            if ($confirmOrder) {
                $orderID = $confirmOrder->ID;
                $customerID = $confirmOrder->customer_ID;
                $customerInfor = MCustomer::model()->findByPk($customerID);
                $customerName = $customerInfor->name;
                $customerEmail = $customerInfor->email;
                $customerPhone = $customerInfor->phone;
                $customerAddress = $customerInfor->address;
                $orderDeTail = MOrders::model()->findAll(array('condition' => 'order_ID = ' . $orderID));
                // Start Send To Email
                $to = $customerEmail;
                $subject = 'Thông Tin Đơn Hàng';
                $from = 'distancelove10@gmail.com';
                $from_name = 'GingSengAnPha';

                if (is_array($orderDeTail)) {
                    $message = '<html><body>';
                    $message .= '<table width="100%"; rules="all" style="border:1px solid #3A5896;" cellpadding="10">';
                    $message .= "<tr><td>STT</td><td>Tên Sản Phẩm</td><td>Số Lượng</td><td>Đơn Giá</td></tr>";
                    $stt = 0;
                    foreach ($orderDeTail as $items_detail_order) {
                        $stt++;
                        $productID = $items_detail_order->productId;
                        $modelProduct = MProducts::model()->findByPk($productID);
                        $productPrice = $modelProduct->price;
                        $productName = $items_detail_order->productName;
                        $quantity = $items_detail_order->number;
                        $dateCreate = $items_detail_order->date_time;
                        $message .= "<tr><td>$stt</td><td>$productName</td><td>$quantity</td><td>$productPrice</td></tr>";
                    }
                    $message .= "</table>";
                    $message .= "</body></html>";
                }
                // Start Send To Email
                include 'smtpmail/library.php';
                include "smtpmail/classes/class.phpmailer.php"; // include the class name
                $mail = new PHPMailer(); // create a new object
                $mail->IsSMTP(); // enable SMTP
                $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
                $mail->SMTPAuth = true; // authentication enabled
                $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
                $mail->Host = "smtp.gmail.com";
                $mail->Port = 465; // or 587
                $mail->IsHTML(true);
                $mail->Username = "";
                $mail->Password = "";
                $mail->SetFrom($from);
                $mail->Subject = "Your Gmail SMTP Mail";
                $mail->Body = $message;
                $mail->AddAddress($to);
                $mail->Send();
            }
            $this->render("thank");
        } else {
            $html.="Quá trình thanh toán không thành công bạn vui lòng thực hiện lại";
        }
        echo $html;
    }

    public function actionThanks() {
        $this->render("thank");
    }

}

?>