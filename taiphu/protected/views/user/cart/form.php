<?php if ($cart): ?>
    <div class="colCent showcart">
        <div class="titBox"><h1 class="tit">Thông tin khách hàng</h1></div>
        <form>

            <div class="formBox">
                <!-- BEGIN FORM-->
                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'contact-form',
                    'enableClientValidation' => true,
                    'clientOptions' => array(
                        'validateOnSubmit' => true,
                    ),
                ));
                ?>


                <?php $this->endWidget(); ?>


                <div class="left">
                    <li>
                        <label for="fullname"><?php echo $form->labelEx($model, 'name'); ?></label>
                        <?php echo $form->textField($model, 'name', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'name'); ?>
                    </li>
                    <li>
                        <label for="phone"><?php echo $form->labelEx($model, 'phone'); ?></label>
                        <?php echo $form->textField($model, 'phone', array('size' => 60, 'maxlength' => 128, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'phone'); ?>
                    </li>
                    <li>
                        <label for="address"<?php echo $form->labelEx($model, 'address'); ?></label>
                        <?php echo $form->textField($model, 'address', array('size' => 60, 'maxlength' => 128, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'address'); ?>
                    </li>
                    <li>
                        <label for="email"><?php echo $form->labelEx($model, 'email'); ?></label>
                        <?php echo $form->textField($model, 'email', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'email'); ?>
                    </li>
                </div>
                <div class="right">
                    <li>
                        <label for="message"> <?php echo $form->labelEx($model, 'body'); ?></label>
                        <?php echo $form->textArea($model, 'body', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'body'); ?>
                    </li>
                    <li>
                        <button type="submit" class="btn btn-primary"><i class="icon-ok"></i>Đặt Hàng</button>
                        <button type="button" class="btn btn-default">Hủy</button>
                    </li>
                </div>
            </div>

            <div class="clr"></div>
            <div class="titBox"><span class="tit">Giỏ hàng của bạn</span></div>
            <div class="tables">
                <table>
                    <thead>
                        <tr>
                            <th width="15%">Hình</th>
                            <th>Tên sản phẩm</th>
                            <th width="12%">Số lượng</th>
                            <th width="10%">Đơn giá</th>
                            <th width="10%">Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $step = 1;
                        foreach ($cart as $value):
                            $model = MProducts::model()->findByPK($value['id']);
                            ?>
                            <tr>
                                <td data-title="Hình">
                                    <a href="" class="zoom" title="<?= $value['name_' . Yii::app()->language]; ?>">
                                        <img src="<?php echo $model['image']; ?>" alt="<?= $value['name_' . Yii::app()->language]; ?>">
                                    </a>
                                </td>
                                <td data-title="Tên sản phẩm">
                                    <a href="" class="name">
                                        <?= $value['name_' . Yii::app()->language]; ?>
                                    </a>
                                    <a href="<?php echo Yii::app()->createUrl('/cart/delete', array('id' => $value['id'])); ?>" class="remove">Remove</a>
                                </td>
                                <td data-title="Số lượng">
                                    <input id="product-quantity" class="updateNumber form-control input-sm" alt="<?= $value['price']; ?>" type="number" value="<?= $value['number']; ?>" data-target="<?= Yii::app()->createUrl('/cart/UpdateNumber', array('id' => $value['id'])); ?>"/>
                                </td>
                                <td data-title="Đơn giá" class="price price-order"><?= $value['price']; ?></td>
                                <td data-title="Thành tiền" class="price price-total goods-page-total"><?= $value['price']; ?></td>
                            </tr>
                        <?php endforeach ?>


                    </tbody>
                </table>
            </div>
            <div class="tables">
                <table>
                    <tbody>
                        <tr>
                            <td data-title="Controls" class="controls">
                                <a href="<?= Yii::app()->getBaseUrl(true); ?>">Tiếp tục mua sắm</a>
                            </td>
                            <td data-title="Total" class="total" width="28%"><span>Tổng tiền:</span> <strong class="price total-final"></strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </form>
    </div>

    <script>
        jQuery(document).ready(function ($) {
            $('.updateNumber').each(function () {
                var total = 0;
                var quantity = parseInt($(this).val().replace(/\./g, ''));
                var priceTotal = $(this).parent('td').prev('.price-order').text().replace(/[\. ,:-]+/g, "");
                var changNumber = parseFloat(quantity * priceTotal, 10);
                $(this).parent('td').next('td.price-total').text(changNumber);
                $('.price-total').each(function () {
                    total += parseInt($(this).text());
                });
                $('.total-final').text(total);
                $.ajax({
                    url: $(this).attr('data-target'),
                    data: 'data=' + $(this).val(),
                });
            });
        });

        $('.updateNumber').bind('change keyup', function () {
            var total = 0;
            var quantity = parseInt($(this).val().replace(/\./g, ''));
            var priceTotal = $(this).parent('td').prev('.price-order').text().replace(/[\. ,:-]+/g, "");
            var changNumber = parseFloat(quantity * priceTotal);
            $(this).parent('td').next('td.price-total').text(changNumber);
            $('.price-total').each(function () {
                total += parseInt($(this).text());
            });
            $('.total-final').text(total);
            $.ajax({
                url: $(this).attr('data-target'),
                data: 'data=' + $(this).val(),
                success: function (result) {
                    if (result == 0) {
                        $(".modal").hide();
                        $("html, body").animate({scrollTop: '400px'}, 1000);
                        $('.alert-success').show();
                        $('.show-notify').text("Số Lượng phải lớn hơn hoặc bằng 1");
                        //                        location.href = "/gio-hang/";
                    }
                }
            });

        });

        function FormInput() {
            var PriceToCheckOut = $('.total-final').text();
            window.location.href = "<?php echo Yii::app()->baseUrl; ?>/Cart/checkOut/id/1/strid/" + PriceToCheckOut;
        }


    </script>
    <?php
endif
?>

<style>
    .showcart table input {
        display: table;
        width: 50px;
        height: 28px;
        text-align: center;
        margin: 0 auto;
    }
</style>