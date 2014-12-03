<?php
/* @var $this DefaultController */
/* @var $model RoomA */

$this->breadcrumbs=array(
	'Room As'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List RoomA', 'url'=>array('index')),
	array('label'=>'Manage RoomA', 'url'=>array('admin')),
);
?>

<h1>Create RoomA</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>