<?php
/* @var $this DefaultController */
/* @var $data RoomD */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lampD1')); ?>:</b>
	<?php echo CHtml::encode($data->lampD1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lampD2')); ?>:</b>
	<?php echo CHtml::encode($data->lampD2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ldrD1')); ?>:</b>
	<?php echo CHtml::encode($data->ldrD1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ldrD2')); ?>:</b>
	<?php echo CHtml::encode($data->ldrD2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lampD1TimerStatus')); ?>:</b>
	<?php echo CHtml::encode($data->lampD1TimerStatus); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lampD1TimerStart')); ?>:</b>
	<?php echo CHtml::encode($data->lampD1TimerStart); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('lampD1TimerStop')); ?>:</b>
	<?php echo CHtml::encode($data->lampD1TimerStop); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lampD2TimerStatus')); ?>:</b>
	<?php echo CHtml::encode($data->lampD2TimerStatus); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lampD2TimerStart')); ?>:</b>
	<?php echo CHtml::encode($data->lampD2TimerStart); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lampD2TimerStop')); ?>:</b>
	<?php echo CHtml::encode($data->lampD2TimerStop); ?>
	<br />

	*/ ?>

</div>