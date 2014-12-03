
<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

//$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

  <section id="page-header" class="page-section">
    <div class="container effect-loaded clearfix bg2">
        <h1><i class="icon-user"></i> Login</h1>
      <ul class="breadcrumb">
        <li><a href="<?php echo Yii::app()->createUrl('/'); ?>">Home</a></li>
        <li class="active">Login</li>
      </ul>
    </div>
  </section>

<section id="sign_in2">
        <div class="container">
            
            <div class="row login">
                

                <div class="col-sm-12 signin_box">
                    <div class="box">
                        <div class="box_cont">
                            <center><h2>Login to your account</h2></center>
                            <hr>

                            <div class="form">
                                <?php $form=$this->beginWidget('CActiveForm', array(
                                                'id'=>'login-form',
                                                'enableClientValidation'=>true,
                                                'clientOptions'=>array(
                                                        'validateOnSubmit'=>true,
                                                ),
                                                'focus' => array($model, 'username'),
                                        )); ?>
                                                        <?php echo $form->textField($model,'username', array(
                                                            'class' => 'form-control ',
                                                            'placeholder' => 'Username',
                                                        )); ?>
                                                        <?php echo $form->error($model,'username'); ?>
                                
                                                        <?php echo $form->passwordField($model,'password', array(
                                                            'class' => 'form-control',
                                                            'placeholder' => 'Password',
                                                        )); ?>
                                                        <?php echo $form->error($model,'password'); ?> 
                                
                                                        
                                                        <div class="forgot">
                                                            <span class="login-checkbox">
                                                                    <?php echo $form->checkBox($model,'rememberMe', array(
                                                                        'class' => 'field login-checkbox',
                                                                        'tabindex' => '4',
                                                                    )); ?>
                                                                    <?php echo $form->label($model,'rememberMe', array(
                                                                        'class' => 'choice',
                                                                    )); ?>
                                                                    <?php echo $form->error($model,'rememberMe'); ?>
                                                            </span>
                                                        </div>
                                                        
                                                <?php echo CHtml::submitButton('Login'); ?>

                                        </div> <!-- .actions -->

                                        <?php $this->endWidget(); ?>
                                <div class="login-extra">
                                        Forgot Password? <?php echo CHtml::link('Click Here','forgot'); ?>
                                        <?php

                                        ?>
                                </div> <!-- /login-extra -->
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>  
