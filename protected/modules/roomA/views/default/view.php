<?php
/* @var $this DefaultController */
/* @var $model RoomA */

$this->breadcrumbs=array(
	'Room As'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List RoomA', 'url'=>array('index')),
	array('label'=>'Create RoomA', 'url'=>array('create')),
	array('label'=>'Update RoomA', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete RoomA', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RoomA', 'url'=>array('admin')),
);
?>

<h1>View RoomA #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'lampA1',
		'lampA2',
		'ldrA1',
		'ldrA2',
	),
)); ?>
