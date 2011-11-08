<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_profiles_model extends BF_Model {

	protected $table		= "user_profiles";
	protected $key			= "id";
	protected $soft_deletes	= true;
	protected $date_format	= "datetime";
	protected $set_created	= true;
	protected $set_modified = true;
	protected $created_field = "created_on";
	protected $modified_field = "modified_on";
}
