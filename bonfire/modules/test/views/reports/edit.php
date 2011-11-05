
<?php if (validation_errors()) : ?>
<div class="notification error">
	<?php echo validation_errors(); ?>
</div>
<?php endif; ?>
<?php // Change the css classes to suit your needs    
if( isset($test) ) {
	$test = (array)$test;
}
$id = isset($test['id']) ? "/".$test['id'] : '';
?>
<?php echo form_open($this->uri->uri_string(), 'class="constrained ajax-form"'); ?>
<div>
        <?php echo form_label('Name', 'test_name'); ?> <span class="required">*</span>
        <input id="test_name" type="text" name="test_name" maxlength="255" value="<?php echo set_value('test_name', isset($test['test_name']) ? $test['test_name'] : ''); ?>"  />
</div>

<div>
        <?php echo form_label('Type', 'test_type'); ?> <span class="required">*</span>

        <?php // Change the values in this array to populate your dropdown as required ?>
        
<?php $options = array(
				11 => 11,
); ?>

        <?php echo form_dropdown('test_type', $options, set_value('test_type', isset($test['test_type']) ? $test['test_type'] : ''))?>
</div>                                             
                        


	<div class="text-right">
		<br/>
		<input type="submit" name="submit" value="Edit test" /> or <?php echo anchor(SITE_AREA .'/reports/test', lang('test_cancel')); ?>
	</div>
	<?php echo form_close(); ?>

	<div class="box delete rounded">
		<a class="button" id="delete-me" href="<?php echo site_url(SITE_AREA .'/reports/test/delete/'. $id); ?>" onclick="return confirm('<?php echo lang('test_delete_confirm'); ?>')"><?php echo lang('test_delete_record'); ?></a>
		
		<h3><?php echo lang('test_delete_record'); ?></h3>
		
		<p><?php echo lang('test_edit_text'); ?></p>
	</div>
