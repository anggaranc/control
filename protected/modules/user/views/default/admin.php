<?php
/* @var $this DefaultController */
/* @var $model User */
$this->pageTitle=Yii::app()->name . ' - User';
$this->breadcrumbs = array (
	Yii::t ('User', 'User'), 
);

$viewJs = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.modules.user.js') . '/view.js');
Yii::app()->clientScript->registerScriptFile($viewJs, CClientScript::POS_BEGIN);

$allowCreateUser = Yii::app()->user->checkAccess('User_Create');
$allowGlobalResetPassword = Yii::app()->user->checkAccess('User_Global_Reset_Password');

$ajaxErrorMessage = Yii::t('Misc', "Unknown error occured! Please contact administrator!");

?>

<?php $this->renderPartial('//dataTable'); ?>

<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title"><span class="glyphicon glyphicon-th-list"></span> User</h3>
	</div>
	<div class="panel-body">
		<?php if ($allowCreateUser || $allowGlobalResetPassword): ?>
		    <div class="btn-group">
				<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
					Action <span class="caret"></span>
				</button>
				<ul class="dropdown-menu" role="menu">
					<?php if ($allowCreateUser): ?>
						<li><a href="<?php echo Yii::app()->createUrl('user/create'); ?>"><?php echo Yii::t('User', 'Create User'); ?></a></li>
					<?php endif; ?>
					
					<?php if ($allowGlobalResetPassword): ?>
						<li class="divider"></li>
						<li><a href="#"><?php echo Yii::t('User', 'Global Reset Password'); ?></a></li>
					<?php endif; ?>
				</ul>
			</div>
		
			<div class="btn btn-info as-show-hide" data-target="as-user">
				<?php echo Yii::t('Misc', 'Advanced Search'); ?>&nbsp;&nbsp;<span class="glyphicon glyphicon-chevron-down"></span>
			</div>

            <?php $this->widget('application.components.EAdvancedSearch', array(
                'id' => 'as-user',
                'model' => $model,
                'target' => 'user-grid',
				'hide' => true,
                'criteria' => array(
                    'searchPrivilege' => $model->getAttributeLabel('searchPrivilege'),
                ),
            )); ?>
		<?php endif; ?>
		<?php
			$viewVisible = Yii::app()->user->checkAccess('User_View');
			$updateVisible = Yii::app()->user->checkAccess('User_Update');
			$deleteVisible = Yii::app()->user->checkAccess('User_Delete');
			
			$this->widget('zii.widgets.grid.CGridView', array(
				'id' => 'user-grid',
				'dataProvider' => $model->search(),
				'filter' => $model,
				'ajaxUpdate'=>false,
				'rowHtmlOptionsExpression' => 'array("id"=>$data->id)',
                'pager' => array('class' => 'CLinkPager', 'header' => ''),
				'columns' => array(
					array(
						'visible' => $viewVisible || $updateVisible || $deleteVisible,
						'class' => 'CButtonColumn',
						'template' => '{view} {update} {delete} {bview}',
						'buttons' => array(
							'view' => array(
								'visible' => "$viewVisible",
							),
							'update' => array(
								'visible' => "$updateVisible",
							),
							'delete' => array(
								'visible' => "$deleteVisible",
							),
							'bview' => array(
								'label' => '',
								'url' => '"javascript:void(0);"',
								'options' => array(
									'onclick' => 'render($(this));',
									'class' => 'glyphicon glyphicon-chevron-down',
								),
							),
						),
						'afterDelete' => "function(link, success, data) {
							var result = $.parseJSON(data);

							if (!success) {
								app_flash({type: 'error', text: '" . $ajaxErrorMessage . "'});" .
							"}
							else {
								if (result.error == 0) {
									app_flash({type: 'success', text: result.message});
								}
								else {
									app_flash({type: 'error', text: result.message});
								}
							}
						}",
					),
					'username',
					'email',
					'enable',
					'userType',
				),
			)); ?>
  	</div>
</div>
