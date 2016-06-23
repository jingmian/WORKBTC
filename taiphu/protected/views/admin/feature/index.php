<link rel="stylesheet" type="text/css" href="<?= Yii::app()->theme->baseUrl; ?>/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css"/>
<link rel="stylesheet" type="text/css" href="<?= Yii::app()->theme->baseUrl; ?>/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css"/>
<link rel="stylesheet" type="text/css" href="<?= Yii::app()->theme->baseUrl; ?>/global/plugins/typeahead/typeahead.css">
<link href="<?= Yii::app()->theme->baseUrl; ?>/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="<?= Yii::app()->theme->baseUrl; ?>/global/css/plugins.css" rel="stylesheet" type="text/css"/>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PORTLET-->
        <div class="portlet box yellow-crusta">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i>Chức Năng Website
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <form action="#" class="form-horizontal form-bordered">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Đơn Hàng</label>
                            <div class="col-md-9">
                                <?php
                                $id = 1;
                                $model = MFeature::model()->findByPk($id);
                                ?>
                                <?= CHtml::dropDownList('homepage', $model['status'], array('Tắt', 'Bật'), array('class' => 'setHomePage', 'data-link' => $this->createUrl('setHomePage', array('id' => 1)))); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Danh Mục Bảng Giá</label>
                            <div class="col-md-9">
                                <?php
                                $id = 2;
                                $model = MFeature::model()->findByPk($id);
                                ?>
                                <?= CHtml::dropDownList('homepage', $model['status'], array('Tắt', 'Bật'), array('class' => 'setHomePage', 'data-link' => $this->createUrl('setHomePage', array('id' => 2)))); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Bảng Giá</label>
                            <div class="col-md-9">
                                <?php
                                $id = 3;
                                $model = MFeature::model()->findByPk($id);
                                ?>
                                <?= CHtml::dropDownList('homepage', $model['status'], array('Tắt', 'Bật'), array('class' => 'setHomePage', 'data-link' => $this->createUrl('setHomePage', array('id' => 3)))); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Đăng Ký Nhận Tin</label>
                            <div class="col-md-9">
                                <?php
                                $id = 4;
                                $model = MFeature::model()->findByPk($id);
                                ?>
                                <?= CHtml::dropDownList('homepage', $model['status'], array('Tắt', 'Bật'), array('class' => 'setHomePage', 'data-link' => $this->createUrl('setHomePage', array('id' => 4)))); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Danh Sách Đăng Ký Nhận Tin</label>
                            <div class="col-md-9">
                                <?php
                                $id = 5;
                                $model = MFeature::model()->findByPk($id);
                                ?>
                                <?= CHtml::dropDownList('homepage', $model['status'], array('Tắt', 'Bật'), array('class' => 'setHomePage', 'data-link' => $this->createUrl('setHomePage', array('id' => 5)))); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Feedback</label>
                            <div class="col-md-9">
                                <?php
                                $id = 6;
                                $model = MFeature::model()->findByPk($id);
                                ?>
                                <?= CHtml::dropDownList('homepage', $model['status'], array('Tắt', 'Bật'), array('class' => 'setHomePage', 'data-link' => $this->createUrl('setHomePage', array('id' => 6)))); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Bài Viết</label>
                            <div class="col-md-9">
                                <?php
                                $id = 7;
                                $model = MFeature::model()->findByPk($id);
                                ?>
                                <?= CHtml::dropDownList('homepage', $model['status'], array('Tắt', 'Bật'), array('class' => 'setHomePage', 'data-link' => $this->createUrl('setHomePage', array('id' => 7)))); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Danh Mục Tin Tức</label>
                            <div class="col-md-9">
                                <?php
                                $id = 8;
                                $model = MFeature::model()->findByPk($id);
                                ?>
                                <?= CHtml::dropDownList('homepage', $model['status'], array('Tắt', 'Bật'), array('class' => 'setHomePage', 'data-link' => $this->createUrl('setHomePage', array('id' => 8)))); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Tin Tức</label>
                            <div class="col-md-9">
                                <?php
                                $id = 9;
                                $model = MFeature::model()->findByPk($id);
                                ?>
                                <?= CHtml::dropDownList('homepage', $model['status'], array('Tắt', 'Bật'), array('class' => 'setHomePage', 'data-link' => $this->createUrl('setHomePage', array('id' => 9)))); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Danh Mục Sản Phẩm</label>
                            <div class="col-md-9">
                                <?php
                                $id = 10;
                                $model = MFeature::model()->findByPk($id);
                                ?>
                                <?= CHtml::dropDownList('homepage', $model['status'], array('Tắt', 'Bật'), array('class' => 'setHomePage', 'data-link' => $this->createUrl('setHomePage', array('id' => 10)))); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Sản Phẩm</label>
                            <div class="col-md-9">
                                <?php
                                $id = 11;
                                $model = MFeature::model()->findByPk($id);
                                ?>
                                <?= CHtml::dropDownList('homepage', $model['status'], array('Tắt', 'Bật'), array('class' => 'setHomePage', 'data-link' => $this->createUrl('setHomePage', array('id' => 11)))); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Đặc Tính Sản Phẩm</label>
                            <div class="col-md-9">
                                <?php
                                $id = 12;
                                $model = MFeature::model()->findByPk($id);
                                ?>
                                <?= CHtml::dropDownList('homepage', $model['status'], array('Tắt', 'Bật'), array('class' => 'setHomePage', 'data-link' => $this->createUrl('setHomePage', array('id' => 12)))); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Đổi Mật Khẩu</label>
                            <div class="col-md-9">
                                <?php
                                $id = 13;
                                $model = MFeature::model()->findByPk($id);
                                ?>
                                <?= CHtml::dropDownList('homepage', $model['status'], array('Tắt', 'Bật'), array('class' => 'setHomePage', 'data-link' => $this->createUrl('setHomePage', array('id' => 13)))); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Đối Tác</label>
                            <div class="col-md-9">
                                <?php
                                $id = 14;
                                $model = MFeature::model()->findByPk($id);
                                ?>
                                <?= CHtml::dropDownList('homepage', $model['status'], array('Tắt', 'Bật'), array('class' => 'setHomePage', 'data-link' => $this->createUrl('setHomePage', array('id' => 14)))); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Video</label>
                            <div class="col-md-9">
                                <?php
                                $id = 15;
                                $model = MFeature::model()->findByPk($id);
                                ?>
                                <?= CHtml::dropDownList('homepage', $model['status'], array('Tắt', 'Bật'), array('class' => 'setHomePage', 'data-link' => $this->createUrl('setHomePage', array('id' => 15)))); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Danh Mục Slider</label>
                            <div class="col-md-9">
                                <?php
                                $id = 16;
                                $model = MFeature::model()->findByPk($id);
                                ?>
                                <?= CHtml::dropDownList('homepage', $model['status'], array('Tắt', 'Bật'), array('class' => 'setHomePage', 'data-link' => $this->createUrl('setHomePage', array('id' => 16)))); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Slider</label>
                            <div class="col-md-9">
                                <?php
                                $id = 17;
                                $model = MFeature::model()->findByPk($id);
                                ?>
                                <?= CHtml::dropDownList('homepage', $model['status'], array('Tắt', 'Bật'), array('class' => 'setHomePage', 'data-link' => $this->createUrl('setHomePage', array('id' => 17)))); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Tùy Chỉnh website</label>
                            <div class="col-md-9">
                                <?php
                                $id = 18;
                                $model = MFeature::model()->findByPk($id);
                                ?>
                                <?= CHtml::dropDownList('homepage', $model['status'], array('Tắt', 'Bật'), array('class' => 'setHomePage', 'data-link' => $this->createUrl('setHomePage', array('id' => 18)))); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Cấu hình website</label>
                            <div class="col-md-9">
                                <?php
                                $id = 19;
                                $model = MFeature::model()->findByPk($id);
                                ?>
                                <?= CHtml::dropDownList('homepage', $model['status'], array('Tắt', 'Bật'), array('class' => 'setHomePage', 'data-link' => $this->createUrl('setHomePage', array('id' => 19)))); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Menu Chính</label>
                            <div class="col-md-9">
                                <?php
                                $id = 20;
                                $model = MFeature::model()->findByPk($id);
                                ?>
                                <?= CHtml::dropDownList('homepage', $model['status'], array('Tắt', 'Bật'), array('class' => 'setHomePage', 'data-link' => $this->createUrl('setHomePage', array('id' => 20)))); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Menu Danh Mục</label>
                            <div class="col-md-9">
                                <?php
                                $id = 21;
                                $model = MFeature::model()->findByPk($id);
                                ?>
                                <?= CHtml::dropDownList('homepage', $model['status'], array('Tắt', 'Bật'), array('class' => 'setHomePage', 'data-link' => $this->createUrl('setHomePage', array('id' => 21)))); ?>
                            </div>
                        </div>

                    </div>
                </form>

                <!-- END FORM-->
            </div>
        </div>
        <!-- END PORTLET-->
    </div>
