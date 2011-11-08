
<?php if (validation_errors()) : ?>
<div class="notification error">
	<?php echo validation_errors(); ?>
</div>
<?php endif; ?>
<?php // Change the css classes to suit your needs    
if( isset($team_roles) ) {
	$team_roles = (array)$team_roles;
}
$id = isset($team_roles['id']) ? "/".$team_roles['id'] : '';
?>
<?php echo form_open($this->uri->uri_string(), 'class="constrained ajax-form"'); ?>
<div>
        <?php echo form_label('Name', 'team_roles_name'); ?> <span class="required">*</span>
        <input id="team_roles_name" type="text" name="team_roles_name" maxlength="80" value="<?php echo set_value('team_roles_name', isset($team_roles['team_roles_name']) ? $team_roles['team_roles_name'] : ''); ?>"  />
</div>



	<div class="text-right">
		<br/>
		<input type="submit" name="submit" value="Edit team_roles" /> or <?php echo anchor(SITE_AREA .'/content/team_roles', lang('team_roles_cancel')); ?>
	</div>
	<?php echo form_close(); ?>

	<div class="box delete rounded">
		<a class="button" id="delete-me" href="<?php echo site_url(SITE_AREA .'/content/team_roles/delete/'. $id); ?>" onclick="return confirm('<?php echo lang('team_roles_delete_confirm'); ?>')"><?php echo lang('team_roles_delete_record'); ?></a>
		
		<h3><?php echo lang('team_roles_delete_record'); ?></h3>
		
		<p><?php echo lang('team_roles_edit_text'); ?></p>
	</div>
