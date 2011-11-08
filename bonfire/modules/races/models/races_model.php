<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Races_model extends BF_Model {

	protected $table		= "races";
	protected $key			= "id";
	protected $soft_deletes	= false;
	protected $date_format	= "datetime";
	protected $set_created	= false;
	protected $set_modified = false;
}
