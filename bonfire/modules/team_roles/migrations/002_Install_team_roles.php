<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Install_team_roles extends Migration {
	
	public function up() 
	{
		$prefix = $this->db->dbprefix;

		$this->dbforge->add_field('`id` int(11) NOT NULL AUTO_INCREMENT');
			$this->dbforge->add_field("`team_roles_name` VARCHAR(80) NOT NULL");
			$this->dbforge->add_field("`deleted` INT(11) NOT NULL DEFAULT '0'");
		$this->dbforge->add_key('id', true);
		$this->dbforge->create_table('team_roles');

	}
	
	//--------------------------------------------------------------------
	
	public function down() 
	{
		$prefix = $this->db->dbprefix;

		$this->dbforge->drop_table('team_roles');

	}
	
	//--------------------------------------------------------------------
	
}