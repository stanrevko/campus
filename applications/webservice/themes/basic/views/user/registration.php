<div class="row">
    <div class="span6 offset3">

        <?php
        $this->pageTitle = Yii::app()->name . ' - ' . UserModule::t("Registration");
        $this->breadcrumbs = array(
            UserModule::t("Registration"),
        );
        ?>

        <div class="page-header">
            <h1><?php echo UserModule::t("Registration"); ?></h1>
        </div>


        <?php if (Yii::app()->user->hasFlash('registration')): ?>
            <div class="success">
                <?php echo Yii::app()->user->getFlash('registration'); ?>
            </div>
        <?php else: ?>
            <h4 class="widget-header"><i class="icon-gift"></i> Приєднайтеся до кампуса ФТІ</h4>
            <div class="widget-body">
                <div class="center-align">
                    <div class="form">
                        <?php
                        $form = $this->beginWidget('UActiveForm', array(
                            'id' => 'registration-form',
                            'enableAjaxValidation' => true,
                            'disableAjaxValidationAttributes' => array('RegistrationForm_verifyCode'),
                            'clientOptions' => array(
                                'validateOnSubmit' => true,
                            ),
                            'htmlOptions' => array('enctype' => 'multipart/form-data',
                                'class' => 'form-horizontal form-signin-signup'),
                                ));
                        ?>

                        <p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>

                        <?php // echo $form->errorSummary(array($model, $profile)); ?>

                        <div class="row">
                            <?php // echo $form->labelEx($model, 'username');  ?>
                            <?php echo $form->textField($model, 'username', array("placeholder" => $model->getAttributeLabel('username'))); ?>
                            <?php echo $form->error($model, 'username'); ?>
                        </div>

                        <div class="row">
                            <?php //  echo $form->labelEx($model, 'password');  ?>
                            <?php echo $form->passwordField($model, 'password', array("placeholder" => $model->getAttributeLabel('password'))); ?>
                            <?php echo $form->error($model, 'password'); ?>

                        </div>

                        <div class="row">
                            <?php // echo $form->labelEx($model, 'verifyPassword');  ?>
                            <?php echo $form->passwordField($model, 'verifyPassword', array("placeholder" => $model->getAttributeLabel('verifyPassword'))); ?>
                            <?php echo $form->error($model, 'verifyPassword'); ?>
                        </div>
                        <p class="hint">
                            <?php // echo UserModule::t("Minimal password length 4 symbols.");  ?>
                        </p>
                        <div class="row">
                            <?php // echo $form->labelEx($model, 'email');  ?>
                            <?php echo $form->textField($model, 'email', array("placeholder" => $model->getAttributeLabel('email'))); ?>
                            <?php echo $form->error($model, 'email'); ?>
                        </div>

                        <?php
                        $profileFields = $profile->getFields();
                        if ($profileFields) {
                            foreach ($profileFields as $field) {
                                ?>
                                <div class="row">
                                    <?php // echo $form->labelEx($profile, $field->varname);  ?>
                                    <?php
                                    if ($widgetEdit = $field->widgetEdit($profile)) {
                                        echo $widgetEdit;
                                    } elseif ($field->range) {
                                        echo $form->dropDownList($profile, $field->varname, Profile::range($field->range));
                                    } elseif ($field->field_type == "TEXT") {
                                        echo$form->textArea($profile, $field->varname, array('rows' => 6, 'cols' => 50));
                                    } else {
                                        echo $form->textField($profile, $field->varname, array('placeholder' => $model->getAttributeLabel($field->varname), 'size' => 60, 'maxlength' => (($field->field_size) ? $field->field_size : 255)));
                                    }
                                    ?>
                                    <?php echo $form->error($profile, $field->varname); ?>
                                </div>	
                                <?php
                            }
                        }
                        ?>
                        <?php if (UserModule::doCaptcha('registration')): ?>
                            <div class="row">
                                <?php echo $form->labelEx($model, 'verifyCode'); ?>

                                <?php $this->widget('CCaptcha'); ?>
                                <?php echo $form->textField($model, 'verifyCode', array('style'=>'width: 25%')); ?>
                                <?php echo $form->error($model, 'verifyCode'); ?>
                               
                            </div>
                        <?php endif; ?>

                        <div class="row submit">
                            <?php echo CHtml::submitButton(UserModule::t("Register"), array('class'=>'btn btn-primary btn-large')); ?>
                        </div>

                        <?php $this->endWidget(); ?>
                    </div><!-- form -->
                <?php endif; ?>
            </div>
        </div>

    </div>
</div>