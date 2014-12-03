<?php
/* @var $this DefaultController */
/* @var $model RoomD */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'room-d-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'lampD1'); ?>
		<?php echo $form->textField($model,'lampD1',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'lampD1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lampD2'); ?>
		<?php echo $form->textField($model,'lampD2',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'lampD2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ldrD1'); ?>
		<?php echo $form->textField($model,'ldrD1',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'ldrD1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ldrD2'); ?>
		<?php echo $form->textField($model,'ldrD2',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'ldrD2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lampD1TimerStatus'); ?>
		<?php echo $form->textField($model,'lampD1TimerStatus',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'lampD1TimerStatus'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lampD1TimerStart'); ?>
		<?php echo $form->textField($model,'lampD1TimerStart'); ?>
		<?php echo $form->error($model,'lampD1TimerStart'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lampD1TimerStop'); ?>
		<?php echo $form->textField($model,'lampD1TimerStop'); ?>
		<?php echo $form->error($model,'lampD1TimerStop'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lampD2TimerStatus'); ?>
		<?php echo $form->textField($model,'lampD2TimerStatus',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'lampD2TimerStatus'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lampD2TimerStart'); ?>
		<?php echo $form->textField($model,'lampD2TimerStart'); ?>
		<?php echo $form->error($model,'lampD2TimerStart'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lampD2TimerStop'); ?>
		<?php echo $form->textField($model,'lampD2TimerStop'); ?>
		<?php echo $form->error($model,'lampD2TimerStop'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->