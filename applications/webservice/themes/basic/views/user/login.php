<div class="row">
    <?php
    $this->pageTitle = Yii::app()->name . ' - ' . UserModule::t("Login");
    $this->breadcrumbs = array(
        UserModule::t("Login"),
    );
    ?>
    <div class="span6 offset3">
        <h4 class="widget-header"><i class="icon-lock"></i><?php echo UserModule::t("Login"); ?></h4>

        <div class="widget-body">
            <div class="center-align">
                <?php if (Yii::app()->user->hasFlash('loginMessage')): ?>

                    <div class="success">
                        <?php echo Yii::app()->user->getFlash('loginMessage'); ?>
                    </div>

                <?php endif; ?>

                <div class="form">
                    <?php echo CHtml::beginForm('', 'post', array("class" => "form-horizontal form-signin-signup")); ?>

                    <?php echo CHtml::errorSummary($model); ?>

                    <div class="row">
                        <?php // echo CHtml::activeLabelEx($model,'username'); ?>
                        <?php echo CHtml::activeTextField($model, 'username', array("placeholder" => "Емейл")) ?>
                    </div>

                    <div class="row">
                        <?php // echo CHtml::activeLabelEx($model,'password'); ?>
                        <?php echo CHtml::activePasswordField($model, 'password', array("placeholder" => "Пароль")) ?>
                    </div>

                                  <div class="remember-me">
                        <div class="pull-left">
                            <label class="checkbox">
                                <?php echo CHtml::activeLabelEx($model, 'rememberMe'); ?>
                                <?php echo CHtml::activeCheckBox($model, 'rememberMe'); ?>
                            </label>
                        </div>
                        <div class="pull-right">
                            <?php echo CHtml::link(UserModule::t("Lost Password?"), Yii::app()->getModule('user')->recoveryUrl); ?>
                        </div>
                        <div class="clearfix"></div>
                    </div>



                    <div class="row submit">
                        <?php echo CHtml::submitButton(UserModule::t("Login"), array("class" => "btn btn-primary btn-large")); ?>
                    </div>

                    <?php echo CHtml::endForm(); ?>
                </div><!-- form -->
                <h4><i class="icon-question-sign"></i> Ще не зареєстровані?</h4>               
                <?php echo CHtml::link(UserModule::t("Register"), Yii::app()->getModule('user')->registrationUrl,array('class'=>"btn btn-large bottom-space")); ?> 



                <?php
                $form = new CForm(array(
                            'elements' => array(
                                'username' => array(
                                    'type' => 'text',
                                    'maxlength' => 32,
                                ),
                                'password' => array(
                                    'type' => 'password',
                                    'maxlength' => 32,
                                ),
                                'rememberMe' => array(
                                    'type' => 'checkbox',
                                )
                            ),
                            'buttons' => array(
                                'login' => array(
                                    'type' => 'submit',
                                    'label' => 'Login',
                                ),
                            ),
                                ), $model);
                ?>
            </div>
        </div>
    </div>
</div>