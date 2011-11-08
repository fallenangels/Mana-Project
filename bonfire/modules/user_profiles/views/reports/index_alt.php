<div class="box create rounded">

	<a class="button good" href="<?php echo site_url(SITE_AREA . reports .'/'. user_profiles .'/create'); ?>">
		<?php echo lang('user_profiles_create_new_button'); ?>
	</a>

	<h3><?php echo lang('user_profiles_create_new'); ?></h3>

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
		<th>Modified</th>
		
			<th><?php echo lang('user_profiles_actions'); ?></th>
		</thead>
		<tbody>
		
		<?php foreach ($records as $record) : ?>
			<?php $record = (array)$record;?>
			<tr>
			<?php foreach($record as $field => $value) : ?>
				
				<?php if ($field != 'id') : ?>
					<td><?php echo ($field == 'deleted') ? (($value > 0) ? lang('user_profiles_true') : lang('user_profiles_false')) : $value; ?></td>
				<?php endif; ?>
				
			<?php endforeach; ?>

				<td>
					<?php echo anchor(SITE_AREA .'/reports/user_profiles/edit/'. $record[$primary_key_field], lang('user_profiles_edit'), '') ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
<?php endif; ?>