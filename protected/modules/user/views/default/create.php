<?php
/* @var $this DefaultController */
/* @var $model User */

$formJs = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.modules.user.js') . '/form.js');
Yii::app()->clientScript->registerScriptFile($formJs, CClientScript::POS_BEGIN);
$this->pageTitle=Yii::app()->name . ' - User';
$this->breadcrumbs = array(
	Yii::t('User', 'User') => array(Yii::app()->createUrl('user')),
	Yii::t('User', 'Create User'),
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
