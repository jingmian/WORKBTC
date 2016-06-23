<?php
/* @var $this OrderController */
$this->breadcrumbs = array(
    'Đơn hàng',
);
?>

<a class="btn btn-danger pull-right" id="delete-batch" href="javascript:;" title="Xóa Tất Cả"><i class="fa fa-trash-o"></i> Xóa tất cả</a>
<hr />

<?php if ($models): ?>
    <table class="table table-brodered">
        <thead>
            <tr>
                <th style="width: 1%"><input type="checkbox" id="select_all" /></th>
                <th>STT</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Điện thoại</th>
                <th>Địa chỉ</th>
                <th>Tình trạng</th>
                <th>Xem đơn hàng</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $step = 1;
            foreach ($models as $key => $value):
                ?>
                <tr>
                    <td><input type="checkbox" name="select[]" class="select" value="<?php echo $value['id']; ?>"/></td>
                    <td><?= $step++; ?></td>
                    <td><?= $value['name']; ?></td>
                    <td><?= $value['email']; ?></td>
                    <td><?= $value['phone']; ?></td>
                    <td><?= $value['address']; ?></td>
                    <td><?= CHtml::dropDownList('homepage', $value['check'], array('Chưa Xử Lý ', 'Đã Xữ Lý'), array('class' => 'setHomePage', 'data-link' => $this->createUrl('setHomePage', array('id' => $value['id'])))); ?></td>
                    <td><a href="<?php echo Yii::app()->createUrl('order/showOrder', array('id' => $value['id'])); ?>">Xem đơn hàng</a></td>
                    <td>
                        <a class="btn btn-danger" href="javascript:;" onclick="confirmdelete('<?php echo $value['id']; ?>');
                                        return false;"><i class="fa fa-times"></i></a>
                    </td>
                </tr>
            <?php endforeach ?>
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
                            'header' => '',
                            'htmlOptions' => array('class' => 'pages'),
                        ));
                        ?>
                    </td>
                </tr>
            </tfoot>
        <?php endif; ?>
    </table>
<?php endif
?>

<script>
    jQuery(function ($) {
        $('.setHomePage').bind('change', function () {
            $.ajax({
                url: $(this).attr('data-link'),
                data: 'data=' + parseInt($(this).val()),
            });
        });

    });
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