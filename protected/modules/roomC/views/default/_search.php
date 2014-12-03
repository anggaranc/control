<?php
/* @var $this DefaultController */
/* @var $model RoomC */
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
		<?php echo $form->label($model,'lampC1'); ?>
		<?php echo $form->textField($model,'lampC1',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lampC2'); ?>
		<?php echo $form->textField($model,'lampC2',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ldrC1'); ?>
		<?php echo $form->textField($model,'ldrC1',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ldrC2'); ?>
		<?php echo $form->textField($model,'ldrC2',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lampC1TimerStatus'); ?>
		<?php echo $form->textField($model,'lampC1TimerStatus',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lampC1TimerStart'); ?>
		<?php echo $form->textField($model,'lampC1TimerStart'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lampC1TimerStop'); ?>
		<?php echo $form->textField($model,'lampC1TimerStop'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lampC2TimerStatus'); ?>
		<?php echo $form->textField($model,'lampC2TimerStatus',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lampC2TimerStart'); ?>
		<?php echo $form->textField($model,'lampC2TimerStart'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lampC2TimerStop'); ?>
		<?php echo $form->textField($model,'lampC2TimerStop'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->