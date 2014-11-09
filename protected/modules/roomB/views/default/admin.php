<?php
/* @var $this DefaultController */
/* @var $model RoomB */

$this->breadcrumbs=array(
	'Room Bs'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List RoomB', 'url'=>array('index')),
	array('label'=>'Create RoomB', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#room-b-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Room Bs</h1>

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
	'id'=>'room-b-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'lampB1',
		'lampB2',
		'ldrB1',
		'ldrB2',
		'lampB1TimerStatus',
		/*
		'lampB1TimerStart',
		'lampB1TimerStop',
		'lampB2TimerStatus',
		'lampB2TimerStart',
		'lampB2TimerStop',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
