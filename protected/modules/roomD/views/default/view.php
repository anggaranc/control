<?php
/* @var $this DefaultController */
/* @var $model RoomD */

$this->breadcrumbs=array(
	'Room Ds'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List RoomD', 'url'=>array('index')),
	array('label'=>'Create RoomD', 'url'=>array('create')),
	array('label'=>'Update RoomD', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete RoomD', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RoomD', 'url'=>array('admin')),
);
?>

<h1>View RoomD #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'lampD1',
		'lampD2',
		'ldrD1',
		'ldrD2',
		'lampD1TimerStatus',
		'lampD1TimerStart',
		'lampD1TimerStop',
		'lampD2TimerStatus',
		'lampD2TimerStart',
		'lampD2TimerStop',
	),
)); ?>
