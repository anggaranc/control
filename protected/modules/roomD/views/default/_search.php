<?php
/* @var $this DefaultController */
/* @var $model RoomD */
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
		<?php echo $form->label($model,'lampD1'); ?>
		<?php echo $form->textField($model,'lampD1',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lampD2'); ?>
		<?php echo $form->textField($model,'lampD2',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ldrD1'); ?>
		<?php echo $form->textField($model,'ldrD1',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ldrD2'); ?>
		<?php echo $form->textField($model,'ldrD2',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lampD1TimerStatus'); ?>
		<?php echo $form->textField($model,'lampD1TimerStatus',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lampD1TimerStart'); ?>
		<?php echo $form->textField($model,'lampD1TimerStart'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lampD1TimerStop'); ?>
		<?php echo $form->textField($model,'lampD1TimerStop'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lampD2TimerStatus'); ?>
		<?php echo $form->textField($model,'lampD2TimerStatus',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lampD2TimerStart'); ?>
		<?php echo $form->textField($model,'lampD2TimerStart'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lampD2TimerStop'); ?>
		<?php echo $form->textField($model,'lampD2TimerStop'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->