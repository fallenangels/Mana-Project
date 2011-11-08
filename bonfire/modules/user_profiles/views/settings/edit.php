
<?php if (validation_errors()) : ?>
<div class="notification error">
	<?php echo validation_errors(); ?>
</div>
<?php endif; ?>
<?php // Change the css classes to suit your needs    
if( isset($user_profiles) ) {
	$user_profiles = (array)$user_profiles;
}
$id = isset($user_profiles['id']) ? "/".$user_profiles['id'] : '';
?>
<?php echo form_open($this->uri->uri_string(), 'class="constrained ajax-form"'); ?>
<div>
        <?php echo form_label('User ID', 'user_profiles_user_id'); ?> <span class="required">*</span>

        <?php // Change the values in this array to populate your dropdown as required ?>
        
<?php $options = array(
				11 => 11,
); ?>

        <?php echo form_dropdown('user_profiles_user_id', $options, set_value('user_profiles_user_id', isset($user_profiles['user_profiles_user_id']) ? $user_profiles['user_profiles_user_id'] : ''))?>
</div>                                             
                        
<div>
        <?php echo form_label('Gamer Tag', 'user_profiles_gamer_tag'); ?>
        <input id="user_profiles_gamer_tag" type="text" name="user_profiles_gamer_tag" maxlength="40" value="<?php echo set_value('user_profiles_gamer_tag', isset($user_profiles['user_profiles_gamer_tag']) ? $user_profiles['user_profiles_gamer_tag'] : ''); ?>"  />
</div>

<div>
        <?php echo form_label('Character Code', 'user_profiles_character_code'); ?>
        <input id="user_profiles_character_code" type="text" name="user_profiles_character_code" maxlength="3" value="<?php echo set_value('user_profiles_character_code', isset($user_profiles['user_profiles_character_code']) ? $user_profiles['user_profiles_character_code'] : ''); ?>"  />
</div>

<div>
        <?php echo form_label('Stream URL', 'user_profiles_stream_url'); ?>
        <input id="user_profiles_stream_url" type="text" name="user_profiles_stream_url" maxlength="80" value="<?php echo set_value('user_profiles_stream_url', isset($user_profiles['user_profiles_stream_url']) ? $user_profiles['user_profiles_stream_url'] : ''); ?>"  />
</div>



	<div class="text-right">
		<br/>
		<input type="submit" name="submit" value="Edit user_profiles" /> or <?php echo anchor(SITE_AREA .'/settings/user_profiles', lang('user_profiles_cancel')); ?>
	</div>
	<?php echo form_close(); ?>

	<div class="box delete rounded">
		<a class="button" id="delete-me" href="<?php echo site_url(SITE_AREA .'/settings/user_profiles/delete/'. $id); ?>" onclick="return confirm('<?php echo lang('user_profiles_delete_confirm'); ?>')"><?php echo lang('user_profiles_delete_record'); ?></a>
		
		<h3><?php echo lang('user_profiles_delete_record'); ?></h3>
		
		<p><?php echo lang('user_profiles_edit_text'); ?></p>
	</div>
