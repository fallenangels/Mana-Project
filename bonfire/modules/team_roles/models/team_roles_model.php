<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Team_roles_model extends BF_Model {

	protected $table		= "team_roles";
	protected $key			= "id";
	protected $soft_deletes	= true;
	protected $date_format	= "datetime";
	protected $set_created	= false;
	protected $set_modified = false;
}
