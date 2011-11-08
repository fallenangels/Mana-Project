
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
		<input type="submit" name="submit" value="Create teams" /> or <?php echo anchor(SITE_AREA .'/reports/teams', lang('teams_cancel')); ?>
	</div>
	<?php echo form_close(); ?>
