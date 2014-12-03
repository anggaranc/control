<?php
/* @var $this DefaultController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Room As',
);

$this->menu=array(
	array('label'=>'Create RoomA', 'url'=>array('create')),
	array('label'=>'Manage RoomA', 'url'=>array('admin')),
);
?>

<h1>Room As</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
