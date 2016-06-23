<?php
/* @var $this VideosController */

$this->breadcrumbs = array(
    'Slideshows',
);
?>
<!--<a class="btn btn-success" href="<?= $this->createUrl('add'); ?>" title="Thêm mới"><i class="fa fa-plus"></i> Thêm mới slideshow</a>-->
<hr/>
<div class="table-responsive">
    <table class="table table-bordered table-tripped">
        <thead>
            <tr>
                <th>STT</th>
                <!--<th>Tên Thành viên</th>-->
                <!--<th>Địa Chỉ</th>-->
                <!--<th>Điện Thoại</th>-->
                <th>Email</th>
                <!--<th>Thể Loại</th>-->
                <!--<th>Loại Xe</th>-->
                <th>Trạng Thái</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($models):
                $step = 1;
                foreach ($models as $keyM => $valueM):
                    ?>
                    <tr>
                        <td><?= $step++; ?></td>
                        <!--<td><? CHtml::encode($valueM['fullname']); ?></td>-->
                        <!--<td><? CHtml::encode($valueM['address']); ?></td>-->
                        <!--<td><? CHtml::encode($valueM['phone']); ?></td>-->
                        <td><?= CHtml::encode($valueM['email']); ?></td>
                        <!--<td><? CHtml::encode($valueM['deal']); ?></td>-->
                        <!--<td><? CHtml::encode($valueM['category_id']); ?></td>-->
                        <td><?= CHtml::dropDownList('homepage', $valueM['hinhthuc'], array('Non-Active', 'Active'), array('class' => 'setHomePage', 'data-link' => $this->createUrl('setHomePage', array('id' => $valueM['id'])))); ?></td>
                        <td>
                            <!--<a href="<?php // echo  $this->createUrl('update', array('id' => $valueM['id']));  ?>"><i class="fa fa-pencil"></i></a>-->
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
    </table>
</div>

<script>
    jQuery(function($) {
        $('.setHomePage').bind('change', function() {
            $.ajax({
                url: $(this).attr('data-link'),
                data: 'data=' + parseInt($(this).val()),
            });
        });
        
    });
</script>


<script>
    function confirmdelete(id) {
        bootbox.confirm("Bạn Có Chắc Chắn Muốn Xóa? ", function(result) {
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
            success: function(result) {
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