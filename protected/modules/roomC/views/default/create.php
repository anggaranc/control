<?php
/* @var $this DefaultController */
/* @var $model RoomC */

$this->breadcrumbs=array(
	'Room Cs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List RoomC', 'url'=>array('index')),
	array('label'=>'Manage RoomC', 'url'=>array('admin')),
);
?>

<h1>Create RoomC</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>