
<div class="view split-view">
	
	<!-- team_roles List -->
	<div class="view">
	
	<?php if (isset($records) && is_array($records) && count($records)) : ?>
		<div class="scrollable">
			<div class="list-view" id="role-list">
				<?php foreach ($records as $record) : ?>
					<?php $record = (array)$record;?>
					<div class="list-item" data-id="<?php echo $record['id']; ?>">
						<p>
							<b><?php echo (empty($record['team_roles_name']) ? $record['id'] : $record['team_roles_name']); ?></b><br/>
							<span class="small"><?php echo (empty($record['team_roles_description']) ? lang('team_roles_edit_text') : $record['team_roles_description']);  ?></span>
						</p>
					</div>
				<?php endforeach; ?>
			</div>	<!-- /list-view -->
		</div>
	
	<?php else: ?>
	
	<div class="notification attention">
		<p><?php echo lang('team_roles_no_records'); ?> <?php echo anchor(SITE_AREA .'/content/team_roles/create', lang('team_roles_create_new'), array("class" => "ajaxify")) ?></p>
	</div>
	
	<?php endif; ?>
	</div>
	<!-- team_roles Editor -->
	<div id="content" class="view">
		<div class="scrollable" id="ajax-content">
				
			<div class="box create rounded">
				<a class="button good ajaxify" href="<?php echo site_url(SITE_AREA .'/content/team_roles/create')?>"><?php echo lang('team_roles_create_new_button');?></a>

				<h3><?php echo lang('team_roles_create_new');?></h3>

				<p><?php echo lang('team_roles_edit_text'); ?></p>
			</div>
			<br />
				<?php if (isset($records) && is_array($records) && count($records)) : ?>
				
					<h2>team_roles</h2>
	<table>
		<thead>
		<th>Name</th>
		<th>Deleted</th><th><?php echo lang('team_roles_actions'); ?></th>
		</thead>
		<tbody>
<?php
foreach ($records as $record) : ?>
<?php $record = (array)$record;?>
			<tr>
<?php
	foreach($record as $field => $value)
	{
		if($field != "id") {
?>
				<td><?php echo ($field == 'deleted') ? (($value > 0) ? lang('team_roles_true') : lang('team_roles_false')) : $value; ?></td>

<?php
		}
	}
?>
				<td><?php echo anchor(SITE_AREA .'/content/team_roles/edit/'. $record['id'], lang('team_roles_edit'), 'class="ajaxify"'); ?></td>
			</tr>
<?php endforeach; ?>
		</tbody>
	</table>
				<?php endif; ?>
				
		</div>	<!-- /ajax-content -->
	</div>	<!-- /content -->
</div>
