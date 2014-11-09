<?php
/* @var $this DefaultController */
/* @var $model User */
$this->pageTitle=Yii::app()->name . ' - User';
$formJs = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.modules.user.js') . '/form.js');
Yii::app()->clientScript->registerScriptFile($formJs, CClientScript::POS_BEGIN);

$this->breadcrumbs = array(
	Yii::t('User', 'User') => array(Yii::app()->createUrl('user')),
	Yii::t('User', 'Update User'),
);

?>

<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<?php echo $this->renderPartial('_form', array(
			'model' => $model,
			'privileges' => $privileges,
		)); ?>
	</div>
	<div class="col-md-2"></div>
</div>

