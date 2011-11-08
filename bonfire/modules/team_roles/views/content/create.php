
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
		<input type="submit" name="submit" value="Create team_roles" /> or <?php echo anchor(SITE_AREA .'/content/team_roles', lang('team_roles_cancel')); ?>
	</div>
	<?php echo form_close(); ?>
