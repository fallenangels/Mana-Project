<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class reports extends Admin_Controller {

	//--------------------------------------------------------------------

	public function __construct() 
	{
		parent::__construct();

		$this->auth->restrict('News.Reports.View');
		$this->load->model('news_model', null, true);
		$this->lang->load('news');
		
		
	}
	
	//--------------------------------------------------------------------

	/*
		Method: index()
		
		Displays a list of form data.
	*/
	public function index() 
	{
		$data = array();
		$data['records'] = $this->news_model->find_all();

		Assets::add_js($this->load->view('reports/js', null, true), 'inline');
		
		Template::set('data', $data);
		Template::set('toolbar_title', "Manage news");
		Template::render();
	}
	
	//--------------------------------------------------------------------

	/*
		Method: create()
		
		Creates a news object.
	*/
	public function create() 
	{
		$this->auth->restrict('News.Reports.Create');

		if ($this->input->post('submit'))
		{
			if ($insert_id = $this->save_news())
			{
				// Log the activity
				$this->activity_model->log_activity($this->auth->user_id(), lang('news_act_create_record').': ' . $insert_id . ' : ' . $this->input->ip_address(), 'news');
					
				Template::set_message(lang("news_create_success"), 'success');
				Template::redirect(SITE_AREA .'/reports/news');
			}
			else 
			{
				Template::set_message(lang('news_create_failure') . $this->news_model->error, 'error');
			}
		}
	
		Template::set('toolbar_title', lang('news_create_new_button'));
		Template::set('toolbar_title', lang('news_create') . ' news');
		Template::render();
	}
	
	//--------------------------------------------------------------------

	/*
		Method: edit()
		
		Allows editing of news data.
	*/
	public function edit() 
	{
		$this->auth->restrict('News.Reports.Edit');

		$id = (int)$this->uri->segment(5);
		
		if (empty($id))
		{
			Template::set_message(lang('news_invalid_id'), 'error');
			redirect(SITE_AREA .'/reports/news');
		}
	
		if ($this->input->post('submit'))
		{
			if ($this->save_news('update', $id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->auth->user_id(), lang('news_act_edit_record').': ' . $id . ' : ' . $this->input->ip_address(), 'news');
					
				Template::set_message(lang('news_edit_success'), 'success');
			}
			else 
			{
				Template::set_message(lang('news_edit_failure') . $this->news_model->error, 'error');
			}
		}
		
		Template::set('news', $this->news_model->find($id));
	
		Template::set('toolbar_title', lang('news_edit_heading'));
		Template::set('toolbar_title', lang('news_edit') . ' news');
		Template::render();		
	}
	
	//--------------------------------------------------------------------

	/*
		Method: delete()
		
		Allows deleting of news data.
	*/
	public function delete() 
	{	
		$this->auth->restrict('News.Reports.Delete');

		$id = $this->uri->segment(5);
	
		if (!empty($id))
		{	
			if ($this->news_model->delete($id))
			{
				// Log the activity
				$this->activity_model->log_activity($this->auth->user_id(), lang('news_act_delete_record').': ' . $id . ' : ' . $this->input->ip_address(), 'news');
					
				Template::set_message(lang('news_delete_success'), 'success');
			} else
			{
				Template::set_message(lang('news_delete_failure') . $this->news_model->error, 'error');
			}
		}
		
		redirect(SITE_AREA .'/reports/news');
	}
	
	//--------------------------------------------------------------------

	//--------------------------------------------------------------------
	// !PRIVATE METHODS
	//--------------------------------------------------------------------
	
	/*
		Method: save_news()
		
		Does the actual validation and saving of form data.
		
		Parameters:
			$type	- Either "insert" or "update"
			$id		- The ID of the record to update. Not needed for inserts.
		
		Returns:
			An INT id for successful inserts. If updating, returns TRUE on success.
			Otherwise, returns FALSE.
	*/
	private function save_news($type='insert', $id=0) 
	{	
					
	$this->form_validation->set_rules('news_poster_id','Poster','required|max_length[11]');			
	$this->form_validation->set_rules('news_title','Title','required|max_length[255]');			
	$this->form_validation->set_rules('news_content','Content','required|max_length[15000]');			
	$this->form_validation->set_rules('news_summary','Summary','max_length[1500]');

		if ($this->form_validation->run() === FALSE)
		{
			return FALSE;
		}
		
		if ($type == 'insert')
		{
			$id = $this->news_model->insert($_POST);
			
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
			$return = $this->news_model->update($id, $_POST);
		}
		
		return $return;
	}

	//--------------------------------------------------------------------



}