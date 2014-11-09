<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */
Yii::app()->clientScript->registerCoreScript('yiiactiveform');
$this->pageTitle=Yii::app()->name . ' - Login';

//$this->breadcrumbs=array(
//	Yii::t ('Login', 'Login'),
//);

?>
<?php if (Yii::app()->user->isGuest): ?>
</br>
<div class="col-md-4 col-md-offset-4">
<div class="panel panel-danger">
	<div class="panel-heading">
		<h3 class="text-center"><span class="glyphicon glyphicon-user"></span> Login to your account</h3>
	</div>
	<div class="panel-body">
		<?php 
		$form=$this->beginWidget('CActiveForm', array(
			'id'=>'login-form',
			'enableClientValidation'=>true,
			'clientOptions'=>array(
				'validateOnSubmit'=>true,
			),
			'focus'=>array($model,'username'),
		)); ?>
		<div class="form">
			<form class="form-horizontal" role="form">
			  <div class="form-group text-left">
					<?php echo $form->labelEx($model,'username',array('class'=>'col-md-12 control-label')); ?>
					<?php echo $form->textField($model,'username',array('class'=>'form-control')); ?>
					<?php echo $form->error($model,'username'); ?>
			  </div>
			  <div class="form-group text-left">
					<?php echo $form->labelEx($model,'password',array('class'=>'col-md-12 control-label')); ?>
					<?php echo $form->passwordField($model,'password',array('class'=>'form-control')); ?>
					<?php echo $form->error($model,'password'); ?>
			  </div>
			  <div class="form-group">
				<div class="col-md-12">
				  <div class="checkbox text-left">
					<label>
					  <?php echo $form->checkBox($model,'rememberMe'); ?>
					  <?php echo $form->label($model,'rememberMe'); ?>
					  <?php echo $form->error($model,'rememberMe'); ?>
					</label>
				  </div>
				</div>
			  </div>
			  <div class="form-group text-center">
				<div class="">
					<?php echo CHtml::submitButton('Login',array('class'=>'btn btn-lg btn-danger', 'id'=> 'login')); ?>
				</div>
			  </div>
			</form>
		</div><!-- form -->
		<?php $this->endWidget(); ?>
	</div>
</div>

</div>
<?php endif; ?>
<?php if (!Yii::app()->user->isGuest): ?>
<div class="jumbotron alert alert-danger">
        <CENTER><h1 class="well">WELCOME</h1>
            <h1 class="well">HOME CONTROL</h1>
  
  <p><a class="btn btn-danger btn-lg" href="" target="_blank" role="button"><span class="glyphicon glyphicon-road"></span></a></p></CENTER>
</div>
<?php endif; ?>
