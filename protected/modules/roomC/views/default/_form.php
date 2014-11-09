<?php
/* @var $this DefaultController */
/* @var $model RoomC */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'room-c-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'lampC1'); ?>
		<?php echo $form->textField($model,'lampC1',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'lampC1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lampC2'); ?>
		<?php echo $form->textField($model,'lampC2',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'lampC2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ldrC1'); ?>
		<?php echo $form->textField($model,'ldrC1',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'ldrC1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ldrC2'); ?>
		<?php echo $form->textField($model,'ldrC2',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'ldrC2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lampC1TimerStatus'); ?>
		<?php echo $form->textField($model,'lampC1TimerStatus',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'lampC1TimerStatus'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lampC1TimerStart'); ?>
		<?php echo $form->textField($model,'lampC1TimerStart'); ?>
		<?php echo $form->error($model,'lampC1TimerStart'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lampC1TimerStop'); ?>
		<?php echo $form->textField($model,'lampC1TimerStop'); ?>
		<?php echo $form->error($model,'lampC1TimerStop'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lampC2TimerStatus'); ?>
		<?php echo $form->textField($model,'lampC2TimerStatus',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'lampC2TimerStatus'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lampC2TimerStart'); ?>
		<?php echo $form->textField($model,'lampC2TimerStart'); ?>
		<?php echo $form->error($model,'lampC2TimerStart'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lampC2TimerStop'); ?>
		<?php echo $form->textField($model,'lampC2TimerStop'); ?>
		<?php echo $form->error($model,'lampC2TimerStop'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->