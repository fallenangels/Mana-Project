$.subscribe('list-view/list-item/click', function(id) {
	$('#content').load('<?php echo site_url(SITE_AREA .'/reports/user_profiles/edit') ?>/'+ id);
});