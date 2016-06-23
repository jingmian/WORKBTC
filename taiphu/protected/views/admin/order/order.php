<?php if ($models): ?>
    <table class="table table-brodered">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Tình trạng</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $step = 1;
            foreach ($models as $key => $value):
                $model = Yii::app()->db->createCommand('select * from `' . MProducts::model()->tableName() . '` where `id` = ' . intval($value['productId']) . ' order by `id` desc ')->queryRow();
                ?>
                <tr>
                    <td><?= $step++; ?></td>
                    <td><?= $value['productName']; ?></td>
                    <td><?= $value['number']; ?></td>
                    <td><?php echo number_format($model['price'], 0, ",", "."); ?> VNĐ</td>
                    <td>
                        <?php echo CHtml::dropDownList('', $value['check'], array('Chưa Xử Lý', 'Đã Xử Lý'), array('class' => 'updateStatus', 'data-target' => Yii::app()->createUrl('order/changeStatus', array('id' => $value['id'])))); ?>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <script>
        $('.updateStatus').bind('change', function () {
            $.ajax({
                url: $(this).attr('data-target'),
                data: 'data=' + $(this).val(),
            });
        });
    </script>
    <?php




 endif ?>