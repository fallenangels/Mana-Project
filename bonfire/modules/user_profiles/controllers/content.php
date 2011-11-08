<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class content extends Admin_Controller {

	//--------------------------------------------------------------------

	public function __construct() 
	{
		parent::__construct();

		$this->auth->restrict('User_profiles.Content.View');
		$this->load->model('user_profiles_model', null, true);
		$this->lang->load('user_profiles');
		
		
	}
	
	//--------------------------------------------------------------------

	/*
		Method: index()
		
		Displays a list of form data.
	*/
	public function index() 
	{
		$data = array();
		$data['records'] = $this->user_profiles_model->find_all();

		Assets::add_js($this->load->view('content/js', null, true), 'inline');
		
		Template::set('data', $data);
		Template::set('toolbar_title', "Manage user_profiles");
		Template::render();
	}
	
	//--------------------------------------------------------------------

	/*
		Method: create()
		
		Creates a user_profiles object.
	*/
	public function create() 
	{
		$this->auth->restrict('User_profiles.Content.Create');

		if ($this->input->post('submit'))
		{
			if ($insert_id = $this->save_user_profiles())
			{
				// Log the activity
				$this->activity_model->log_activity($this->auth->user_id(), lang('user_profiles_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'user_profiles');
					
				Template::set_message(lang("user_profiles_create_success"), 'success');
				Template::redirect(SITE_AREA .'/content/user_profiles');
			}
			else 
			{
				Template::set_message(lang('user_profiles_create_failure') . $this->user_profiles_model->error, 'error');
			}
		}
	
		Template::set('toolbar_title', lang('user_profiles_create_new_button'));
		Template::set('toolbar_title', lang('user_profiles_create') . ' user_profiles');
		Template::render();
	}
	
	//--------------------------------------------------------------------

	/*
		Method: edit()
		
		Allows editing of user_profiles data.
	*/
	public function edit() 
	{
		$this->auth->restrict('User_profiles.Content.Edit');

		$id = (int)$this->uri->segment(5);
		
		if (empty($id))
		{
			Template::set_message(lang('user_profiles_invalid_id'), 'error');
			redirect(SITE_AREA .'/content/user_profiles');
		}
	
		if ($this->input->post('submit'))
		{
			if ($this->save_user_profiles('update', $id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->auth->user_id(), lang('user_profiles_act_edit_record').': ' . $id . ' : ' . $this->input->ip_address(), 'user_profiles');
					
				Template::set_message(lang('user_profiles_edit_success'), 'success');
			}
			else 
			{
				Template::set_message(lang('user_profiles_edit_failure') . $this->user_profiles_model->error, 'error');
			}
		}
		
		Template::set('user_profiles', $this->user_profiles_model->find($id));
	
		Template::set('toolbar_title', lang('user_profiles_edit_heading'));
		Template::set('toolbar_title', lang('user_profiles_edit') . ' user_profiles');
		Template::render();		
	}
	
	//--------------------------------------------------------------------

	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------
	
	/*
		Method: save_user_profiles()
		
		Does the actual validation and saving of form data.
		
		Parameters:
			$type	- Either "insert" or "update"
			$id		- The ID of the record to update. Not needed for inserts.
		
		Returns:
			An INT id for successful inserts. If updating, returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_user_profiles($type='insert', $id=0) 
	{	
					
	$this->form_validation->set_rules('user_profiles_user_id','User ID','required|unique[bf_user_profiles.user_profiles_user_id.id.'.$id.']|max_length[11]');			
	$this->form_validation->set_rules('user_profiles_gamer_tag','Gamer Tag','max_length[40]');			
	$this->form_validation->set_rules('user_profiles_character_code','Character Code','is_numeric|max_length[3]');			
	$this->form_validation->set_rules('user_profiles_stream_url','Stream URL','alpha_extra|max_length[80]');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}
		
		if ($type == 'insert')
		{
			$id = $this->user_profiles_model->insert($_POST);
			
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
			$return = $this->user_profiles_model->update($id, $_POST);
		}
		
		return $return;
	}

	//--------------------------------------------------------------------



}