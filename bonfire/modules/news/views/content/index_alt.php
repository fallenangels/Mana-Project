<div class="box create rounded">

	<a class="button good" href="<?php echo site_url(SITE_AREA . content .'/'. news .'/create'); ?>">
		<?php echo lang('news_create_new_button'); ?>
	</a>

	<h3><?php echo lang('news_create_new'); ?></h3>

	<p><?php echo lang('news_edit_text'); ?></p>

</div>

<br />

<?php if (isset($records) && is_array($records) && count($records)) : ?>
				
	<h2>news</h2>
	<table>
		<thead>
		
			
		<th>Poster</th>
		<th>Title</th>
		<th>Content</th>
		<th>Summary</th>
		<th>Deleted</th>
		<th>Created</th>
		<th>Modified</th>
		
			<th><?php echo lang('news_actions'); ?></th>
		</thead>
		<tbody>
		
		<?php foreach ($records as $record) : ?>
			<?php $record = (array)$record;?>
			<tr>
			<?php foreach($record as $field => $value) : ?>
				
				<?php if ($field != 'id') : ?>
					<td><?php echo ($field == 'deleted') ? (($value > 0) ? lang('news_true') : lang('news_false')) : $value; ?></td>
				<?php endif; ?>
				
			<?php endforeach; ?>

				<td>
					<?php echo anchor(SITE_AREA .'/content/news/edit/'. $record[$primary_key_field], lang('news_edit'), '') ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
<?php endif; ?>