<?php
/* @var $this DefaultController */
/* @var $model RoomA */

$this->breadcrumbs=array(
	'Room As'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List RoomA', 'url'=>array('index')),
	array('label'=>'Create RoomA', 'url'=>array('create')),
	array('label'=>'View RoomA', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage RoomA', 'url'=>array('admin')),
);
?>

<h1>Update RoomA <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>