
<div class="view split-view">
	
	<!-- user_profiles List -->
	<div class="view">
	
	<?php if (isset($records) && is_array($records) && count($records)) : ?>
		<div class="scrollable">
			<div class="list-view" id="role-list">
				<?php foreach ($records as $record) : ?>
					<?php $record = (array)$record;?>
					<div class="list-item" data-id="<?php echo $record['id']; ?>">
						<p>
							<b><?php echo (empty($record['user_profiles_name']) ? $record['id'] : $record['user_profiles_name']); ?></b><br/>
							<span class="small"><?php echo (empty($record['user_profiles_description']) ? lang('user_profiles_edit_text') : $record['user_profiles_description']);  ?></span>
						</p>
					</div>
				<?php endforeach; ?>
			</div>	<!-- /list-view -->
		</div>
	
	<?php else: ?>
	
	<div class="notification attention">
		<p><?php echo lang('user_profiles_no_records'); ?> <?php echo anchor(SITE_AREA .'/settings/user_profiles/create', lang('user_profiles_create_new'), array("class" => "ajaxify")) ?></p>
	</div>
	
	<?php endif; ?>
	</div>
	<!-- user_profiles Editor -->
	<div id="content" class="view">
		<div class="scrollable" id="ajax-content">
				
			<div class="box create rounded">
				<a class="button good ajaxify" href="<?php echo site_url(SITE_AREA .'/settings/user_profiles/create')?>"><?php echo lang('user_profiles_create_new_button');?></a>

				<h3><?php echo lang('user_profiles_create_new');?></h3>

				<p><?php echo lang('user_profiles_edit_text'); ?></p>
			</div>
			<br />
				<?php if (isset($records) && is_array($records) && count($records)) : ?>
				
					<h2>user_profiles</h2>
	<table>
		<thead>
		<th>User ID</th>
		<th>Gamer Tag</th>
		<th>Character Code</th>
		<th>Stream URL</th>
		<th>Deleted</th>
		<th>Created</th>
		<th>Modified</th><th><?php echo lang('user_profiles_actions'); ?></th>
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
				<td><?php echo ($field == 'deleted') ? (($value > 0) ? lang('user_profiles_true') : lang('user_profiles_false')) : $value; ?></td>

<?php
		}
	}
?>
				<td><?php echo anchor(SITE_AREA .'/settings/user_profiles/edit/'. $record['id'], lang('user_profiles_edit'), 'class="ajaxify"'); ?></td>
			</tr>
<?php endforeach; ?>
		</tbody>
	</table>
				<?php endif; ?>
				
		</div>	<!-- /ajax-content -->
	</div>	<!-- /content -->
</div>
