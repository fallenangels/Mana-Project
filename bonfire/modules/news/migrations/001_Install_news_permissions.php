<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Install_news_permissions extends Migration {
	
	public function up() 
	{
		$prefix = $this->db->dbprefix;


		// permissions
					$this->db->query("INSERT INTO {$prefix}permissions VALUES (0,'News.Content.View','','active');");
					$this->db->query("INSERT INTO {$prefix}role_permissions VALUES (2,".$this->db->insert_id().");");
					$this->db->query("INSERT INTO {$prefix}permissions VALUES (0,'News.Content.Create','','active');");
					$this->db->query("INSERT INTO {$prefix}role_permissions VALUES (2,".$this->db->insert_id().");");
					$this->db->query("INSERT INTO {$prefix}permissions VALUES (0,'News.Content.Edit','','active');");
					$this->db->query("INSERT INTO {$prefix}role_permissions VALUES (2,".$this->db->insert_id().");");
					$this->db->query("INSERT INTO {$prefix}permissions VALUES (0,'News.Content.Delete','','active');");
					$this->db->query("INSERT INTO {$prefix}role_permissions VALUES (2,".$this->db->insert_id().");");
					$this->db->query("INSERT INTO {$prefix}permissions VALUES (0,'News.Reports.View','','active');");
					$this->db->query("INSERT INTO {$prefix}role_permissions VALUES (2,".$this->db->insert_id().");");
					$this->db->query("INSERT INTO {$prefix}permissions VALUES (0,'News.Reports.Create','','active');");
					$this->db->query("INSERT INTO {$prefix}role_permissions VALUES (2,".$this->db->insert_id().");");
					$this->db->query("INSERT INTO {$prefix}permissions VALUES (0,'News.Reports.Edit','','active');");
					$this->db->query("INSERT INTO {$prefix}role_permissions VALUES (2,".$this->db->insert_id().");");
					$this->db->query("INSERT INTO {$prefix}permissions VALUES (0,'News.Reports.Delete','','active');");
					$this->db->query("INSERT INTO {$prefix}role_permissions VALUES (2,".$this->db->insert_id().");");
					$this->db->query("INSERT INTO {$prefix}permissions VALUES (0,'News.Settings.View','','active');");
					$this->db->query("INSERT INTO {$prefix}role_permissions VALUES (2,".$this->db->insert_id().");");
					$this->db->query("INSERT INTO {$prefix}permissions VALUES (0,'News.Settings.Create','','active');");
					$this->db->query("INSERT INTO {$prefix}role_permissions VALUES (2,".$this->db->insert_id().");");
					$this->db->query("INSERT INTO {$prefix}permissions VALUES (0,'News.Settings.Edit','','active');");
					$this->db->query("INSERT INTO {$prefix}role_permissions VALUES (2,".$this->db->insert_id().");");
					$this->db->query("INSERT INTO {$prefix}permissions VALUES (0,'News.Settings.Delete','','active');");
					$this->db->query("INSERT INTO {$prefix}role_permissions VALUES (2,".$this->db->insert_id().");");
	}
	
	//--------------------------------------------------------------------
	
	public function down() 
	{
		$prefix = $this->db->dbprefix;

        // permissions
					$query = $this->db->query("SELECT permission_id FROM {$prefix}permissions WHERE name='News.Content.View';");
					foreach ($query->result_array() as $row)
					{
						$permission_id = $row['permission_id'];
						$this->db->query("DELETE FROM {$prefix}role_permissions WHERE permission_id='$permission_id';");
					}
					$this->db->query("DELETE FROM {$prefix}permissions WHERE name='News.Content.View';");
					$query = $this->db->query("SELECT permission_id FROM {$prefix}permissions WHERE name='News.Content.Create';");
					foreach ($query->result_array() as $row)
					{
						$permission_id = $row['permission_id'];
						$this->db->query("DELETE FROM {$prefix}role_permissions WHERE permission_id='$permission_id';");
					}
					$this->db->query("DELETE FROM {$prefix}permissions WHERE name='News.Content.Create';");
					$query = $this->db->query("SELECT permission_id FROM {$prefix}permissions WHERE name='News.Content.Edit';");
					foreach ($query->result_array() as $row)
					{
						$permission_id = $row['permission_id'];
						$this->db->query("DELETE FROM {$prefix}role_permissions WHERE permission_id='$permission_id';");
					}
					$this->db->query("DELETE FROM {$prefix}permissions WHERE name='News.Content.Edit';");
					$query = $this->db->query("SELECT permission_id FROM {$prefix}permissions WHERE name='News.Content.Delete';");
					foreach ($query->result_array() as $row)
					{
						$permission_id = $row['permission_id'];
						$this->db->query("DELETE FROM {$prefix}role_permissions WHERE permission_id='$permission_id';");
					}
					$this->db->query("DELETE FROM {$prefix}permissions WHERE name='News.Content.Delete';");
					$query = $this->db->query("SELECT permission_id FROM {$prefix}permissions WHERE name='News.Reports.View';");
					foreach ($query->result_array() as $row)
					{
						$permission_id = $row['permission_id'];
						$this->db->query("DELETE FROM {$prefix}role_permissions WHERE permission_id='$permission_id';");
					}
					$this->db->query("DELETE FROM {$prefix}permissions WHERE name='News.Reports.View';");
					$query = $this->db->query("SELECT permission_id FROM {$prefix}permissions WHERE name='News.Reports.Create';");
					foreach ($query->result_array() as $row)
					{
						$permission_id = $row['permission_id'];
						$this->db->query("DELETE FROM {$prefix}role_permissions WHERE permission_id='$permission_id';");
					}
					$this->db->query("DELETE FROM {$prefix}permissions WHERE name='News.Reports.Create';");
					$query = $this->db->query("SELECT permission_id FROM {$prefix}permissions WHERE name='News.Reports.Edit';");
					foreach ($query->result_array() as $row)
					{
						$permission_id = $row['permission_id'];
						$this->db->query("DELETE FROM {$prefix}role_permissions WHERE permission_id='$permission_id';");
					}
					$this->db->query("DELETE FROM {$prefix}permissions WHERE name='News.Reports.Edit';");
					$query = $this->db->query("SELECT permission_id FROM {$prefix}permissions WHERE name='News.Reports.Delete';");
					foreach ($query->result_array() as $row)
					{
						$permission_id = $row['permission_id'];
						$this->db->query("DELETE FROM {$prefix}role_permissions WHERE permission_id='$permission_id';");
					}
					$this->db->query("DELETE FROM {$prefix}permissions WHERE name='News.Reports.Delete';");
					$query = $this->db->query("SELECT permission_id FROM {$prefix}permissions WHERE name='News.Settings.View';");
					foreach ($query->result_array() as $row)
					{
						$permission_id = $row['permission_id'];
						$this->db->query("DELETE FROM {$prefix}role_permissions WHERE permission_id='$permission_id';");
					}
					$this->db->query("DELETE FROM {$prefix}permissions WHERE name='News.Settings.View';");
					$query = $this->db->query("SELECT permission_id FROM {$prefix}permissions WHERE name='News.Settings.Create';");
					foreach ($query->result_array() as $row)
					{
						$permission_id = $row['permission_id'];
						$this->db->query("DELETE FROM {$prefix}role_permissions WHERE permission_id='$permission_id';");
					}
					$this->db->query("DELETE FROM {$prefix}permissions WHERE name='News.Settings.Create';");
					$query = $this->db->query("SELECT permission_id FROM {$prefix}permissions WHERE name='News.Settings.Edit';");
					foreach ($query->result_array() as $row)
					{
						$permission_id = $row['permission_id'];
						$this->db->query("DELETE FROM {$prefix}role_permissions WHERE permission_id='$permission_id';");
					}
					$this->db->query("DELETE FROM {$prefix}permissions WHERE name='News.Settings.Edit';");
					$query = $this->db->query("SELECT permission_id FROM {$prefix}permissions WHERE name='News.Settings.Delete';");
					foreach ($query->result_array() as $row)
					{
						$permission_id = $row['permission_id'];
						$this->db->query("DELETE FROM {$prefix}role_permissions WHERE permission_id='$permission_id';");
					}
					$this->db->query("DELETE FROM {$prefix}permissions WHERE name='News.Settings.Delete';");
	}
	
	//--------------------------------------------------------------------
	
}