<?php
/* @var $this DefaultController */
/* @var $model Log */
$this->pageTitle=Yii::app()->name . ' - System Log';
$this->breadcrumbs = array(
	Yii::t('Log', 'System Log'),
);


?>


<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title"><span class="glyphicon glyphicon-th-list"></span> <?php echo Yii::t('Log', 'System Log'); ?></h3>
	</div>
	<div class="panel-body">
			<?php
                        
			$this->widget('zii.widgets.grid.CGridView', array(
				'id' => 'log-grid',
				'dataProvider' => $model->search(),
				'filter' => $model,
				'ajaxUpdate'=>false,
				'columns' => array(
					'id',
					'level',
					'category',
					'logtime',
					'message',
				),
			)); ?>
  	</div>
</div>
