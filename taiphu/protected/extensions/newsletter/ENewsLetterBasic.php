<?php

class ENewsLetterBasic extends CWidget {

    private $newsletter = array();

    public function init() {
        
    }

    public function run() {
        ?>
        <form action="#">
            <div class="input-group">
                <input type="text" id="emailNewsLetter" placeholder="Nhập email của bạn" class="form-control border-radius-search">
                <span class="input-group-btn">
                    <button class="btn btn-primary border-radius-search" type="submit" id="sendnewsletter" style="background: #4B4B4B;border: 1px solid #4B4B4B;padding-left: 11px;padding-right:11px;padding-top: 3px;padding-bottom: 3px;">Gửi</button>
                </span>
            </div>
        </form>

        <script src="<?= Yii::app()->theme->baseUrl; ?>/assets/global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
        <script>
            $(document).ready(function () {
                $('#sendnewsletter').click(function () {
                    var newsLetter = $('#emailNewsLetter').val();
                    if (newsLetter != 0)
                    {
                        if (isValidEmailAddress(newsLetter))
                        {
                            emailNewsLetter(newsLetter);
                            return false;
                        } else {
                            bootbox.alert("Email không hợp lệ.");
                            $('#emailNewsLetter').focus();
                            return false;
                        }
                    }
                    if (newsLetter == "") {
                        bootbox.alert("vui lòng nhập địa chỉ email");
                        $('#emailNewsLetter').focus();
                        return false;
                    }
                });

                function emailNewsLetter(newsLetter) {
                    $.ajax({
                        url: "<?php echo Yii::app()->createUrl('/site/EmailLetter'); ?>",
                        type: "POST",
                        data: {
                            newsLetter: newsLetter,
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