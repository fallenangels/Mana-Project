<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class team_rosters extends Front_Controller {

	//--------------------------------------------------------------------

	public function __construct() 
	{
		parent::__construct();

		$this->load->library('form_validation');
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

		Template::set('data', $data);
		Template::render();
	}
	
	//--------------------------------------------------------------------



}