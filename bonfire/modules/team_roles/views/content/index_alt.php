<div class="box create rounded">

	<a class="button good" href="<?php echo site_url(SITE_AREA . content .'/'. team_roles .'/create'); ?>">
		<?php echo lang('team_roles_create_new_button'); ?>
	</a>

	<h3><?php echo lang('team_roles_create_new'); ?></h3>

	<p><?php echo lang('team_roles_edit_text'); ?></p>

</div>

<br />

<?php if (isset($records) && is_array($records) && count($records)) : ?>
				
	<h2>team_roles</h2>
	<table>
		<thead>
		
			
		<th>Name</th>
		<th>Deleted</th>
		
			<th><?php echo lang('team_roles_actions'); ?></th>
		</thead>
		<tbody>
		
		<?php foreach ($records as $record) : ?>
			<?php $record = (array)$record;?>
			<tr>
			<?php foreach($record as $field => $value) : ?>
				
				<?php if ($field != 'id') : ?>
					<td><?php echo ($field == 'deleted') ? (($value > 0) ? lang('team_roles_true') : lang('team_roles_false')) : $value; ?></td>
				<?php endif; ?>
				
			<?php endforeach; ?>

				<td>
					<?php echo anchor(SITE_AREA .'/content/team_roles/edit/'. $record[$primary_key_field], lang('team_roles_edit'), '') ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
<?php endif; ?>