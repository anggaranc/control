<?php
/* @var $this DefaultController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Room Ds',
);

$this->menu=array(
	array('label'=>'Create RoomD', 'url'=>array('create')),
	array('label'=>'Manage RoomD', 'url'=>array('admin')),
);
?>

<h1>Room Ds</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
