<div class="box create rounded">

	<a class="button good" href="<?php echo site_url(SITE_AREA . content .'/'. races .'/create'); ?>">
		<?php echo lang('races_create_new_button'); ?>
	</a>

	<h3><?php echo lang('races_create_new'); ?></h3>

	<p><?php echo lang('races_edit_text'); ?></p>

</div>

<br />

<?php if (isset($records) && is_array($records) && count($records)) : ?>
				
	<h2>races</h2>
	<table>
		<thead>
		
			
		<th>Name</th>
		<th>Icon</th>
		
			<th><?php echo lang('races_actions'); ?></th>
		</thead>
		<tbody>
		
		<?php foreach ($records as $record) : ?>
			<?php $record = (array)$record;?>
			<tr>
			<?php foreach($record as $field => $value) : ?>
				
				<?php if ($field != 'id') : ?>
					<td><?php echo ($field == 'deleted') ? (($value > 0) ? lang('races_true') : lang('races_false')) : $value; ?></td>
				<?php endif; ?>
				
			<?php endforeach; ?>

				<td>
					<?php echo anchor(SITE_AREA .'/content/races/edit/'. $record[$primary_key_field], lang('races_edit'), '') ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
<?php endif; ?>