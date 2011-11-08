<div class="box create rounded">

	<a class="button good" href="<?php echo site_url(SITE_AREA . settings .'/'. teams .'/create'); ?>">
		<?php echo lang('teams_create_new_button'); ?>
	</a>

	<h3><?php echo lang('teams_create_new'); ?></h3>

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
		<th>Created</th>
		
			<th><?php echo lang('teams_actions'); ?></th>
		</thead>
		<tbody>
		
		<?php foreach ($records as $record) : ?>
			<?php $record = (array)$record;?>
			<tr>
			<?php foreach($record as $field => $value) : ?>
				
				<?php if ($field != 'id') : ?>
					<td><?php echo ($field == 'deleted') ? (($value > 0) ? lang('teams_true') : lang('teams_false')) : $value; ?></td>
				<?php endif; ?>
				
			<?php endforeach; ?>

				<td>
					<?php echo anchor(SITE_AREA .'/settings/teams/edit/'. $record[$primary_key_field], lang('teams_edit'), '') ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
<?php endif; ?>