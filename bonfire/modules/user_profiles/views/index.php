<div class="box create rounded">

	<h3>user_profiles</h3>

</div>

<br />

<?php if (isset($records) && is_array($records) && count($records)) : ?>
				
	<table>
		<thead>
		
			
		<th>User ID</th>
		<th>Gamer Tag</th>
		<th>Character Code</th>
		<th>Stream URL</th>
		<th>Deleted</th>
		<th>Created</th>
		<th>Modified</th>
		
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

			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
<?php endif; ?>