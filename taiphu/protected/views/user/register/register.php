<link href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css"><!-- for slider-range -->
<link href="<?= Yii::app()->theme->baseUrl; ?>/assets/css/jquery.selectbox.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="<?= Yii::app()->theme->baseUrl; ?>/assets/css/uniform.default.css" type="text/css">
<link rel="stylesheet" href="<?= Yii::app()->theme->baseUrl; ?>/assets/css/dklt.css?r=5249" type="text/css">

<div class="main">
    <div class="container">

        <div class="row service-box margin-bottom-10">
            <div class="col-md-12 col-sm-12 padding-top-30">
                <ul class="breadcrumb">
                    <li><a href="#">Trang Chủ</a></li>
                    <li><a href="#">Đăng Ký Lái Thử</a></li>
                </ul>
            </div>
        </div>


        <div class="row margin-bottom-35 ">
            <div class="col-md-12 col-sm-12">
                <div class="home-header">
                    <div class="camry-menu">
                        <div class="text-logo"><a href="">Thông tin đăng ký lái thử</a></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-sm-12">

            <div class="home-cntwrap">

                <div class="content">

                    <div id="test-form">

                        <form id="form-test" method="post" action="<?php echo Yii::app()->createUrl('/register/save'); ?>">

                            <div class="row margin-bottom-10">

                                <div class="col-md-2 col-sm-2 col-xs-12 colname">Chọn dòng xe:<span class="start">*</span></div>

                                <div class="col-md-4 col-sm-4 col-xs-12 col">

                                    <div class="select sl">

                                        <select name='car_category' id="car_category" data-validation="required" data-validation-error-msg-required="Vui lòng chọn dòng xe">
                                            <option value="">Chọn dòng xe</option>
                                            <option data-name="Vios" value="4" >Vios</option>
                                            <option data-name="Corolla Altis" value="3" >Corolla Altis</option>
                                            <option data-name="Camry" value="2" >Camry</option>
                                        </select>

                                        <img class="alert img_success" src="http://www.toyota.com.vn/static/images/icon/success.png" alt="success">
                                        <img class="alert img_warning" src="http://www.toyota.com.vn/static/images/icon/warning.png" alt="warning">

                                    </div>

                                </div>

                            </div>

                            <div class="row margin-bottom-10">

                                <div class="col-md-2 col-sm-2 col-xs-12 colname">Họ và tên:<span class="start">*</span></div>

                                <div class="col-md-4 col-sm-4 col-xs-12 col">

                                    <div class="ip">
                                        <input name="fullname" id="fullname" type="text" data-validation="required length custom" data-validation-regexp="([a-zA-Z ]|â|ấ|ầ|ẩ|ẫ|ậ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ|á|à|ả|ã|ạ|Á|À|Ả|Ã|Ạ|ă|ắ|ằ|ẳ|ẵ|ặ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|ê|ế|ề|ể|ễ|ệ|Ê|Ế|Ề|Ể|Ễ|Ệ|é|è|ẻ|ẽ|ẹ|É|È|Ẻ|Ẽ|Ẹ|í|ì|ỉ|ĩ|ị|Í|Ì|Ỉ|Ĩ|Ị|ô|ố|ồ|ổ|ỗ|ộ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ|ư|ứ|ừ|ử|ữ|ự|Ư|Ứ|Ừ|Ử|Ữ|Ự|ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ|Đ|đ|ó|ò|ỏ|õ|ọ|Ó|Ò|Ỏ|Õ|Ọ|ú|ù|ủ|ũ|ụ|Ú|Ù|Ủ|Ũ|Ụ)+$" data-validation-length="5-50" data-validation-error-msg-custom="Họ tên không thể chứa số và ký tự đặt biệt" data-validation-error-msg-required="Vui lòng nhập họ tên" data-validation-error-msg-length="Họ tên nhập từ 5 đến 50 ký tự">

                                        <img class="alert img_success" src="http://www.toyota.com.vn/static/images/icon/success.png" alt="success">

                                        <img class="alert img_warning" src="http://www.toyota.com.vn/static/images/icon/warning.png" alt="warning">

                                    </div>

                                </div>

                            </div>

                            <div class="row margin-bottom-10">

                                <div class="col-md-2 col-sm-2 col-xs-12 colname">Điện thoại:<span class="start">*</span></div>

                                <div class="col-md-4 col-sm-4 col-xs-12 col">

                                    <div class="ip">
                                        <input name="phone" id="phone" type="text" data-validation="required number length even_number" data-validation-error-msg-required="Vui lòng nhập điện thoại" data-validation-length="10-11" data-validation-error-msg-length="Điện thoại nhập từ 10 đến 11 ký tự" data-validation-error-msg-number="Điện thoại phải là số ">

                                        <img class="alert img_success" src="http://www.toyota.com.vn/static/images/icon/success.png" alt="success">

                                        <img class="alert img_warning" src="http://www.toyota.com.vn/static/images/icon/warning.png" alt="warning">

                                    </div>

                                </div>

                            </div>

                            <div class="row margin-bottom-10">

                                <div class="col-md-2 col-sm-2 col-xs-12 colname">Email:<span class="start">*</span></div>

                                <div class="col-md-4 col-sm-4 col-xs-12 col">

                                    <div class="ip">
                                        <input name="email" id="email" type="text" data-validation="required email" data-validation-error-msg-required="Vui lòng nhập email" data-validation-error-msg-email="Email không đúng">

                                        <img class="alert img_success" src="http://www.toyota.com.vn/static/images/icon/success.png" alt="success">

                                        <img class="alert img_warning" src="http://www.toyota.com.vn/static/images/icon/warning.png" alt="warning">

                                    </div>

                                </div>

                            </div>

                            <div class="row margin-bottom-10">

                                <div class="col-md-2 col-sm-2 col-xs-12 colname">Năm sinh:</div>

                                <div class="col-md-2 col-sm-2 col-xs-12 col_1" >

                                    <div class="select year sl">

                                        <select name="birthday" id="birthday"  data-validation-error-msg-required="Vui lòng chọn năm sinh">

                                            <option value="">Năm sinh</option>


                                            <option value="1933">1933</option>


                                            <option value="1932">1932</option>


                                            <option value="1931">1931</option>


                                            <option value="1930">1930</option>


                                        </select>

                                    </div>

                                </div>


                                <div class="col-md-2 col-sm-2 col-xs-12 col_1">

                                    <div class="select_gt sl">

                                        <select name="gender" id="gender" data-validation-error-msg-required="Vui lòng chọn giới tính">

                                            <option value="">Giới tính</option>

                                            <option value="1">Nam</option>

                                            <option value="0">Nữ</option>

                                        </select>

                                    </div>

                                </div>

                            </div>


                            <div class="row margin-bottom-10">

                                <div class="col-md-2 col-sm-2 col-xs-12 colname">Thành phố:<span class="start">*</span></div>

                                <div class="col-md-4 col-sm-4 col-xs-12 col">

                                    <div class="select sl">

                                        <select name='city_id' id="city_id" data-validation="required" data-validation-error-msg-required="Vui lòng chọn thành phố">

                                            <option value="">Nơi đăng ký lái thử</option>
                                            <option value="1">Hồ Chí Minh</option>
                                            <option value="2">Vũng Tàu</option>

                                        </select>

                                        <img class="alert img_success" src="http://www.toyota.com.vn/static/images/icon/success.png" alt="success">

                                        <img class="alert img_warning" src="http://www.toyota.com.vn/static/images/icon/warning.png" alt="warning">

                                    </div>

                                </div>

                            </div>

                            <div class="row margin-bottom-10">

                                <div class="col-md-2 col-sm-2 col-xs-12 colname">Đại lý:<span class="start">*</span></div>

                                <div class="col-md-4 col-sm-4 col-xs-12 col">

                                    <div class="select sl">

                                        <select name='dealer_id' id="dealer" data-validation="required" data-validation-error-msg-required="Vui lòng chọn đại lý">

                                            <option value="">Chọn đại lý</option>
                                            <option value="1">Hùng Vương</option>
                                            <option value="2">An Sương</option>

                                        </select>

                                        <img class="alert img_success" src="http://www.toyota.com.vn/static/images/icon/success.png" alt="success">

                                        <img class="alert img_warning" src="http://www.toyota.com.vn/static/images/icon/warning.png" alt="warning">

                                    </div>

                                </div>

                            </div>


                            <div class="row last margin-bottom-10">

                                <div class="col-md-2 col-sm-2 col-xs-12 colname">Hình thức mua xe</div>

                                <div class="col-md-4 col-sm-4 col-xs-12 col">

                                    <div class="select sl">

                                        <select name="consultant" id="consultant">

                                            <option value="">Chọn hình thức mua xe</option>


                                            <option value="1">Mua bằng tiền mặt</option>


                                            <option value="2">Vay ưu đãi qua Công Ty Tài Chính Toyota</option>


                                            <option value="3">Vay từ các ngân hàng</option>


                                            <option value="4">Chưa có kế hoạch</option>


                                        </select>

                                    </div>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-2 col-sm-2 col-xs-12">&nbsp;</div>

                                <div class="col-md-6 col-sm-6 col-xs-12 note">
                                    <div class="wrap_accept">
                                        <p class="wanning">Quý khách vui lòng điền đầy đủ các thông tin được đánh dấu (*)</p>
                                        <p class="wrap_error_k"> 
                                            <span class="dk_cb">
                                                <input name="dy[]" id="privacy" type="checkbox">
                                            </span>
                                            Tôi đồng ý với <a href="#rules">điều kiện và điều khoản</a> của chương trình</p>
                                        <img class="alert img_success" src="http://www.toyota.com.vn/static/images/icon/success.png" alt="success">
                                        <img class="alert img_warning" src="http://www.toyota.com.vn/static/images/icon/warning.png" alt="warning">
                                    </div>
                                    <div class="clearAll"></div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="note" style="border-left: none !important;">
                                    <input  class="submit-dk" type="submit" value="Hoàn tất đăng ký">
                                    <img id="loadding_sub" style="display:none" src="static/images/loader.gif" alt="">
                                </div>
                            </div>


                        </form>


                        <div style="display: none;">

                            <div id="rules">

                                <h3>Điều kiện và điều khoản của chương trình</h3>

                                <p>1. Người tham gia lái thử phải có bằng lái xe ô tô còn hiệu lực theo quy định của pháp luật Việt Nam và phải tuyệt đối tuân thủ các quy định của pháp luật Việt Nam trong quá trình tham gia giao thông.</p>

                                <br>

                                <p>2. Tuân thủ các điều lệ, nguyên tắc và hướng dẫn của đại lý nơi tham gia lái thử trong lúc điều khiển bất kỳ phương tiện nào thuộc quyền sở hữu hoặc thuộc quản lý của đại lý đó.</p>

                                <br>

                                <p>3. Công ty ô tô Toyota Việt Nam có quyền lưu trữ thông tin cá nhân của người đăng ký chương trình lái thử xe cho mục đích tiếp thị, nghiên cứu thị trường, theo dõi doanh số và liên lạc khi cần thiết.</p>

                                <a class="close_rules" href="javascript: void(0);">Đóng</a>

                            </div>

                        </div>

                        <div style="display: none;">

                            <div id="finish">

                                <h3>CHÚC MỪNG BẠN ĐÃ ĐĂNG KÝ THÀNH CÔNG<br>CHƯƠNG TRÌNH LÁI THỬ XE <a href="javascript: void(0);">COROLLA ALTIS</a> MỚI</h3>

                                <p>Nếu Quý khách có bất kỳ thắc mắc hay vấn đề trong quá trình đăng ký,<br>xin vui lòng gửi email đến địa chỉ <a href="mailto:tmv_cs@toyotavn.com.vn">tmv_cs@toyotavn.com.vn</a></p>

                                <a class="close_rules" href="javascript: void(0);">Đóng</a>

                            </div>

                        </div>


                    </div>

                </div>

            </div>
        </div>

    </div>

