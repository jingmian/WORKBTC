<div id="content" class="snap-content">
    <div class="header-clear"></div>

    <div class="content">                

        <div class="container-fullscreen">
            <iframe class="responsive-image maps" src="https://maps.google.com/?ie=UTF8&amp;ll=47.595131,-122.330414&amp;spn=0.006186,0.016512&amp;t=h&amp;z=17&amp;output=embed"></iframe>
            <a href="page-map.html" class="button button-red button-fullscreen uppercase ultrabold">FullScreen Map</a>
        </div>

        <div class="one-half-responsive">

            <div class="container no-bottom">
                <div class="contact-form no-bottom"> 
                    <div class="formSuccessMessageWrap" id="formSuccessMessageWrap">
                        <div class="container">
                            <div class="decoration"></div>
                            <?php if (Yii::app()->user->hasFlash('contact')): ?>
                                <div class="alert-success" style="height: 40px;line-height: 40px;padding-left: 10px;-webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px;">
                                    <i class="fa fa-check-circle"></i>
                                    <h4 class="center-text">Message Sent </h4>
                                    <p class="center-text"> <?php echo Yii::app()->user->getFlash('contact'); ?></p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <fieldset>
                        <?php
                        $form = $this->beginWidget('CActiveForm', array(
                            'id' => 'contact-form',
                            'enableClientValidation' => true,
                            'clientOptions' => array(
                                'validateOnSubmit' => true,
                            ),
                        ));
                        ?>

                        <div class="formValidationError bg-red-dark color-white" id="contactNameFieldError">
                            <p class="center-text uppercase small-text"><?php echo $form->error($model, 'name'); ?></p>
                        </div>             
                        <div class="formValidationError bg-red-dark color-white" id="contactEmailFieldError">
                            <p class="center-text uppercase small-text"> <?php echo $form->error($model, 'email'); ?></p>
                        </div> 
                        <div class="formValidationError bg-red-dark color-white" id="contactEmailFieldError2">
                            <p class="center-text uppercase small-text"> <?php echo $form->error($model, 'email'); ?></p>
                        </div> 
                        <div class="formValidationError bg-red-dark color-white" id="contactMessageTextareaError">
                            <p class="center-text uppercase small-text"> <?php echo $form->error($model, 'subject'); ?></p>
                        </div>
                        <div class="formValidationError bg-red-dark color-white" id="contactMessageTextareaError">
                            <p class="center-text uppercase small-text"> <?php echo $form->error($model, 'body'); ?></p>
                        </div>

                        <div class="formFieldWrap">
                            <?php echo $form->labelEx($model, 'name', array('class' => 'field-title contactNameField')); ?>
                            <?php echo $form->textField($model, 'name', array('class' => 'contactField requiredField')); ?>
                        </div>
                        <div class="formFieldWrap">
                            <?php echo $form->labelEx($model, 'email', array('class' => 'field-title contactNameField')); ?>
                            <?php echo $form->textField($model, 'email', array('class' => 'contactField requiredField')); ?>
                        </div>
                        <div class="formFieldWrap">
                            <?php echo $form->labelEx($model, 'subject', array('class' => 'field-title contactNameField')); ?>
                            <?php echo $form->textField($model, 'subject', array('size' => 60, 'maxlength' => 128, 'class' => 'contactField requiredField')); ?>
                        </div>
                        <div class="formFieldWrap">
                            <?php echo $form->labelEx($model, 'body', array('class' => 'field-title contactNameField')); ?>
                            <?php echo $form->textArea($model, 'body', array('rows' => 6, 'cols' => 50, 'class' => 'contactTextarea requiredField')); ?>
                        </div>
                        <div class="formFieldWrap">
                            <?php if (CCaptcha::checkRequirements()): ?>
                                <?php echo $form->labelEx($model, 'verifyCode', array('class' => 'field-title contactNameField')); ?>
                                <div>
                                    <?php $this->widget('CCaptcha'); ?>
                                    <?php echo $form->textField($model, 'verifyCode', array('class' => 'contactField requiredField')); ?>
                                </div>
                                <?php echo $form->error($model, 'verifyCode'); ?>
                            <?php endif; ?>
                        </div>
                        <div class="formSubmitButtonErrorsWrap contactFormButton">
                            <input type="submit" class="buttonWrap button button-green contactSubmitButton" id="contactSubmitButton" value="Send Message" data-formId="contactForm"/>
                        </div>
                    </fieldset>
                    <?php $this->endWidget(); ?>
                </div>
            </div>
        </div>

        <div class="decoration hide-if-responsive"></div>
        <div class="one-half-responsive last-column">
            <div class="container no-bottom">
                <h4>Contact Information</h4>
                <p>
                    <?php echo $this->config['addressTop']; ?>
                </p>
            </div>            
        </div>
        <div class="decoration"></div>
        <div class="footer-clear disabled"></div>

    </div>
</div>