<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class content extends Admin_Controller {

	//--------------------------------------------------------------------

	public function __construct() 
	{
		parent::__construct();

		$this->auth->restrict('Team_roles.Content.View');
		$this->load->model('team_roles_model', null, true);
		$this->lang->load('team_roles');
		
		
	}
	
	//--------------------------------------------------------------------

	/*
		Method: index()
		
		Displays a list of form data.
	*/
	public function index() 
	{
		$data = array();
		$data['records'] = $this->team_roles_model->find_all();

		Assets::add_js($this->load->view('content/js', null, true), 'inline');
		
		Template::set('data', $data);
		Template::set('toolbar_title', "Manage team_roles");
		Template::render();
	}
	
	//--------------------------------------------------------------------

	/*
		Method: create()
		
		Creates a team_roles object.
	*/
	public function create() 
	{
		$this->auth->restrict('Team_roles.Content.Create');

		if ($this->input->post('submit'))
		{
			if ($insert_id = $this->save_team_roles())
			{
				// Log the activity
				$this->activity_model->log_activity($this->auth->user_id(), lang('team_roles_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'team_roles');
					
				Template::set_message(lang("team_roles_create_success"), 'success');
				Template::redirect(SITE_AREA .'/content/team_roles');
			}
			else 
			{
				Template::set_message(lang('team_roles_create_failure') . $this->team_roles_model->error, 'error');
			}
		}
	
		Template::set('toolbar_title', lang('team_roles_create_new_button'));
		Template::set('toolbar_title', lang('team_roles_create') . ' team_roles');
		Template::render();
	}
	
	//--------------------------------------------------------------------

	/*
		Method: edit()
		
		Allows editing of team_roles data.
	*/
	public function edit() 
	{
		$this->auth->restrict('Team_roles.Content.Edit');

		$id = (int)$this->uri->segment(5);
		
		if (empty($id))
		{
			Template::set_message(lang('team_roles_invalid_id'), 'error');
			redirect(SITE_AREA .'/content/team_roles');
		}
	
		if ($this->input->post('submit'))
		{
			if ($this->save_team_roles('update', $id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->auth->user_id(), lang('team_roles_act_edit_record').': ' . $id . ' : ' . $this->input->ip_address(), 'team_roles');
					
				Template::set_message(lang('team_roles_edit_success'), 'success');
			}
			else 
			{
				Template::set_message(lang('team_roles_edit_failure') . $this->team_roles_model->error, 'error');
			}
		}
		
		Template::set('team_roles', $this->team_roles_model->find($id));
	
		Template::set('toolbar_title', lang('team_roles_edit_heading'));
		Template::set('toolbar_title', lang('team_roles_edit') . ' team_roles');
		Template::render();		
	}
	
	//--------------------------------------------------------------------

	/*
		Method: delete()
		
		Allows deleting of team_roles data.
	*/
	public function delete() 
	{	
		$this->auth->restrict('Team_roles.Content.Delete');

		$id = $this->uri->segment(5);
	
		if (!empty($id))
		{	
			if ($this->team_roles_model->delete($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->auth->user_id(), lang('team_roles_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'team_roles');
					
				Template::set_message(lang('team_roles_delete_success'), 'success');
			} else
			{
				Template::set_message(lang('team_roles_delete_failure') . $this->team_roles_model->error, 'error');
			}
		}
		
		redirect(SITE_AREA .'/content/team_roles');
	}
	
	//--------------------------------------------------------------------

	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------
	
	/*
		Method: save_team_roles()
		
		Does the actual validation and saving of form data.
		
		Parameters:
			$type	- Either "insert" or "update"
			$id		- The ID of the record to update. Not needed for inserts.
		
		Returns:
			An INT id for successful inserts. If updating, returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_team_roles($type='insert', $id=0) 
	{	
					
	$this->form_validation->set_rules('team_roles_name','Name','required|max_length[80]');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}
		
		if ($type == 'insert')
		{
			$id = $this->team_roles_model->insert($_POST);
			
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
			$return = $this->team_roles_model->update($id, $_POST);
		}
		
		return $return;
	}

	//--------------------------------------------------------------------



}