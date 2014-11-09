<?php
/* @var $this DefaultController */
/* @var $model RoomB */

$this->breadcrumbs=array(
	'Room Bs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List RoomB', 'url'=>array('index')),
	array('label'=>'Create RoomB', 'url'=>array('create')),
	array('label'=>'Update RoomB', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete RoomB', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RoomB', 'url'=>array('admin')),
);
?>

<h1>View RoomB #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'lampB1',
		'lampB2',
		'ldrB1',
		'ldrB2',
		'lampB1TimerStatus',
		'lampB1TimerStart',
		'lampB1TimerStop',
		'lampB2TimerStatus',
		'lampB2TimerStart',
		'lampB2TimerStop',
	),
)); ?>
