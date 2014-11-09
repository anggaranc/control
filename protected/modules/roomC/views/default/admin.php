<?php
/* @var $this DefaultController */
/* @var $model RoomC */

$this->breadcrumbs=array(
	'Room Cs'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List RoomC', 'url'=>array('index')),
	array('label'=>'Create RoomC', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#room-c-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Room Cs</h1>

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
	'id'=>'room-c-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'lampC1',
		'lampC2',
		'ldrC1',
		'ldrC2',
		'lampC1TimerStatus',
		/*
		'lampC1TimerStart',
		'lampC1TimerStop',
		'lampC2TimerStatus',
		'lampC2TimerStart',
		'lampC2TimerStop',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
