<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Teams_model extends BF_Model {

	protected $table		= "teams";
	protected $key			= "id";
	protected $soft_deletes	= true;
	protected $date_format	= "datetime";
	protected $set_created	= true;
	protected $set_modified = false;
	protected $created_field = "created_on";
}
