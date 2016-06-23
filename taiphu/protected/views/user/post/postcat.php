<div class="pagewrap">

    <div class="colCent" style="background: #fff">

        <div class="titBox" style="padding-bottom: 20px;margin-left: 20px;margin-top: 20px;margin-right: 20px">
            <div class="title-detail"><?php echo $model['name_' . Yii::app()->language]; ?></div>
        </div>

        <div class="overHide" style="padding-left: 10px">
            <div class="listNews">
                <?php
                if ($models):
                    foreach ($models as $post) :
                        $link = Yii::app()->createUrl('post/post', array('slug' => $post['slug']));
                        ?>

                        <li class="oneNews">
                            <a title="<?php echo $post['name_vi']; ?>" href="<?php echo $link; ?>" class="thumb" style="background-image: url(&quot;<?php echo $post['image']; ?>&quot;);">
                                <img alt="<?php echo $post['name_vi']; ?>" src="<?php echo $post['image']; ?>" width="190" >
                            </a>
                            <ul>
                                <a title="<?php echo $post['name_vi']; ?>" href="<?php echo $link; ?>">
                                    <?php echo $post['name_vi']; ?>
                                </a>
                                <div style="margin: 0px; padding: 0px; border: 0px;">
                                    <p>
                                        <?php echo $post['des_vi']; ?>
                                    </p>
                                </div>
                            </ul>
                        </li>

                        <?php
                    endforeach;
                endif;
                ?>
            </div><!--end listNews-->


            <div class="clr"></div>


            <?php
            $this->widget('CLinkPager', array(
                'currentPage' => $pages->getCurrentPage(),
                'itemCount' => $pages->getItemCount(),
                'pageSize' => $pages->getPageSize(),
                'maxButtonCount' => 5,
                'header' => '',
                'htmlOptions' => array('class' => 'nums'),
            ));
            ?>

            <div class="clr"></div>
        </div><!--end overHide-->

        <div class="clr"></div>
    </div>
</div>