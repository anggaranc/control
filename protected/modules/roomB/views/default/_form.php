<?php
/* @var $this DefaultController */
/* @var $model RoomB */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'room-b-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'lampB1'); ?>
		<?php echo $form->textField($model,'lampB1',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'lampB1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lampB2'); ?>
		<?php echo $form->textField($model,'lampB2',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'lampB2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ldrB1'); ?>
		<?php echo $form->textField($model,'ldrB1',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'ldrB1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ldrB2'); ?>
		<?php echo $form->textField($model,'ldrB2',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'ldrB2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lampB1TimerStatus'); ?>
		<?php echo $form->textField($model,'lampB1TimerStatus',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'lampB1TimerStatus'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lampB1TimerStart'); ?>
		<?php echo $form->textField($model,'lampB1TimerStart'); ?>
		<?php echo $form->error($model,'lampB1TimerStart'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lampB1TimerStop'); ?>
		<?php echo $form->textField($model,'lampB1TimerStop'); ?>
		<?php echo $form->error($model,'lampB1TimerStop'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lampB2TimerStatus'); ?>
		<?php echo $form->textField($model,'lampB2TimerStatus',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'lampB2TimerStatus'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lampB2TimerStart'); ?>
		<?php echo $form->textField($model,'lampB2TimerStart'); ?>
		<?php echo $form->error($model,'lampB2TimerStart'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lampB2TimerStop'); ?>
		<?php echo $form->textField($model,'lampB2TimerStop'); ?>
		<?php echo $form->error($model,'lampB2TimerStop'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->