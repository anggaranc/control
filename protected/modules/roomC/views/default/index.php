<?php
/* @var $this DefaultController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Room Cs',
);

$this->menu=array(
	array('label'=>'Create RoomC', 'url'=>array('create')),
	array('label'=>'Manage RoomC', 'url'=>array('admin')),
);
?>

<h1>Room Cs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