</div>

<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="<?= Yii::app()->theme->baseUrl; ?>/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>
<script type="text/javascript" src="<?= Yii::app()->theme->baseUrl; ?>/global/plugins/jquery.input-ip-address-control-1.0.min.js"></script>
<script src="<?= Yii::app()->theme->baseUrl; ?>/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<script src="<?= Yii::app()->theme->baseUrl; ?>/global/plugins/bootstrap-touchspin/bootstrap.touchspin.js" type="text/javascript"></script>
<script src="<?= Yii::app()->theme->baseUrl; ?>/global/plugins/typeahead/handlebars.min.js" type="text/javascript"></script>
<script src="<?= Yii::app()->theme->baseUrl; ?>/global/plugins/typeahead/typeahead.bundle.min.js" type="text/javascript"></script>
<script src="<?= Yii::app()->theme->baseUrl; ?>/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?= Yii::app()->theme->baseUrl; ?>/js/layout.js" type="text/javascript"></script>
<script src="<?= Yii::app()->theme->baseUrl; ?>/js/components-form-tools.js"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
    jQuery(document).ready(function () {
        Metronic.init(); // init metronic core components
        Layout.init(); // init current layout
        ComponentsFormTools.init();
    });
</script>

<script>
    jQuery(function ($) {
        $('.setHomePage').bind('change', function () {
            $.ajax({
                url: $(this).attr('data-link'),
                data: 'data=' + parseInt($(this).val()),
            }).done(function (data) {
                location.reload();
            });
        });
    });
</script>