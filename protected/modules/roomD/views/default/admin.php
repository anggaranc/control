<?php
/* @var $this DefaultController */
/* @var $model RoomD */

$this->breadcrumbs=array(
	'Room Ds'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List RoomD', 'url'=>array('index')),
	array('label'=>'Create RoomD', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#room-d-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Room Ds</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'room-d-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'lampD1',
		'lampD2',
		'ldrD1',
		'ldrD2',
		'lampD1TimerStatus',
		/*
		'lampD1TimerStart',
		'lampD1TimerStop',
		'lampD2TimerStatus',
		'lampD2TimerStart',
		'lampD2TimerStop',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
