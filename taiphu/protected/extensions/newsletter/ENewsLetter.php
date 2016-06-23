<?php

class ENewsLetter extends CWidget {

    private $newsletter = array();

    public function init() {
        
    }

    public function run() {
        ?>
        <form action="#" class="pull-right">
            <div class="input-group margin-bottom-10 pull-right" style="width: 100%;background: #fff;">
                <input type="text" id="fullname" placeholder="Họ và tên *" class="form-control">
            </div>
            <div class="input-group margin-bottom-10 pull-right" style="width: 100%;background: #fff">
                <input type="text" id="phone" placeholder="Số điện thoại *" class="form-control">
            </div>
            <div class="input-group margin-bottom-10 pull-right" style="width: 100%;background: #fff">
                <input type="text" id="emailNewsLetter" placeholder="Email *" class="form-control">
            </div>
            <div class="input-group">
                <span class="input-group-btn">
                    <button class="btn btn-primary pull-right" id="sendnewsletter" type="submit">Đăng Ký</button>
                </span>
            </div>
        </form>

        <script src="<?= Yii::app()->theme->baseUrl; ?>/assets/global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
        <script>
            $(document).ready(function () {
                $('#sendnewsletter').click(function () {
                    var newsLetter = $('#emailNewsLetter').val();
                    var fullname = $('#fullname').val();
                    var phone = $('#phone').val();
                    if (newsLetter != 0 && fullname != "" && phone != "")
                    {
                        if (isValidEmailAddress(newsLetter))
                        {
                            emailNewsLetter(newsLetter, fullname, phone);
                            return false;
                        } else {
                            bootbox.alert("Email không hợp lệ.");
                            $('#emailNewsLetter').focus();
                            return false;
                        }
                    }
                    if (fullname == "")
                    {
                        bootbox.alert("vui lòng nhập họ tên");
                        $('#emailNewsLetter').focus();
                        return false;
                    }
                    if (phone == "")
                    {
                        bootbox.alert("vui lòng nhập số điện thoại.");
                        $('#emailNewsLetter').focus();
                        return false;
                    } else {
                        bootbox.alert("vui lòng nhập địa chỉ email");
                        $('#emailNewsLetter').focus();
                        return false;
                    }
                });

                function emailNewsLetter(newsLetter, fullname, phone) {
                    $.ajax({
                        url: "<?php echo Yii::app()->createUrl('/site/EmailLetter'); ?>",
                        type: "POST",
                        data: {
                            newsLetter: newsLetter,
                            fullname: fullname,
                            phone: phone
                        }
                    }).done(function (data) {
                        if (data == 1) {
                            bootbox.alert("Chúng tôi đã nhận được email của bạn,chúng tôi sẽ phản hồi sớm nhất.");
                        } else if (data == 0) {
                            bootbox.alert("Email đã tồn tại,bạn vui lòng nhập địa chỉ email khác.");
                        }
                    });
                }

                function isValidEmailAddress(emailAddress) {
                    var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
                    return pattern.test(emailAddress);
                }


            });
        </script>

        <?php
    }

}
?>