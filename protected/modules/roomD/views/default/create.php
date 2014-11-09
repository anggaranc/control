<?php
/* @var $this DefaultController */
/* @var $model RoomD */

$this->breadcrumbs=array(
	'Room Ds'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List RoomD', 'url'=>array('index')),
	array('label'=>'Manage RoomD', 'url'=>array('admin')),
);
?>

<h1>Create RoomD</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>