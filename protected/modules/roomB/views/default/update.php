<?php
/* @var $this DefaultController */
/* @var $model RoomB */

$this->breadcrumbs=array(
	'Room Bs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List RoomB', 'url'=>array('index')),
	array('label'=>'Create RoomB', 'url'=>array('create')),
	array('label'=>'View RoomB', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage RoomB', 'url'=>array('admin')),
);
?>

<h1>Update RoomB <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>