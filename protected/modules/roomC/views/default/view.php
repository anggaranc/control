<?php
/* @var $this DefaultController */
/* @var $model RoomC */

$this->breadcrumbs=array(
	'Room Cs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List RoomC', 'url'=>array('index')),
	array('label'=>'Create RoomC', 'url'=>array('create')),
	array('label'=>'Update RoomC', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete RoomC', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RoomC', 'url'=>array('admin')),
);
?>

<h1>View RoomC #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'lampC1',
		'lampC2',
		'ldrC1',
		'ldrC2',
		'lampC1TimerStatus',
		'lampC1TimerStart',
		'lampC1TimerStop',
		'lampC2TimerStatus',
		'lampC2TimerStart',
		'lampC2TimerStop',
	),
)); ?>
