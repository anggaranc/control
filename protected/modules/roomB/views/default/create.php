<?php
/* @var $this DefaultController */
/* @var $model RoomB */

$this->breadcrumbs=array(
	'Room Bs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List RoomB', 'url'=>array('index')),
	array('label'=>'Manage RoomB', 'url'=>array('admin')),
);
?>

<h1>Create RoomB</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>