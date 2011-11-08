
<?php if (validation_errors()) : ?>
<div class="notification error">
	<?php echo validation_errors(); ?>
</div>
<?php endif; ?>
<?php // Change the css classes to suit your needs    
if( isset($teams) ) {
	$teams = (array)$teams;
}
$id = isset($teams['id']) ? "/".$teams['id'] : '';
?>
<?php echo form_open($this->uri->uri_string(), 'class="constrained ajax-form"'); ?>
<div>
        <?php echo form_label('Team Name', 'teams_name'); ?> <span class="required">*</span>
        <input id="teams_name" type="text" name="teams_name" maxlength="80" value="<?php echo set_value('teams_name', isset($teams['teams_name']) ? $teams['teams_name'] : ''); ?>"  />
</div>

<div>
        <?php echo form_label('Logo', 'teams_logo'); ?>
        <input id="teams_logo" type="text" name="teams_logo" maxlength="80" value="<?php echo set_value('teams_logo', isset($teams['teams_logo']) ? $teams['teams_logo'] : ''); ?>"  />
</div>



	<div class="text-right">
		<br/>
		<input type="submit" name="submit" value="Edit teams" /> or <?php echo anchor(SITE_AREA .'/settings/teams', lang('teams_cancel')); ?>
	</div>
	<?php echo form_close(); ?>

	<div class="box delete rounded">
		<a class="button" id="delete-me" href="<?php echo site_url(SITE_AREA .'/settings/teams/delete/'. $id); ?>" onclick="return confirm('<?php echo lang('teams_delete_confirm'); ?>')"><?php echo lang('teams_delete_record'); ?></a>
		
		<h3><?php echo lang('teams_delete_record'); ?></h3>
		
		<p><?php echo lang('teams_edit_text'); ?></p>
	</div>
