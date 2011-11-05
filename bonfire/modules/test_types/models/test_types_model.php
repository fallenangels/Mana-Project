<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Test_types_model extends BF_Model {

	protected $table		= "test_types";
	protected $key			= "id";
	protected $soft_deletes	= false;
	protected $date_format	= "datetime";
	protected $set_created	= false;
	protected $set_modified = false;
        protected $name = "test_types_name";
        protected $description = "test_types_description";
}
