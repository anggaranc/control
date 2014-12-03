<?php
/* @var $this DefaultController */
/* @var $model RoomA */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'room-a-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'lampA1'); ?>
		<?php echo $form->textField($model,'lampA1',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'lampA1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lampA2'); ?>
		<?php echo $form->textField($model,'lampA2',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'lampA2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ldrA1'); ?>
		<?php echo $form->textField($model,'ldrA1',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'ldrA1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ldrA2'); ?>
		<?php echo $form->textField($model,'ldrA2',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'ldrA2'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->