<?php

class NewsLetterController extends AdminController {

    public function actionIndex() {
        $this->pageHeader = 'Danh sách Gởi Tin';
        $models = Yii::app()->db->createCommand('select * from `' . MNewsLetter::model()->tableName() . '` where 1 order by `id` desc')->queryAll();
        $this->render('index', array('models' => $models));
    }

    public function actionAdd() {
        $this->pageHeader = 'Thêm mới Tin';
        $model = new MNewsLetter();
        if (isset($_POST['MNewsLetter'])) {
            print_r($_POST['MNewsLetter']);
            die;

            $model->attributes = $_POST['MNewsLetter'];
            if ($model->validate()) {
                if ($model->save()) {
                    $this->redirect(array('index'));
                }
            }
        }
        $this->render('__form', array('model' => $model));
    }

    public function actionUpdate($id) {

        $model = $this->loadModel($id);
        $this->pageHeader = 'Cập nhật nội dung : "' . $model->name_vi . '"';
        if (isset($_POST['MNewsLetter'])) {
            $model->attributes = $_POST['MNewsLetter'];
            if ($model->validate()) {
                if ($model->save()) {
                    foreach ($_POST['MNewsLetter']['email'] as $itemsEmail) :
                        $messages = "=?UTF-8?B?" . base64_encode(html_entity_decode($_POST['MNewsLetter']['name_vi'], ENT_COMPAT, 'UTF-8')) . "?=";
                        $subject = '<table style="border-collapse:collapse;border-spacing:0;Margin-left:auto;Margin-right:auto">';
                        $subject .= '<tbody>';
                        $subject .= '<tr>';
                        $subject .= '<td style="padding:0;vertical-align:top;font-size:1px;line-height:1px;background-color:#dadada;width:1px">​</td>';
                        $subject .= '<td style="padding:0;vertical-align:top">';
                        $subject .= '<table style="border-collapse:collapse;border-spacing:0;Margin-left:auto;Margin-right:auto;width:600px;background-color:#ffffff;table-layout:fixed">';
                        $subject .= '<tbody>';
                        $subject .= '<tr>';
                        $subject .= '<td style="padding:0;vertical-align:top;text-align:left">';
                        $subject .= '<div style="font-size:12px;Margin-bottom:24px;font-style:normal;font-weight:400;font-family:sans-serif;color:#60666d" align="center">';
                        $subject .= '<img style="border:0;display:block;max-width:600px" src="http://carstoyota.net/themes/toyota/assets/frontend/layout/img/logo.png" alt="" width="269" height="67" class="CToWUd a6T" tabindex="0"><div class="a6S" dir="ltr" style="opacity: 0.01; left: 664.5px; top: 459px;"><div id=":11l" class="T-I J-J5-Ji aQv T-I-ax7 L3 a5q" role="button" tabindex="0" aria-label="Tải xuống tệp đính kèm " data-tooltip-class="a1V" data-tooltip="Tải xuống"><div class="aSK J-J5-Ji aYr"></div></div></div>';
                        $subject .= '</div>';
                        $subject .= '<table style="border-collapse:collapse;border-spacing:0;table-layout:fixed;width:100%">';
                        $subject .= '<tbody>';
                        $subject .= '<tr>';
                        $subject .= '<td style="padding:0;vertical-align:top;padding-left:32px;padding-right:32px;word-break:break-word;word-wrap:break-word">';
                        $subject .= '<p style="Margin-top:0;font-style:normal;font-weight:400;font-size:15px;line-height:24px;Margin-bottom:24px;font-family:sans-serif;color:#60666d"><strong style="font-weight:bold">Hi "' . $itemsEmail . '",</strong></p><p style="Margin-top:0;font-style:normal;font-weight:400;font-size:15px;line-height:24px;Margin-bottom:24px;font-family:sans-serif;color:#60666d">' . $_POST['MNewsLetter']['content_vi'] . '</p>';
                        $subject .= '</td>';
                        $subject .= '</tr>';
                        $subject .= '</tbody>';
                        $subject .= '</table>';
                        $subject .= '<table style="border-collapse:collapse;border-spacing:0;table-layout:fixed;width:100%">';
                        $subject .= '<tbody><tr>';
                        $subject .= '<td style="padding:0;vertical-align:top;padding-left:32px;padding-right:32px;word-break:break-word;word-wrap:break-word">';
                        $subject .= '<div style="Margin-bottom:24px">';
                        $subject .= '<div style="font-size:1px;line-height:1px;background-color:#dadada">&nbsp;</div>';
                        $subject .= '</div>';
                        $subject .= '</td>';
                        $subject .= '</tr>';
                        $subject .= '</tbody></table>';
                        $subject .= '<table style="border-collapse:collapse;border-spacing:0;table-layout:fixed;width:100%">';
                        $subject .= '<tbody>';
                        $subject .= '<tr>';
                        $subject .= '<td style="padding:0;vertical-align:top;padding-left:32px;padding-right:32px;word-break:break-word;word-wrap:break-word">';
                        $subject .= '<div style="Margin-bottom:24px;text-align:center">';
                        $subject .= '<u></u><a style="border-radius:3px;display:inline-block;font-size:14px;font-weight:700;line-height:24px;padding:13px 35px 12px 35px;text-align:center;text-decoration:none!important;color:#fff;font-family:sans-serif;background-color:#00afd1" href="http://carstoyota.net/' . $_POST['MNewsLetter']['image'] . '" target="_blank">Download Bảng Báo Giá</a><u></u>';
                        $subject .= '</div>';
                        $subject .= '</td>';
                        $subject .= '</tr>';
                        $subject .= '</tbody>';
                        $subject .= '</table>';
                        $subject .= '<table style="border-collapse:collapse;border-spacing:0;table-layout:fixed;width:100%">';
                        $subject .= '<tbody>';
                        $subject .= '<tr>';
                        $subject .= '<td style="padding:0;vertical-align:top;padding-left:32px;padding-right:32px;word-break:break-word;word-wrap:break-word">';
                        $subject .= '<div style="Margin-bottom:24px">';
                        $subject .= '<div style="font-size:1px;line-height:1px;background-color:#dadada">&nbsp;</div>';
                        $subject .= '</div>';
                        $subject .= '</td>';
                        $subject .= '</tr>';
                        $subject .= '</tbody>';
                        $subject .= '</table>';
                        $subject .= '<table style="border-collapse:collapse;border-spacing:0;table-layout:fixed;width:100%">';
                        $subject .= '<tbody>';
                        $subject .= '<tr>';
                        $subject .= '<td style="padding:0;vertical-align:top;padding-left:32px;padding-right:32px;word-break:break-word;word-wrap:break-word">';
                        $subject .= '<div style="min-height:5px">&nbsp;</div>';
                        $subject .= '</td>';
                        $subject .= '</tr>';
                        $subject .= '</tbody>';
                        $subject .= '</table>';
                        $subject .= '<table style="border-collapse:collapse;border-spacing:0;table-layout:fixed;width:100%">';
                        $subject .= '<tbody>';
                        $subject .= '<tr>';
                        $subject .= '<td style="padding:0;vertical-align:top;padding-left:32px;padding-right:32px;word-break:break-word;word-wrap:break-word">';
                        $subject .= '<p style="Margin-top:0;font-style:normal;font-weight:400;font-size:15px;line-height:24px;Margin-bottom:24px;font-family:sans-serif;color:#60666d">Thanks for you,<br>';
                        $subject .= '<strong style="font-weight:bold">Toyota Hùng Vương</strong></p>';
                        $subject .= '</td>';
                        $subject .= '</tr>';
                        $subject .= '</tbody>';
                        $subject .= '</table>';
                        $subject .= '<div style="font-size:8px;line-height:8px">&nbsp;</div>';
                        $subject .= '</td>';
                        $subject .= '</tr>';
                        $subject .= '</tbody></table>';
                        $subject .= '</td>';
                        $subject .= '<td style="padding:0;vertical-align:top;font-size:1px;line-height:1px;background-color:#dadada;width:1px">​</td>';
                        $subject .= '</tr>';
                        $subject .= '</tbody>';
                        $subject .= '</table>';
                        // Start Send To Email
                        $from = "coder@ngonhaidang.com.vn";
                        $lastID = $model->id;
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
                        $mail->Username = "coder@ngonhaidang.com.vn";
                        $mail->Password = "vuontoithanhcog909";
                        $mail->SetFrom($from);
                        $mail->Subject = $messages;
                        $mail->Body = $subject;
                        $mail->AddAddress($itemsEmail);
                        $mail->Send();
                    endforeach;
                    $this->redirect(array('index'));
                }
            }
        }
        $this->render('__form', array('model' => $model));
    }

    public function actionDelete() {
        if (isset($_POST['ID'])):
            $id = $_POST['ID'];
            $this->loadModel($id)->delete();
            $this->redirect(array('index'));
        else:
            throw new CHttpException(404, 'Không tìm thấy nội dung');
        endif;
    }

    public function actionDeleteBatch() {
        if (isset($_POST['ID'])):
            $arr = $_POST['ID'];
            foreach ($arr as $id) {
                $this->loadModel($id)->delete();
            }
            $this->redirect(array('index'));
        else:
            throw new CHttpException(404, 'Không tìm thấy nội dung');
        endif;
    }

    protected function loadModel($id) {
        $model = MNewsLetter::model()->findByPk($id);
        if (!$model) {
            throw new CHttpException(404, 'Không tìm thấy nội dung');
        }
        return $model;
    }

    public function actionSetOrder($id, $data) {
        if (Yii::app()->request->isAjaxRequest) {
            $model = $this->loadModel($id);
            $model->order = intval($data);
            $model->save(false);
        } else {
            $this->redirect(array('index'));
        }
    }

}
