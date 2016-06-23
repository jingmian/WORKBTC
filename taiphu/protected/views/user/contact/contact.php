<div class="colCent">

    <div class="titBox"><h1 class="tit">Thông tin liên hệ</h1></div>

    <div class="showText">
        <p>
            <?php echo $this->website['address_' . Yii::app()->language]; ?>
        </p>

        <div id="googleMap" style="width:100%;height:380px;"></div>
        <!--<div id="googleMap1" style="width:500px;height:380px;"></div>-->

    </div><!--end showText-->


    <b>
        <div class="clr"></div>
        <div class="titBox"><span class="tit">Form liên hệ</span></div>

        <!-- BEGIN FORM-->
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'contact-form',
            'enableClientValidation' => true,
            'clientOptions' => array(
                'validateOnSubmit' => true,
            ),
            'htmlOptions' => array(
                'class' => 'formBox',
            ),
        ));
        ?>

        <div class="left">

            <li>
                <label for="fullname"><?php echo $form->labelEx($model, 'name'); ?></label>
                <?php echo $form->textField($model, 'name', array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'name'); ?>
            </li>
            <li>
                <label for="fullname"><?php echo $form->labelEx($model, 'subject'); ?></label>
                <?php echo $form->textField($model, 'subject', array('size' => 60, 'maxlength' => 128, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'subject'); ?>
            </li>
            <li>
                <label for="fullname"><?php echo $form->labelEx($model, 'email'); ?></label>
                <?php echo $form->textField($model, 'email', array('class' => 'form-control')); ?>
                <?php echo $form->error($model, 'email'); ?>
            </li>

        </div>

        <div class="right">
            <li>
                <label for="fullname"><?php echo $form->labelEx($model, 'body'); ?></label>
                <?php echo $form->textArea($model, 'body', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'body'); ?>
            </li>

            <?php if (CCaptcha::checkRequirements()): ?>
                <li><label for="capcha"><?php echo $form->labelEx($model, 'verifyCode'); ?></label>
                    <?php echo $form->textField($model, 'verifyCode'); ?>
                    <span class="capcha"><?php $this->widget('CCaptcha'); ?></span>
                    <?php echo $form->error($model, 'verifyCode'); ?>
                </li>
            <?php endif; ?>
            <li>
                <button type="reset" >Làm lại</button>
                <button type="submit">Gửi đi</button>
            </li>

        </div>

        <div class="clr"></div>

        <?php $this->endWidget(); ?>
        <!-- END FORM-->    
    </b>

</div>


<!--<script src="http://maps.googleapis.com/maps/api/js"></script>-->
<script>
    var myCenter = new google.maps.LatLng(10.853846, 106.628363);
    function initialize() {
        var mapProp = {
            center: myCenter,
            zoom: 15,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
        var marker = new google.maps.Marker({
            position: myCenter,
            icon: {
                url: '<?= Yii::app()->theme->baseUrl; ?>/assets/frontend/layout/img/marker.png',
                size: new google.maps.Size(70, 86), //marker image size
                origin: new google.maps.Point(0, 0), // marker origin
                anchor: new google.maps.Point(35, 86) // X-axis value (35, half of marker width) and 86 is Y-axis value (height of the marker).
            }
        });

        marker.setMap(map);
        var infowindow = new google.maps.InfoWindow();
        infowindow.setContent('<strong>Thông tin : </strong><br/><strong> Tên công ty  : </strong><?= $this->website['name_' . Yii::app()->language]; ?><br/><strong> Địa chỉ  : </strong><?php echo $this->config['diachimap']; ?><br/><strong> Điện thoại  :</strong><?= $this->website['phone']; ?>');
        infowindow.open(map, marker);
    }

    google.maps.event.addDomListener(window, 'load', initialize);

    var myCenter1 = new google.maps.LatLng(10.859828, 106.617953);
    function initialize1() {
        var mapProp = {
            center: myCenter1,
            zoom: 15,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("googleMap1"), mapProp);
        var marker = new google.maps.Marker({
            position: myCenter1,
            icon: {
                url: '<?= Yii::app()->theme->baseUrl; ?>/assets/frontend/layout/img/marker.png',
                size: new google.maps.Size(70, 86), //marker image size
                origin: new google.maps.Point(0, 0), // marker origin
                anchor: new google.maps.Point(35, 86) // X-axis value (35, half of marker width) and 86 is Y-axis value (height of the marker).
            }
        });

        marker.setMap(map);
        var infowindow = new google.maps.InfoWindow();
        infowindow.setContent('Thông tin công ty');
        infowindow.open(map, marker);

    }

    google.maps.event.addDomListener(window, 'load', initialize1);

</script>
