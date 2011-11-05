
<?php if (validation_errors()) : ?>
<div class="notification error">
	<?php echo validation_errors(); ?>
</div>
<?php endif; ?>
<?php // Change the css classes to suit your needs    
if( isset($test_types) ) {
	$test_types = (array)$test_types;
}
$id = isset($test_types['id']) ? "/".$test_types['id'] : '';
?>
<?php echo form_open($this->uri->uri_string(), 'class="constrained ajax-form"'); ?>
<div>
        <?php echo form_label('Test type name', 'test_types_name'); ?> <span class="required">*</span>
        <input id="test_types_name" type="text" name="test_types_name" maxlength="255" value="<?php echo set_value('test_types_name', isset($test_types['test_types_name']) ? $test_types['test_types_name'] : ''); ?>"  />
</div>

<div>
        <?php echo form_label('Test type description', 'test_types_description'); ?>
        <input id="test_types_description" type="text" name="test_types_description" maxlength="800" value="<?php echo set_value('test_types_description', isset($test_types['test_types_description']) ? $test_types['test_types_description'] : ''); ?>"  />
</div>



	<div class="text-right">
		<br/>
		<input type="submit" name="submit" value="Edit test_types" /> or <?php echo anchor(SITE_AREA .'/content/test_types', lang('test_types_cancel')); ?>
	</div>
	<?php echo form_close(); ?>

	<div class="box delete rounded">
		<a class="button" id="delete-me" href="<?php echo site_url(SITE_AREA .'/content/test_types/delete/'. $id); ?>" onclick="return confirm('<?php echo lang('test_types_delete_confirm'); ?>')"><?php echo lang('test_types_delete_record'); ?></a>
		
		<h3><?php echo lang('test_types_delete_record'); ?></h3>
		
		<p><?php echo lang('test_types_edit_text'); ?></p>
	</div>
