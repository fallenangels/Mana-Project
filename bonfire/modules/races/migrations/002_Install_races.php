<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Install_races extends Migration {
	
	public function up() 
	{
		$prefix = $this->db->dbprefix;

		$this->dbforge->add_field('`id` int(11) NOT NULL AUTO_INCREMENT');
			$this->dbforge->add_field("`races_name` VARCHAR(32) NOT NULL");
			$this->dbforge->add_field("`races_icon` VARCHAR(80) NOT NULL");
		$this->dbforge->add_key('id', true);
		$this->dbforge->create_table('races');

	}
	
	//--------------------------------------------------------------------
	
	public function down() 
	{
		$prefix = $this->db->dbprefix;

		$this->dbforge->drop_table('races');

	}
	
	//--------------------------------------------------------------------
	
}