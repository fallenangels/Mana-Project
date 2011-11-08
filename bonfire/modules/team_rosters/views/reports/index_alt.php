<div class="box create rounded">

	<a class="button good" href="<?php echo site_url(SITE_AREA . reports .'/'. team_rosters .'/create'); ?>">
		<?php echo lang('team_rosters_create_new_button'); ?>
	</a>

	<h3><?php echo lang('team_rosters_create_new'); ?></h3>

	<p><?php echo lang('team_rosters_edit_text'); ?></p>

</div>

<br />

<?php if (isset($records) && is_array($records) && count($records)) : ?>
				
	<h2>team_rosters</h2>
	<table>
		<thead>
		
			
		<th>Player ID</th>
		<th>Role</th>
		<th>Race</th>
		<th>Player Name</th>
		<th>Joined</th>
		<th>Deleted</th>
		<th>Created</th>
		
			<th><?php echo lang('team_rosters_actions'); ?></th>
		</thead>
		<tbody>
		
		<?php foreach ($records as $record) : ?>
			<?php $record = (array)$record;?>
			<tr>
			<?php foreach($record as $field => $value) : ?>
				
				<?php if ($field != 'id') : ?>
					<td><?php echo ($field == 'deleted') ? (($value > 0) ? lang('team_rosters_true') : lang('team_rosters_false')) : $value; ?></td>
				<?php endif; ?>
				
			<?php endforeach; ?>

				<td>
					<?php echo anchor(SITE_AREA .'/reports/team_rosters/edit/'. $record[$primary_key_field], lang('team_rosters_edit'), '') ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
<?php endif; ?>