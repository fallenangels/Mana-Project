<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class content extends Admin_Controller {

	//--------------------------------------------------------------------

	public function __construct() 
	{
		parent::__construct();

		$this->auth->restrict('Test_types.Content.View');
		$this->load->model('test_types_model', null, true);
		$this->lang->load('test_types');
		
		
	}
	
	//--------------------------------------------------------------------

	/*
		Method: index()
		
		Displays a list of form data.
	*/
	public function index() 
	{
		$data = array();
		$data['records'] = $this->test_types_model->find_all();

		Assets::add_js($this->load->view('content/js', null, true), 'inline');
		
		Template::set('data', $data);
		Template::set('toolbar_title', "Manage test_types");
		Template::render();
	}
	
	//--------------------------------------------------------------------

	/*
		Method: create()
		
		Creates a test_types object.
	*/
	public function create() 
	{
		$this->auth->restrict('Test_types.Content.Create');

		if ($this->input->post('submit'))
		{
			if ($insert_id = $this->save_test_types())
			{
				// Log the activity
				$this->activity_model->log_activity($this->auth->user_id(), lang('test_types_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'test_types');
					
				Template::set_message(lang("test_types_create_success"), 'success');
				Template::redirect(SITE_AREA .'/content/test_types');
			}
			else 
			{
				Template::set_message(lang('test_types_create_failure') . $this->test_types_model->error, 'error');
			}
		}
	
		Template::set('toolbar_title', lang('test_types_create_new_button'));
		Template::set('toolbar_title', lang('test_types_create') . ' test_types');
		Template::render();
	}
	
	//--------------------------------------------------------------------

	/*
		Method: edit()
		
		Allows editing of test_types data.
	*/
	public function edit() 
	{
		$this->auth->restrict('Test_types.Content.Edit');

		$id = (int)$this->uri->segment(5);
		
		if (empty($id))
		{
			Template::set_message(lang('test_types_invalid_id'), 'error');
			redirect(SITE_AREA .'/content/test_types');
		}
	
		if ($this->input->post('submit'))
		{
			if ($this->save_test_types('update', $id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->auth->user_id(), lang('test_types_act_edit_record').': ' . $id . ' : ' . $this->input->ip_address(), 'test_types');
					
				Template::set_message(lang('test_types_edit_success'), 'success');
			}
			else 
			{
				Template::set_message(lang('test_types_edit_failure') . $this->test_types_model->error, 'error');
			}
		}
		
		Template::set('test_types', $this->test_types_model->find($id));
	
		Template::set('toolbar_title', lang('test_types_edit_heading'));
		Template::set('toolbar_title', lang('test_types_edit') . ' test_types');
		Template::render();		
	}
	
	//--------------------------------------------------------------------

	/*
		Method: delete()
		
		Allows deleting of test_types data.
	*/
	public function delete() 
	{	
		$this->auth->restrict('Test_types.Content.Delete');

		$id = $this->uri->segment(5);
	
		if (!empty($id))
		{	
			if ($this->test_types_model->delete($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->auth->user_id(), lang('test_types_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'test_types');
					
				Template::set_message(lang('test_types_delete_success'), 'success');
			} else
			{
				Template::set_message(lang('test_types_delete_failure') . $this->test_types_model->error, 'error');
			}
		}
		
		redirect(SITE_AREA .'/content/test_types');
	}
	
	//--------------------------------------------------------------------

	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------
	
	/*
		Method: save_test_types()
		
		Does the actual validation and saving of form data.
		
		Parameters:
			$type	- Either "insert" or "update"
			$id		- The ID of the record to update. Not needed for inserts.
		
		Returns:
			An INT id for successful inserts. If updating, returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_test_types($type='insert', $id=0) 
	{	
					
	$this->form_validation->set_rules('test_types_name','Test type name','required|max_length[255]');			
	$this->form_validation->set_rules('test_types_description','Test type description','max_length[800]');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}
		
		if ($type == 'insert')
		{
			$id = $this->test_types_model->insert($_POST);
			
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
			$return = $this->test_types_model->update($id, $_POST);
		}
		
		return $return;
	}

	//--------------------------------------------------------------------



}