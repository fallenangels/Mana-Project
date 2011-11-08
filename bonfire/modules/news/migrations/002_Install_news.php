<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Install_news extends Migration {
	
	public function up() 
	{
		$prefix = $this->db->dbprefix;

		$this->dbforge->add_field('`id` int(11) NOT NULL AUTO_INCREMENT');
			$this->dbforge->add_field("`news_poster_id` INT(11) NOT NULL");
			$this->dbforge->add_field("`news_title` VARCHAR(255) NOT NULL");
			$this->dbforge->add_field("`news_content` VARCHAR(15000) NOT NULL");
			$this->dbforge->add_field("`news_summary` VARCHAR(1500) NOT NULL");
			$this->dbforge->add_field("`deleted` INT(11) NOT NULL DEFAULT '0'");
			$this->dbforge->add_field("`created_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'");
			$this->dbforge->add_field("`modified_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'");
		$this->dbforge->add_key('id', true);
		$this->dbforge->create_table('news');

	}
	
	//--------------------------------------------------------------------
	
	public function down() 
	{
		$prefix = $this->db->dbprefix;

		$this->dbforge->drop_table('news');

	}
	
	//--------------------------------------------------------------------
	
}