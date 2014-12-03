<?php
/* @var $this DefaultController */
/* @var $model RoomD */

$this->breadcrumbs=array(
	'Room Ds'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List RoomD', 'url'=>array('index')),
	array('label'=>'Create RoomD', 'url'=>array('create')),
	array('label'=>'View RoomD', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage RoomD', 'url'=>array('admin')),
);
?>

<h1>Update RoomD <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>