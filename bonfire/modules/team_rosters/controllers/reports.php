<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class reports extends Admin_Controller {

	//--------------------------------------------------------------------

	public function __construct() 
	{
		parent::__construct();

		$this->auth->restrict('Team_rosters.Reports.View');
		$this->load->model('team_rosters_model', null, true);
		$this->lang->load('team_rosters');
		
		
				Assets::add_css('flick/jquery-ui-1.8.13.custom.css');
				Assets::add_js('jquery-ui-1.8.8.min.js');
			Assets::add_css('jquery-ui-timepicker.css');
			Assets::add_js('jquery-ui-timepicker-addon.js');
	}
	
	//--------------------------------------------------------------------

	/*
		Method: index()
		
		Displays a list of form data.
	*/
	public function index() 
	{
		$data = array();
		$data['records'] = $this->team_rosters_model->find_all();

		Assets::add_js($this->load->view('reports/js', null, true), 'inline');
		
		Template::set('data', $data);
		Template::set('toolbar_title', "Manage team_rosters");
		Template::render();
	}
	
	//--------------------------------------------------------------------

	/*
		Method: create()
		
		Creates a team_rosters object.
	*/
	public function create() 
	{
		$this->auth->restrict('Team_rosters.Reports.Create');

		if ($this->input->post('submit'))
		{
			if ($insert_id = $this->save_team_rosters())
			{
				// Log the activity
				$this->activity_model->log_activity($this->auth->user_id(), lang('team_rosters_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'team_rosters');
					
				Template::set_message(lang("team_rosters_create_success"), 'success');
				Template::redirect(SITE_AREA .'/reports/team_rosters');
			}
			else 
			{
				Template::set_message(lang('team_rosters_create_failure') . $this->team_rosters_model->error, 'error');
			}
		}
	
		Template::set('toolbar_title', lang('team_rosters_create_new_button'));
		Template::set('toolbar_title', lang('team_rosters_create') . ' team_rosters');
		Template::render();
	}
	
	//--------------------------------------------------------------------

	/*
		Method: edit()
		
		Allows editing of team_rosters data.
	*/
	public function edit() 
	{
		$this->auth->restrict('Team_rosters.Reports.Edit');

		$id = (int)$this->uri->segment(5);
		
		if (empty($id))
		{
			Template::set_message(lang('team_rosters_invalid_id'), 'error');
			redirect(SITE_AREA .'/reports/team_rosters');
		}
	
		if ($this->input->post('submit'))
		{
			if ($this->save_team_rosters('update', $id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->auth->user_id(), lang('team_rosters_act_edit_record').': ' . $id . ' : ' . $this->input->ip_address(), 'team_rosters');
					
				Template::set_message(lang('team_rosters_edit_success'), 'success');
			}
			else 
			{
				Template::set_message(lang('team_rosters_edit_failure') . $this->team_rosters_model->error, 'error');
			}
		}
		
		Template::set('team_rosters', $this->team_rosters_model->find($id));
	
		Template::set('toolbar_title', lang('team_rosters_edit_heading'));
		Template::set('toolbar_title', lang('team_rosters_edit') . ' team_rosters');
		Template::render();		
	}
	
	//--------------------------------------------------------------------

	/*
		Method: delete()
		
		Allows deleting of team_rosters data.
	*/
	public function delete() 
	{	
		$this->auth->restrict('Team_rosters.Reports.Delete');

		$id = $this->uri->segment(5);
	
		if (!empty($id))
		{	
			if ($this->team_rosters_model->delete($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->auth->user_id(), lang('team_rosters_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'team_rosters');
					
				Template::set_message(lang('team_rosters_delete_success'), 'success');
			} else
			{
				Template::set_message(lang('team_rosters_delete_failure') . $this->team_rosters_model->error, 'error');
			}
		}
		
		redirect(SITE_AREA .'/reports/team_rosters');
	}
	
	//--------------------------------------------------------------------

	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------
	
	/*
		Method: save_team_rosters()
		
		Does the actual validation and saving of form data.
		
		Parameters:
			$type	- Either "insert" or "update"
			$id		- The ID of the record to update. Not needed for inserts.
		
		Returns:
			An INT id for successful inserts. If updating, returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_team_rosters($type='insert', $id=0) 
	{	
					
	$this->form_validation->set_rules('team_rosters_player_id','Player ID','is_numeric|max_length[11]');			
	$this->form_validation->set_rules('team_rosters_role_id','Role','required|is_numeric|max_length[11]');			
	$this->form_validation->set_rules('team_rosters_race_id','Race','required|is_numeric|max_length[11]');			
	$this->form_validation->set_rules('team_rosters_name','Player Name','max_length[160]');			
	$this->form_validation->set_rules('team_rosters_date_joined','Joined','');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}
		
		if ($type == 'insert')
		{
			$id = $this->team_rosters_model->insert($_POST);
			
			if (is_numeric($id))
			{
				$return = $id;
			} else
			{
				$return = FALSE;
			}
		}
		else if ($type == 'update')
		{
			$return = $this->team_rosters_model->update($id, $_POST);
		}
		
		return $return;
	}

	//--------------------------------------------------------------------



}