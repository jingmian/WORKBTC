<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

$this->title = $name;
?>

<div class="main">
    <div class="container">


        <div class="row service-box margin-bottom-40">
            <div class="col-md-12 col-sm-12 padding-top-80">

                <div class="alert alert-danger">
                    <p>
                        <?php echo Yii::t('app', 'Content Not Found'); ?>
                    </p>
                    <p>

                        <?php echo Yii::t('app', 'Please contact us if you think this is a server error. Thank you.'); ?>
                    </p>
                </div>


            </div>
        </div>
    </div>


</div>