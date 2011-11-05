<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class settings extends Admin_Controller {

	//--------------------------------------------------------------------

	public function __construct() 
	{
		parent::__construct();

		$this->auth->restrict('Test.Settings.View');
		$this->load->model('test_model', null, true);
		$this->lang->load('test');
		
		
	}
	
	//--------------------------------------------------------------------

	/*
		Method: index()
		
		Displays a list of form data.
	*/
	public function index() 
	{
		$data = array();
		$data['records'] = $this->test_model->find_all();

		Assets::add_js($this->load->view('settings/js', null, true), 'inline');
		
		Template::set('data', $data);
		Template::set('toolbar_title', "Manage test");
		Template::render();
	}
	
	//--------------------------------------------------------------------

	/*
		Method: create()
		
		Creates a test object.
	*/
	public function create() 
	{
		$this->auth->restrict('Test.Settings.Create');

		if ($this->input->post('submit'))
		{
			if ($insert_id = $this->save_test())
			{
				// Log the activity
				$this->activity_model->log_activity($this->auth->user_id(), lang('test_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'test');
					
				Template::set_message(lang("test_create_success"), 'success');
				Template::redirect(SITE_AREA .'/settings/test');
			}
			else 
			{
				Template::set_message(lang('test_create_failure') . $this->test_model->error, 'error');
			}
		}
	
		Template::set('toolbar_title', lang('test_create_new_button'));
		Template::set('toolbar_title', lang('test_create') . ' test');
		Template::render();
	}
	
	//--------------------------------------------------------------------

	/*
		Method: edit()
		
		Allows editing of test data.
	*/
	public function edit() 
	{
		$this->auth->restrict('Test.Settings.Edit');

		$id = (int)$this->uri->segment(5);
		
		if (empty($id))
		{
			Template::set_message(lang('test_invalid_id'), 'error');
			redirect(SITE_AREA .'/settings/test');
		}
	
		if ($this->input->post('submit'))
		{
			if ($this->save_test('update', $id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->auth->user_id(), lang('test_act_edit_record').': ' . $id . ' : ' . $this->input->ip_address(), 'test');
					
				Template::set_message(lang('test_edit_success'), 'success');
			}
			else 
			{
				Template::set_message(lang('test_edit_failure') . $this->test_model->error, 'error');
			}
		}
		
		Template::set('test', $this->test_model->find($id));
	
		Template::set('toolbar_title', lang('test_edit_heading'));
		Template::set('toolbar_title', lang('test_edit') . ' test');
		Template::render();		
	}
	
	//--------------------------------------------------------------------

	/*
		Method: delete()
		
		Allows deleting of test data.
	*/
	public function delete() 
	{	
		$this->auth->restrict('Test.Settings.Delete');

		$id = $this->uri->segment(5);
	
		if (!empty($id))
		{	
			if ($this->test_model->delete($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->auth->user_id(), lang('test_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'test');
					
				Template::set_message(lang('test_delete_success'), 'success');
			} else
			{
				Template::set_message(lang('test_delete_failure') . $this->test_model->error, 'error');
			}
		}
		
		redirect(SITE_AREA .'/settings/test');
	}
	
	//--------------------------------------------------------------------

	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------
	
	/*
		Method: save_test()
		
		Does the actual validation and saving of form data.
		
		Parameters:
			$type	- Either "insert" or "update"
			$id		- The ID of the record to update. Not needed for inserts.
		
		Returns:
			An INT id for successful inserts. If updating, returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_test($type='insert', $id=0) 
	{	
					
	$this->form_validation->set_rules('test_name','Name','required|trim|xss_clean|max_length[255]');			
	$this->form_validation->set_rules('test_type','Type','required|max_length[11]');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}
		
		if ($type == 'insert')
		{
			$id = $this->test_model->insert($_POST);
			
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
			$return = $this->test_model->update($id, $_POST);
		}
		
		return $return;
	}

	//--------------------------------------------------------------------



}