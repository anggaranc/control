<?php
/* @var $this DefaultController */
/* @var $data RoomA */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lampA1')); ?>:</b>
	<?php echo CHtml::encode($data->lampA1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lampA2')); ?>:</b>
	<?php echo CHtml::encode($data->lampA2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ldrA1')); ?>:</b>
	<?php echo CHtml::encode($data->ldrA1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ldrA2')); ?>:</b>
	<?php echo CHtml::encode($data->ldrA2); ?>
	<br />


</div>