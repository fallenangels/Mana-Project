<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class settings extends Admin_Controller {

	//--------------------------------------------------------------------

	public function __construct() 
	{
		parent::__construct();

		$this->auth->restrict('Teams.Settings.View');
		$this->load->model('teams_model', null, true);
		$this->lang->load('teams');
		
		
	}
	
	//--------------------------------------------------------------------

	/*
		Method: index()
		
		Displays a list of form data.
	*/
	public function index() 
	{
		$data = array();
		$data['records'] = $this->teams_model->find_all();

		Assets::add_js($this->load->view('settings/js', null, true), 'inline');
		
		Template::set('data', $data);
		Template::set('toolbar_title', "Manage teams");
		Template::render();
	}
	
	//--------------------------------------------------------------------

	/*
		Method: create()
		
		Creates a teams object.
	*/
	public function create() 
	{
		$this->auth->restrict('Teams.Settings.Create');

		if ($this->input->post('submit'))
		{
			if ($insert_id = $this->save_teams())
			{
				// Log the activity
				$this->activity_model->log_activity($this->auth->user_id(), lang('teams_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'teams');
					
				Template::set_message(lang("teams_create_success"), 'success');
				Template::redirect(SITE_AREA .'/settings/teams');
			}
			else 
			{
				Template::set_message(lang('teams_create_failure') . $this->teams_model->error, 'error');
			}
		}
	
		Template::set('toolbar_title', lang('teams_create_new_button'));
		Template::set('toolbar_title', lang('teams_create') . ' teams');
		Template::render();
	}
	
	//--------------------------------------------------------------------

	/*
		Method: edit()
		
		Allows editing of teams data.
	*/
	public function edit() 
	{
		$this->auth->restrict('Teams.Settings.Edit');

		$id = (int)$this->uri->segment(5);
		
		if (empty($id))
		{
			Template::set_message(lang('teams_invalid_id'), 'error');
			redirect(SITE_AREA .'/settings/teams');
		}
	
		if ($this->input->post('submit'))
		{
			if ($this->save_teams('update', $id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->auth->user_id(), lang('teams_act_edit_record').': ' . $id . ' : ' . $this->input->ip_address(), 'teams');
					
				Template::set_message(lang('teams_edit_success'), 'success');
			}
			else 
			{
				Template::set_message(lang('teams_edit_failure') . $this->teams_model->error, 'error');
			}
		}
		
		Template::set('teams', $this->teams_model->find($id));
	
		Template::set('toolbar_title', lang('teams_edit_heading'));
		Template::set('toolbar_title', lang('teams_edit') . ' teams');
		Template::render();		
	}
	
	//--------------------------------------------------------------------

	/*
		Method: delete()
		
		Allows deleting of teams data.
	*/
	public function delete() 
	{	
		$this->auth->restrict('Teams.Settings.Delete');

		$id = $this->uri->segment(5);
	
		if (!empty($id))
		{	
			if ($this->teams_model->delete($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->auth->user_id(), lang('teams_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'teams');
					
				Template::set_message(lang('teams_delete_success'), 'success');
			} else
			{
				Template::set_message(lang('teams_delete_failure') . $this->teams_model->error, 'error');
			}
		}
		
		redirect(SITE_AREA .'/settings/teams');
	}
	
	//--------------------------------------------------------------------

	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------
	
	/*
		Method: save_teams()
		
		Does the actual validation and saving of form data.
		
		Parameters:
			$type	- Either "insert" or "update"
			$id		- The ID of the record to update. Not needed for inserts.
		
		Returns:
			An INT id for successful inserts. If updating, returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_teams($type='insert', $id=0) 
	{	
					
	$this->form_validation->set_rules('teams_name','Team Name','required|alpha_extra|max_length[80]');			
	$this->form_validation->set_rules('teams_logo','Logo','max_length[80]');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}
		
		if ($type == 'insert')
		{
			$id = $this->teams_model->insert($_POST);
			
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
			$return = $this->teams_model->update($id, $_POST);
		}
		
		return $return;
	}

	//--------------------------------------------------------------------



}