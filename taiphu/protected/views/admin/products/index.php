<?php
/* @var $this MPostsController */

$this->breadcrumbs = array(
    'Tin tức',
);
?>
<a class="btn btn-success" href="<?= $this->createUrl('add'); ?>" title="Thêm mới"><i class="fa fa-plus"></i> </a>
<a class="btn btn-danger pull-right" id="delete-batch" href="javascript:;" title="Xóa Tất Cả"><i class="fa fa-trash-o"></i> Xóa tất cả</a>

<hr />

<form action="<?= $this->createUrl('index'); ?>" method="get" class="form pull-right">
    <div class="form-group">
        <div class="input-group">
            <label class="input-group-addon">Tên bài viết</label>
            <input type="text" name="s" class="form-control" />
        </div>
    </div>
</form>
<hr />



<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th style="width: 1%"><input type="checkbox" id="select_all" /></th>
                <th style="width: 1%">STT</th>
                <th style="width: 20%">Tên</th>
                <th style="width: 10%">Danh Mục</th>
                <th style="width: 7%">Hình Ảnh</th>
                <th style="width: 5%">Tình trạng</th>
                <th style="width: 5%">Giá</th>
                <th style="width: 5%">Mới</th>
                <th style="width: 5%">Nổi Bật</th>
                <th style="width: 5%">Bán Chạy</th>
                <th style="width: 5%">Độc Đáo</th>
                <th style="width: 5%">Top Đánh Giá</th>
                <th style="width: 5%">Top Xem Nhiều</th>
                <th style="width: 5%">Thứ tự</th>
                <th style="width: 10%">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($models):
                $step = 1;
                foreach ($models as $keyM => $valueM):
                    $modelsProducts = MModels::model()->findByPk($valueM['parent']);
                    ?>
                    <tr>
                        <td><input type="checkbox" name="select[]" class="select" value="<?php echo $valueM['id']; ?>"/></td>
                        <td><?= $step++; ?></td>
                        <td><?= CHtml::encode($valueM['name_vi']); ?></td>
                        <td><?php echo $modelsProducts['name_vi']; ?></td>
                        <td><img  class="img-thumbnails" src="<?php echo $valueM['image']; ?>"></td>
                        <td>
                            <?= intval($valueM['status']) == 1 ? 'Hiển thị' : 'Đình chỉ'; ?>
                        </td>
                        <td>
                            <span style="text-decoration: line-through;"><?= number_format($valueM['price']); ?></span>
                            <div class="text-danger"><?= number_format($valueM['price_promotion']); ?></div>
                        </td>
                        <td>
                            <a href="javascript:;" onclick="updateNew(<?php echo $valueM['id']; ?>);
                                    return false;">
                                <i class="fa fa-pencil"></i>
                                <span class="status_update">
                                    <?php
                                    if ($valueM['new'] == 0) {
                                        echo "Bình Thương";
                                    } else if ($valueM['new'] == 1) {
                                        echo "Mới";
                                    }
                                    ?>
                                </span>
                            </a>
                        </td>
                        <td>
                            <a href="javascript:;" onclick="updateFeature(<?php echo $valueM['id']; ?>);
                                    return false;">
                                <i class="fa fa-pencil"></i>
                                <span class="status_update">
                                    <?php
                                    if ($valueM['feature'] == 0) {
                                        echo "Bình Thường";
                                    } else if ($valueM['feature'] == 1) {
                                        echo "Nổi Bật";
                                    }
                                    ?>
                                </span>
                            </a>
                        </td>


                        <td>
                            <a href="javascript:;" onclick="updateBestSeller(<?php echo $valueM['id']; ?>);
                                    return false;">
                                <i class="fa fa-pencil"></i>
                                <span class="status_update">
                                    <?php
                                    if ($valueM['bestseller'] == 0) {
                                        echo "Bình Thường";
                                    } else if ($valueM['bestseller'] == 1) {
                                        echo "Bán Chạy";
                                    }
                                    ?>
                                </span>
                            </a>
                        </td>
                        <td>
                            <a href="javascript:;" onclick="updateSpecial(<?php echo $valueM['id']; ?>);
                                    return false;">
                                <i class="fa fa-pencil"></i>
                                <span class="status_update">
                                    <?php
                                    if ($valueM['bestseller'] == 0) {
                                        echo "Bình Thường";
                                    } else if ($valueM['bestseller'] == 1) {
                                        echo "Độc Đáo";
                                    }
                                    ?>
                                </span>
                            </a>
                        </td>
                        <td>
                            <a href="javascript:;" onclick="updateRating(<?php echo $valueM['id']; ?>);
                                    return false;">
                                <i class="fa fa-pencil"></i>
                                <span class="status_update">
                                    <?php
                                    if ($valueM['rating'] == 0) {
                                        echo "Bình Thường";
                                    } else if ($valueM['rating'] == 1) {
                                        echo "Đánh Giá";
                                    }
                                    ?>
                                </span>
                            </a>
                        </td>
                        <td>
                            <a href="javascript:;" onclick="updateViewed(<?php echo $valueM['id']; ?>);
                                    return false;">
                                <i class="fa fa-pencil"></i>
                                <span class="status_update">
                                    <?php
                                    if ($valueM['viewed'] == 0) {
                                        echo "Bình Thường";
                                    } else if ($valueM['viewed'] == 1) {
                                        echo "Xem nhiều";
                                    }
                                    ?>
                                </span>
                            </a>
                        </td>
                        <td><input style="width: 50px" class="setOrder" data-link="<?= $this->createUrl('setOrder', array('id' => $valueM['id'])); ?>" type="number" value="<?= $valueM['number']; ?>" ></td>
                        <td>
                            <a class="btn btn-primary" href="<?= $this->createUrl('update', array('id' => $valueM['id'])); ?>"><i class="fa fa-pencil"></i></a>
                            <a class="btn btn-danger" href="javascript:;" onclick="confirmdelete('<?php echo $valueM['id']; ?>');
                                    return false;"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                    <?php
                endforeach;
            else:
                ?>
                <tr>
                    <td colspan="4" class="text-center"><span class="text-danger">Không có dữ liệu</span></td>
                </tr>
            <?php endif; ?>
        </tbody>
        <?php if ($pages): ?>
            <tfoot>
                <tr>
                    <td colspan="5" style="text-align: right;">
                        <?php
                        $this->widget('CLinkPager', array(
                            'currentPage' => $pages->getCurrentPage(),
                            'itemCount' => $pages->getItemCount(),
                            'pageSize' => $pages->getPageSize(),
                            'maxButtonCount' => 5,
                            //'nextPageLabel'=>'My text >',
                            'header' => '',
                            'htmlOptions' => array('class' => 'pages'),
                        ));
                        ?>
                    </td>
                </tr>
            </tfoot>
        <?php endif; ?>
    </table>
