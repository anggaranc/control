<?php
/* @var $this DefaultController */
/* @var $data RoomB */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lampB1')); ?>:</b>
	<?php echo CHtml::encode($data->lampB1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lampB2')); ?>:</b>
	<?php echo CHtml::encode($data->lampB2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ldrB1')); ?>:</b>
	<?php echo CHtml::encode($data->ldrB1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ldrB2')); ?>:</b>
	<?php echo CHtml::encode($data->ldrB2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lampB1TimerStatus')); ?>:</b>
	<?php echo CHtml::encode($data->lampB1TimerStatus); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lampB1TimerStart')); ?>:</b>
	<?php echo CHtml::encode($data->lampB1TimerStart); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('lampB1TimerStop')); ?>:</b>
	<?php echo CHtml::encode($data->lampB1TimerStop); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lampB2TimerStatus')); ?>:</b>
	<?php echo CHtml::encode($data->lampB2TimerStatus); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lampB2TimerStart')); ?>:</b>
	<?php echo CHtml::encode($data->lampB2TimerStart); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lampB2TimerStop')); ?>:</b>
	<?php echo CHtml::encode($data->lampB2TimerStop); ?>
	<br />

	*/ ?>

</div>