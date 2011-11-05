<div class="box create rounded">

	<a class="button good" href="<?php echo site_url(SITE_AREA . content .'/'. test_types .'/create'); ?>">
		<?php echo lang('test_types_create_new_button'); ?>
	</a>

	<h3><?php echo lang('test_types_create_new'); ?></h3>

	<p><?php echo lang('test_types_edit_text'); ?></p>

</div>

<br />

<?php if (isset($records) && is_array($records) && count($records)) : ?>
				
	<h2>test_types</h2>
	<table>
		<thead>
		
			
		<th>Test type name</th>
		<th>Test type description</th>
		
			<th><?php echo lang('test_types_actions'); ?></th>
		</thead>
		<tbody>
		
		<?php foreach ($records as $record) : ?>
			<?php $record = (array)$record;?>
			<tr>
			<?php foreach($record as $field => $value) : ?>
				
				<?php if ($field != 'id') : ?>
					<td><?php echo ($field == 'deleted') ? (($value > 0) ? lang('test_types_true') : lang('test_types_false')) : $value; ?></td>
				<?php endif; ?>
				
			<?php endforeach; ?>

				<td>
					<?php echo anchor(SITE_AREA .'/content/test_types/edit/'. $record[$primary_key_field], lang('test_types_edit'), '') ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
<?php endif; ?>