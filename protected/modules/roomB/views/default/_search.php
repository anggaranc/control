<?php
/* @var $this DefaultController */
/* @var $model RoomB */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lampB1'); ?>
		<?php echo $form->textField($model,'lampB1',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lampB2'); ?>
		<?php echo $form->textField($model,'lampB2',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ldrB1'); ?>
		<?php echo $form->textField($model,'ldrB1',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ldrB2'); ?>
		<?php echo $form->textField($model,'ldrB2',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lampB1TimerStatus'); ?>
		<?php echo $form->textField($model,'lampB1TimerStatus',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lampB1TimerStart'); ?>
		<?php echo $form->textField($model,'lampB1TimerStart'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lampB1TimerStop'); ?>
		<?php echo $form->textField($model,'lampB1TimerStop'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lampB2TimerStatus'); ?>
		<?php echo $form->textField($model,'lampB2TimerStatus',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lampB2TimerStart'); ?>
		<?php echo $form->textField($model,'lampB2TimerStart'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lampB2TimerStop'); ?>
		<?php echo $form->textField($model,'lampB2TimerStop'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->