</div>


<script>
    jQuery(function ($) {
        $('.setHomePage').bind('change', function () {
            $.ajax({
                url: $(this).attr('data-link'),
                data: 'data=' + parseInt($(this).val()),
            });
        });
        $('.setOrder').bind('change keyup', function () {
            $.ajax({
                url: $(this).attr('data-link'),
                data: 'data=' + parseInt($(this).val()),
            });
        });
    });

    $(document).ready(function () {
        jQuery('#select_all').on('change', function () {
            if (jQuery(this).is(':checked')) {
                jQuery('input.select').each(function () {
                    this.checked = true;
                });
            } else {
                jQuery('input.select').each(function () {
                    this.checked = false;
                });
            }
        });

        $('#delete-batch').click(function () {
            var arrCheck = [];
            jQuery('input.select').each(function () {
                if ($(this).is(':checked')) {
                    arrCheck.push($(this).val());
                }
            });

            if (arrCheck == "") {
                bootbox.confirm("Chọn mục cần xóa ", function (result) {
                    if (result == true) {

                    }
                });

            } else {
                bootbox.confirm("Bạn Có Chắc Chắn Muốn Xóa? ", function (result) {
                    if (result == true) {
                        DeleteBatch(arrCheck);
                    }
                });
            }
        });

    });

    function DeleteBatch(arrCheck) {
        $.ajax({
            type: 'POST',
            url: '<?php echo $this->createUrl("deleteBatch"); ?>',
            data: {
                ID: arrCheck
            },
            success: function (result) {
                location.reload();
            }
        });
    }

</script>

<script>

    function updateFeature(id) {
        $.ajax({
            url: '<?= $this->createUrl('UpdateFeature'); ?>',
            type: 'POST',
            data: {
                id: id,
            },
            success: function (data) {
                location.reload();

            },
            error: function (e) {
                //called when there is an error
                //console.log(e.message);
            }
        });
    }



    function updateNew(id) {
        $.ajax({
            url: '<?= $this->createUrl('UpdateNew'); ?>',
            type: 'POST',
            data: {
                id: id,
            },
            success: function (data) {
                location.reload();

            },
            error: function (e) {
                //called when there is an error
                //console.log(e.message);
            }
        });
    }
    function updateBestSeller(id) {
        $.ajax({
            url: '<?= $this->createUrl('UpdateBestSeller'); ?>',
            type: 'POST',
            data: {
                id: id,
            },
            success: function (data) {
                location.reload();
            },
            error: function (e) {
                //called when there is an error
                //console.log(e.message);
            }
        });
    }
    function updateSpecial(id) {
        $.ajax({
            url: '<?= $this->createUrl('UpdateSpecial'); ?>',
            type: 'POST',
            data: {
                id: id,
            },
            success: function (data) {
                location.reload();
            },
            error: function (e) {
                //called when there is an error
                //console.log(e.message);
            }
        });
    }
    function updateRating(id) {
        $.ajax({
            url: '<?= $this->createUrl('UpdateRating'); ?>',
            type: 'POST',
            data: {
                id: id,
            },
            success: function (data) {
                location.reload();
            },
            error: function (e) {
                //called when there is an error
                //console.log(e.message);
            }
        });
    }
    function updateViewed(id) {
        $.ajax({
            url: '<?= $this->createUrl('UpdateViewed'); ?>',
            type: 'POST',
            data: {
                id: id,
            },
            success: function (data) {
                location.reload();
            },
            error: function (e) {
                //called when there is an error
                //console.log(e.message);
            }
        });
    }

</script>

<script>

    function confirmdelete(id) {
        bootbox.confirm("Bạn Có Chắc Chắn Muốn Xóa? ", function (result) {
            if (result == true) {
                DeleteByID(id);
            }
        });
    }

    function DeleteByID(ID) {

        $.ajax({
            type: 'POST',
            url: '<?php echo $this->createUrl("delete"); ?>',
            data: {
                ID: ID
            },
            success: function (result) {
                location.reload();
            }
        });
    }
</script>