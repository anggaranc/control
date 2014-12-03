<?php
/* @var $this DefaultController */
/* @var $model User */
/* @var $form CActiveForm */

Yii::app()->clientScript->registerScript('row-counter',
	'var rowCounter = ' . count($privileges) . ';',
	CClientScript::POS_HEAD);

$isOnEdit = !$model->isNewRecord;

?>

<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'user-form',
	'enableAjaxValidation' => false,
	'focus' => array($model, $isOnEdit ? 'email' : 'username'),
	'htmlOptions' => array(
		'class' => 'form-horizontal',
	),
)); ?>

<div class="panel panel-info">
	<div class="panel-heading">
		<h1 class="panel-title"><span class="glyphicon glyphicon-pencil"></span>&nbsp;
			<?php echo Yii::t('User', ($model->isNewRecord ? 'Create' : 'Update') . ' User'); ?>
		</h1>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<?php echo $form->labelEx($model, 'username', array(
						'class' => 'col-md-3 control-label',
					)); ?>
					<div class="col-md-9">
						<?php echo $form->textField($model, 'username', array(
							'class' => 'form-control',
							'size' => 90,
							'readonly' => $isOnEdit,
							'placeholder' => $model->getAttributeLabel('username'),
						)); ?>
						<?php echo $form->error($model, 'username'); ?>
					</div>
				</div>
				
				<?php if ($model->isNewRecord): ?>
					<div class="form-group">
						<?php echo $form->labelEx($model, 'password', array(
							'class' => 'col-md-3 control-label',
						)); ?>
						<div class="col-md-9">
							<?php echo $form->textField($model, 'password', array(
								'class' => 'form-control',
								'size' => 70,
								'placeholder' => $model->getAttributeLabel('password'),
							)); ?>						
							<?php echo $form->error($model, 'password'); ?>
						</div>
					</div>
				<?php endif; ?>
					
				<div class="form-group">
					<?php echo $form->labelEx($model, 'email', array(
						'class' => 'col-md-3 control-label',
					)); ?>
					<div class="col-md-9">
						<?php echo $form->textField($model, 'email', array(
							'class' => 'form-control',
							'size' => 70,
							'placeholder' => $model->getAttributeLabel('email'),
						)); ?>						
						<?php echo $form->error($model, 'email'); ?>
					</div>
				</div>
				
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<?php echo $form->labelEx($model, 'enable', array(
						'class' => 'col-md-3 control-label',
					)); ?>
					<div class="col-md-8">
						<?php echo $form->dropDownList($model, 'enable', array('Yes' => 'Yes', 'No' => 'No'), array(
							'class' => 'form-control',
							'empty' => Yii::t('User', '-- Select Enable --'),
						)); ?>
						<?php echo $form->error($model, 'enable'); ?>
					</div>
				</div>
				<div class="form-group">
					<?php echo $form->labelEx($model, 'userType', array(
						'class' => 'col-md-3 control-label',
					)); ?>
					<div class="col-md-8">
						<?php echo $form->dropDownList($model, 'userType', array('admin' => 'Administrator', 'regular' => 'Regular'), array(
							'class' => 'form-control',
							'empty' => Yii::t('User', '-- Select User Type --'),
						)); ?>
						<?php echo $form->error($model, 'userType'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="panel-heading">
		<h1 class="panel-title"><span class="glyphicon glyphicon-cog"></span>&nbsp;
			<?php echo Yii::t('User', 'Privileges'); ?>
		</h1>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label class="col-md-3 control-label">Privileges</label>
					<div class="col-md-9">
						<?php echo ECHtml::dropDownList('dummy_privilege', '', '', 
							array(
								'value' => 'name',
								'query' => "SELECT t1.name
											FROM {{AuthItem}} t1
											ORDER BY t1.name",
								'emptyLabel' => Yii::t('Misc', '-- Select Privilege --'),
								'label' => array(
									array('name', '', ''),
								),
							),
							array(
								'class' => 'form-control',
							)); ?>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div id="btn-add" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Add</div>
				<div id="btn-remove-all" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Remove All</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<table class="table table-striped">
					<tr>
						<th>&nbsp;</th>
						<th>Privilege</th>
						<th>Description</th>
						<th>&nbsp;</th>
					</tr>
					
					<?php if (count($privileges)): ?>
						<?php $rowCounter = 0; ?>
						<?php foreach ($privileges as $privilege): ?>
							<tr class="row-data">
								<td style='vertical-align:middle;' style='width: 50px;'>
									<a href='javascript:void(0);' class='row-remove'><span class='glyphicon glyphicon-remove'></span></a>
									<input type='hidden' name='UserPrivilege[<?php echo $rowCounter; ?>][privilege]' value='<?php echo $privilege['privilege']; ?>'/>
									<input type='hidden' name='UserPrivilege[<?php echo $rowCounter; ?>][description]' value='<?php echo $privilege['description']; ?>'/>
								</td>
								<td><?php echo $privilege['privilege']; ?></td>
								<td><?php echo $privilege['description']; ?></td>
								<td><div></div></td>
							</tr>
							<?php $rowCounter++; ?>
						<?php endforeach; ?>
					<?php endif; ?>
							
					<tr class="no-data-row" <?php echo (count($privileges) > 0 ? " style='display:none;'" : ""); ?>>
						<td colspan="4" class="align-center">No data added!</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
	<div class="panel-footer">
		<?php echo CHtml::submitButton(!$isOnEdit ? Yii::t('Misc', 'Create') : Yii::t('Misc', 'Update'), array('class' => 'btn btn-primary')); ?>
	</div>
</div>

<?php $this->endWidget(); ?>
