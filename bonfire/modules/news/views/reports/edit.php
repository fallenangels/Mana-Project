
<?php if (validation_errors()) : ?>
<div class="notification error">
	<?php echo validation_errors(); ?>
</div>
<?php endif; ?>
<?php // Change the css classes to suit your needs    
if( isset($news) ) {
	$news = (array)$news;
}
$id = isset($news['id']) ? "/".$news['id'] : '';
?>
<?php echo form_open($this->uri->uri_string(), 'class="constrained ajax-form"'); ?>
<div>
        <?php echo form_label('Poster', 'news_poster_id'); ?> <span class="required">*</span>

        <?php // Change the values in this array to populate your dropdown as required ?>
        
<?php $options = array(
				11 => 11,
); ?>

        <?php echo form_dropdown('news_poster_id', $options, set_value('news_poster_id', isset($news['news_poster_id']) ? $news['news_poster_id'] : ''))?>
</div>                                             
                        
<div>
        <?php echo form_label('Title', 'news_title'); ?> <span class="required">*</span>
        <input id="news_title" type="text" name="news_title" maxlength="255" value="<?php echo set_value('news_title', isset($news['news_title']) ? $news['news_title'] : ''); ?>"  />
</div>

<div>
        <?php echo form_label('Content', 'news_content'); ?> <span class="required">*</span>
			<script type="text/javascript">
				head.ready(function(){
					//<![CDATA[
					if( !('news_content' in CKEDITOR.instances)) {
						CKEDITOR.replace( 'news_content' );
					}
					//]]>
				});
			</script>
	<?php echo form_textarea( array( 'name' => 'news_content', 'id' => 'news_content', 'rows' => '5', 'cols' => '80', 'value' => set_value('news_content', isset($news['news_content']) ? $news['news_content'] : '') ) )?>
</div>
<div>
        <?php echo form_label('Summary', 'news_summary'); ?>
			<script type="text/javascript">
				head.ready(function(){
					//<![CDATA[
					if( !('news_summary' in CKEDITOR.instances)) {
						CKEDITOR.replace( 'news_summary' );
					}
					//]]>
				});
			</script>
	<?php echo form_textarea( array( 'name' => 'news_summary', 'id' => 'news_summary', 'rows' => '5', 'cols' => '80', 'value' => set_value('news_summary', isset($news['news_summary']) ? $news['news_summary'] : '') ) )?>
</div>


	<div class="text-right">
		<br/>
		<input type="submit" name="submit" value="Edit news" onclick="javascript:CKEDITOR.instances.news_content.destroy();CKEDITOR.instances.news_summary.destroy();" /> or <?php echo anchor(SITE_AREA .'/reports/news', lang('news_cancel')); ?>
	</div>
	<?php echo form_close(); ?>

	<div class="box delete rounded">
		<a class="button" id="delete-me" href="<?php echo site_url(SITE_AREA .'/reports/news/delete/'. $id); ?>" onclick="return confirm('<?php echo lang('news_delete_confirm'); ?>')"><?php echo lang('news_delete_record'); ?></a>
		
		<h3><?php echo lang('news_delete_record'); ?></h3>
		
		<p><?php echo lang('news_edit_text'); ?></p>
	</div>
