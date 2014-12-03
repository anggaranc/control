<tr class="sub-view" style="background:white;">
	<td colspan="<?php echo $colspan; ?>">
		<div class="panel panel-success">
			<div class="panel-heading">
				<div class="panel-title">
					<span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;<?php echo Yii::t('User', 'Privileges'); ?>
				</div>
			</div>
			<div class="panel-body">
				<table id="dt-user-<?php echo $id; ?>">
					<thead>
						<tr>
							<th>Privilege</th>
							<th>Description</th>
						</tr>
					</thead>
					<tbody>
						<?php if (count($models)): ?>
							<?php foreach ($models as $model): ?>
							<tr>
								<td><?php echo $model->itemname; ?></td>
								<td><?php echo $model->authItem->description; ?></td>
							</tr>
							<?php endforeach; ?>
						<?php endif; ?>
					</tbody>
				</table>
			</div>
		</div>
	</td>
</tr>
