<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Install_teams extends Migration {
	
	public function up() 
	{
		$prefix = $this->db->dbprefix;

		$this->dbforge->add_field('`id` int(11) NOT NULL AUTO_INCREMENT');
			$this->dbforge->add_field("`teams_name` VARCHAR(80) NOT NULL");
			$this->dbforge->add_field("`teams_logo` VARCHAR(80) NOT NULL");
			$this->dbforge->add_field("`deleted` INT(11) NOT NULL DEFAULT '0'");
			$this->dbforge->add_field("`created_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'");
		$this->dbforge->add_key('id', true);
		$this->dbforge->create_table('teams');

	}
	
	//--------------------------------------------------------------------
	
	public function down() 
	{
		$prefix = $this->db->dbprefix;

		$this->dbforge->drop_table('teams');

	}
	
	//--------------------------------------------------------------------
	
}