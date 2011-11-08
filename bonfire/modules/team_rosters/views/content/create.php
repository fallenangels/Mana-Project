
<?php if (validation_errors()) : ?>
<div class="notification error">
	<?php echo validation_errors(); ?>
</div>
<?php endif; ?>
<?php // Change the css classes to suit your needs    
if( isset($team_rosters) ) {
	$team_rosters = (array)$team_rosters;
}
$id = isset($team_rosters['id']) ? "/".$team_rosters['id'] : '';
?>
<?php echo form_open($this->uri->uri_string(), 'class="constrained ajax-form"'); ?>
<div>
        <?php echo form_label('Player ID', 'team_rosters_player_id'); ?>

        <?php // Change the values in this array to populate your dropdown as required ?>
        
<?php $options = array(
				11 => 11,
); ?>

        <?php echo form_dropdown('team_rosters_player_id', $options, set_value('team_rosters_player_id', isset($team_rosters['team_rosters_player_id']) ? $team_rosters['team_rosters_player_id'] : ''))?>
</div>                                             
                        
<div>
        <?php echo form_label('Role', 'team_rosters_role_id'); ?> <span class="required">*</span>

        <?php // Change the values in this array to populate your dropdown as required ?>
        
<?php $options = array(
				11 => 11,
); ?>

        <?php echo form_dropdown('team_rosters_role_id', $options, set_value('team_rosters_role_id', isset($team_rosters['team_rosters_role_id']) ? $team_rosters['team_rosters_role_id'] : ''))?>
</div>                                             
                        
<div>
        <?php echo form_label('Race', 'team_rosters_race_id'); ?> <span class="required">*</span>

        <?php // Change the values in this array to populate your dropdown as required ?>
        
<?php $options = array(
				11 => 11,
); ?>

        <?php echo form_dropdown('team_rosters_race_id', $options, set_value('team_rosters_race_id', isset($team_rosters['team_rosters_race_id']) ? $team_rosters['team_rosters_race_id'] : ''))?>
</div>                                             
                        
<div>
        <?php echo form_label('Player Name', 'team_rosters_name'); ?>
        <input id="team_rosters_name" type="text" name="team_rosters_name" maxlength="160" value="<?php echo set_value('team_rosters_name', isset($team_rosters['team_rosters_name']) ? $team_rosters['team_rosters_name'] : ''); ?>"  />
</div>

<div>
        <?php echo form_label('Joined', 'team_rosters_date_joined'); ?>
			<script>head.ready(function(){$('#team_rosters_date_joined').datetimepicker({ dateFormat: 'yy-mm-dd', timeFormat: 'hh:mm:ss'});});</script>
        <input id="team_rosters_date_joined" type="text" name="team_rosters_date_joined"  value="<?php echo set_value('team_rosters_date_joined', isset($team_rosters['team_rosters_date_joined']) ? $team_rosters['team_rosters_date_joined'] : ''); ?>"  />
</div>



	<div class="text-right">
		<br/>
		<input type="submit" name="submit" value="Create team_rosters" /> or <?php echo anchor(SITE_AREA .'/content/team_rosters', lang('team_rosters_cancel')); ?>
	</div>
	<?php echo form_close(); ?>
