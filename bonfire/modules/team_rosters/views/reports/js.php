$.subscribe('list-view/list-item/click', function(id) {
	$('#content').load('<?php echo site_url(SITE_AREA .'/reports/team_rosters/edit') ?>/'+ id);
});