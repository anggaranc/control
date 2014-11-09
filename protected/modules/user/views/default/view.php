<?php
/* @var $this DefaultController */
/* @var $model User */
$this->pageTitle=Yii::app()->name . ' - User';
$this->breadcrumbs = array(
	Yii::t('User', 'User') => array(Yii::app()->createUrl('user')),
	Yii::t('User', 'View'),
);

?>

<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;<?php echo Yii::t('User', 'View User') . " #" . $model->id; ?></h3>
	</div>
	<div class="panel-body">
		<?php $this->widget('zii.widgets.CDetailView', array(
			'data' => $model,
			'attributes' => array(
				'id',
				'username',
				'email',
				'enable',
				'userType',
			),
		)); ?>
	</div>
</div>
