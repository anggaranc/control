<?php
/* @var $this DefaultController */
/* @var $data RoomC */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lampC1')); ?>:</b>
	<?php echo CHtml::encode($data->lampC1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lampC2')); ?>:</b>
	<?php echo CHtml::encode($data->lampC2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ldrC1')); ?>:</b>
	<?php echo CHtml::encode($data->ldrC1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ldrC2')); ?>:</b>
	<?php echo CHtml::encode($data->ldrC2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lampC1TimerStatus')); ?>:</b>
	<?php echo CHtml::encode($data->lampC1TimerStatus); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lampC1TimerStart')); ?>:</b>
	<?php echo CHtml::encode($data->lampC1TimerStart); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('lampC1TimerStop')); ?>:</b>
	<?php echo CHtml::encode($data->lampC1TimerStop); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lampC2TimerStatus')); ?>:</b>
	<?php echo CHtml::encode($data->lampC2TimerStatus); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lampC2TimerStart')); ?>:</b>
	<?php echo CHtml::encode($data->lampC2TimerStart); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lampC2TimerStop')); ?>:</b>
	<?php echo CHtml::encode($data->lampC2TimerStop); ?>
	<br />

	*/ ?>

</div>