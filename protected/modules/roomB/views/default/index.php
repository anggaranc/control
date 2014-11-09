<?php
/* @var $this DefaultController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Room Bs',
);

$this->menu=array(
	array('label'=>'Create RoomB', 'url'=>array('create')),
	array('label'=>'Manage RoomB', 'url'=>array('admin')),
);
?>

<h1>Room Bs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
