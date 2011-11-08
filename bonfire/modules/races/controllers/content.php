<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class content extends Admin_Controller {

	//--------------------------------------------------------------------

	public function __construct() 
	{
		parent::__construct();

		$this->auth->restrict('Races.Content.View');
		$this->load->model('races_model', null, true);
		$this->lang->load('races');
		
		
	}
	
	//--------------------------------------------------------------------

	/*
		Method: index()
		
		Displays a list of form data.
	*/
	public function index() 
	{
		$data = array();
		$data['records'] = $this->races_model->find_all();

		Assets::add_js($this->load->view('content/js', null, true), 'inline');
		
		Template::set('data', $data);
		Template::set('toolbar_title', "Manage races");
		Template::render();
	}
	
	//--------------------------------------------------------------------

	/*
		Method: create()
		
		Creates a races object.
	*/
	public function create() 
	{
		$this->auth->restrict('Races.Content.Create');

		if ($this->input->post('submit'))
		{
			if ($insert_id = $this->save_races())
			{
				// Log the activity
				$this->activity_model->log_activity($this->auth->user_id(), lang('races_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'races');
					
				Template::set_message(lang("races_create_success"), 'success');
				Template::redirect(SITE_AREA .'/content/races');
			}
			else 
			{
				Template::set_message(lang('races_create_failure') . $this->races_model->error, 'error');
			}
		}
	
		Template::set('toolbar_title', lang('races_create_new_button'));
		Template::set('toolbar_title', lang('races_create') . ' races');
		Template::render();
	}
	
	//--------------------------------------------------------------------

	/*
		Method: edit()
		
		Allows editing of races data.
	*/
	public function edit() 
	{
		$this->auth->restrict('Races.Content.Edit');

		$id = (int)$this->uri->segment(5);
		
		if (empty($id))
		{
			Template::set_message(lang('races_invalid_id'), 'error');
			redirect(SITE_AREA .'/content/races');
		}
	
		if ($this->input->post('submit'))
		{
			if ($this->save_races('update', $id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->auth->user_id(), lang('races_act_edit_record').': ' . $id . ' : ' . $this->input->ip_address(), 'races');
					
				Template::set_message(lang('races_edit_success'), 'success');
			}
			else 
			{
				Template::set_message(lang('races_edit_failure') . $this->races_model->error, 'error');
			}
		}
		
		Template::set('races', $this->races_model->find($id));
	
		Template::set('toolbar_title', lang('races_edit_heading'));
		Template::set('toolbar_title', lang('races_edit') . ' races');
		Template::render();		
	}
	
	//--------------------------------------------------------------------

	/*
		Method: delete()
		
		Allows deleting of races data.
	*/
	public function delete() 
	{	
		$this->auth->restrict('Races.Content.Delete');

		$id = $this->uri->segment(5);
	
		if (!empty($id))
		{	
			if ($this->races_model->delete($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->auth->user_id(), lang('races_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'races');
					
				Template::set_message(lang('races_delete_success'), 'success');
			} else
			{
				Template::set_message(lang('races_delete_failure') . $this->races_model->error, 'error');
			}
		}
		
		redirect(SITE_AREA .'/content/races');
	}
	
	//--------------------------------------------------------------------

	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------
	
	/*
		Method: save_races()
		
		Does the actual validation and saving of form data.
		
		Parameters:
			$type	- Either "insert" or "update"
			$id		- The ID of the record to update. Not needed for inserts.
		
		Returns:
			An INT id for successful inserts. If updating, returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_races($type='insert', $id=0) 
	{	
					
	$this->form_validation->set_rules('races_name','Name','required|max_length[32]');			
	$this->form_validation->set_rules('races_icon','Icon','alpha_extra|max_length[80]');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}
		
		if ($type == 'insert')
		{
			$id = $this->races_model->insert($_POST);
			
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
			$return = $this->races_model->update($id, $_POST);
		}
		
		return $return;
	}

	//--------------------------------------------------------------------



}