</div>


<script type="text/javascript" src="http://www.toyota.com.vn/static/js/jquery.uniform.min.js"></script>
<script src="<?= Yii::app()->theme->baseUrl; ?>/assets/js/jquery.fancybox.js" type="text/javascript"></script>
<script src="<?= Yii::app()->theme->baseUrl; ?>/assets/js/jquery.cookie.js" type="text/javascript"></script>
<script type="text/javascript" src="<?= Yii::app()->theme->baseUrl; ?>/assets/js/jquery.validate.js"></script>
<script type="text/javascript" src="<?= Yii::app()->theme->baseUrl; ?>/assets/js/jquery.numeric.js"></script>
<script type="text/javascript" src="<?= Yii::app()->theme->baseUrl; ?>/assets/js/jquery.form.js"></script>
<script type="text/javascript" src="<?= Yii::app()->theme->baseUrl; ?>/assets/js/jquery.selectbox-0.2.js"></script>
<script type="text/javascript" src="<?= Yii::app()->theme->baseUrl; ?>/assets/js/main_2.js"></script>
<script type="text/javascript" src="<?= Yii::app()->theme->baseUrl; ?>/assets/js/main.js"></script>
<script type="text/javascript" src="<?= Yii::app()->theme->baseUrl; ?>/assets/js/home_form_validate.js?r=4764"></script>
