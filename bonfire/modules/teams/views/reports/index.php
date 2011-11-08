
<div class="view split-view">
	
	<!-- teams List -->
	<div class="view">
	
	<?php if (isset($records) && is_array($records) && count($records)) : ?>
		<div class="scrollable">
			<div class="list-view" id="role-list">
				<?php foreach ($records as $record) : ?>
					<?php $record = (array)$record;?>
					<div class="list-item" data-id="<?php echo $record['id']; ?>">
						<p>
							<b><?php echo (empty($record['teams_name']) ? $record['id'] : $record['teams_name']); ?></b><br/>
							<span class="small"><?php echo (empty($record['teams_description']) ? lang('teams_edit_text') : $record['teams_description']);  ?></span>
						</p>
					</div>
				<?php endforeach; ?>
			</div>	<!-- /list-view -->
		</div>
	
	<?php else: ?>
	
	<div class="notification attention">
		<p><?php echo lang('teams_no_records'); ?> <?php echo anchor(SITE_AREA .'/reports/teams/create', lang('teams_create_new'), array("class" => "ajaxify")) ?></p>
	</div>
	
	<?php endif; ?>
	</div>
	<!-- teams Editor -->
	<div id="content" class="view">
		<div class="scrollable" id="ajax-content">
				
			<div class="box create rounded">
				<a class="button good ajaxify" href="<?php echo site_url(SITE_AREA .'/reports/teams/create')?>"><?php echo lang('teams_create_new_button');?></a>

				<h3><?php echo lang('teams_create_new');?></h3>

				<p><?php echo lang('teams_edit_text'); ?></p>
			</div>
			<br />
				<?php if (isset($records) && is_array($records) && count($records)) : ?>
				
					<h2>teams</h2>
	<table>
		<thead>
		<th>Team Name</th>
		<th>Logo</th>
		<th>Deleted</th>
		<th>Created</th><th><?php echo lang('teams_actions'); ?></th>
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
				<td><?php echo ($field == 'deleted') ? (($value > 0) ? lang('teams_true') : lang('teams_false')) : $value; ?></td>

<?php
		}
	}
?>
				<td><?php echo anchor(SITE_AREA .'/reports/teams/edit/'. $record['id'], lang('teams_edit'), 'class="ajaxify"'); ?></td>
			</tr>
<?php endforeach; ?>
		</tbody>
	</table>
				<?php endif; ?>
				
		</div>	<!-- /ajax-content -->
	</div>	<!-- /content -->
</div>
