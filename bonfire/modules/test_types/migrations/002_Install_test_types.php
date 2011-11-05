<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Install_test_types extends Migration {
	
	public function up() 
	{
		$prefix = $this->db->dbprefix;

		$this->dbforge->add_field('`id` int(11) NOT NULL AUTO_INCREMENT');
			$this->dbforge->add_field("`test_types_name` VARCHAR(255) NOT NULL");
			$this->dbforge->add_field("`test_types_description` VARCHAR(800) NOT NULL");
		$this->dbforge->add_key('id', true);
		$this->dbforge->create_table('test_types');

	}
	
	//--------------------------------------------------------------------
	
	public function down() 
	{
		$prefix = $this->db->dbprefix;

		$this->dbforge->drop_table('test_types');

	}
	
	//--------------------------------------------------------------------
	
}