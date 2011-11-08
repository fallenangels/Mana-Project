
<?php if (validation_errors()) : ?>
<div class="notification error">
	<?php echo validation_errors(); ?>
</div>
<?php endif; ?>
<?php // Change the css classes to suit your needs    
if( isset($races) ) {
	$races = (array)$races;
}
$id = isset($races['id']) ? "/".$races['id'] : '';
?>
<?php echo form_open($this->uri->uri_string(), 'class="constrained ajax-form"'); ?>
<div>
        <?php echo form_label('Name', 'races_name'); ?> <span class="required">*</span>
        <input id="races_name" type="text" name="races_name" maxlength="32" value="<?php echo set_value('races_name', isset($races['races_name']) ? $races['races_name'] : ''); ?>"  />
</div>

<div>
        <?php echo form_label('Icon', 'races_icon'); ?>
        <input id="races_icon" type="text" name="races_icon" maxlength="80" value="<?php echo set_value('races_icon', isset($races['races_icon']) ? $races['races_icon'] : ''); ?>"  />
</div>



	<div class="text-right">
		<br/>
		<input type="submit" name="submit" value="Create races" /> or <?php echo anchor(SITE_AREA .'/content/races', lang('races_cancel')); ?>
	</div>
	<?php echo form_close(); ?>
