<?php
/* @var $this DefaultController */
/* @var $model RoomC */

$this->breadcrumbs=array(
	'Room Cs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List RoomC', 'url'=>array('index')),
	array('label'=>'Create RoomC', 'url'=>array('create')),
	array('label'=>'View RoomC', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage RoomC', 'url'=>array('admin')),
);
?>

<h1>Update RoomC <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>