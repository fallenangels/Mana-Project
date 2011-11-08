<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Install_user_profiles_permissions extends Migration {
	
	public function up() 
	{
		$prefix = $this->db->dbprefix;


		// permissions
					$this->db->query("INSERT INTO {$prefix}permissions VALUES (0,'User_profiles.Content.View','','active');");
					$this->db->query("INSERT INTO {$prefix}role_permissions VALUES (4,".$this->db->insert_id().");");
					$this->db->query("INSERT INTO {$prefix}permissions VALUES (0,'User_profiles.Content.Create','','active');");
					$this->db->query("INSERT INTO {$prefix}role_permissions VALUES (4,".$this->db->insert_id().");");
					$this->db->query("INSERT INTO {$prefix}permissions VALUES (0,'User_profiles.Content.Edit','','active');");
					$this->db->query("INSERT INTO {$prefix}role_permissions VALUES (4,".$this->db->insert_id().");");
					$this->db->query("INSERT INTO {$prefix}permissions VALUES (0,'User_profiles.Reports.View','','active');");
					$this->db->query("INSERT INTO {$prefix}role_permissions VALUES (4,".$this->db->insert_id().");");
					$this->db->query("INSERT INTO {$prefix}permissions VALUES (0,'User_profiles.Reports.Create','','active');");
					$this->db->query("INSERT INTO {$prefix}role_permissions VALUES (4,".$this->db->insert_id().");");
					$this->db->query("INSERT INTO {$prefix}permissions VALUES (0,'User_profiles.Reports.Edit','','active');");
					$this->db->query("INSERT INTO {$prefix}role_permissions VALUES (4,".$this->db->insert_id().");");
					$this->db->query("INSERT INTO {$prefix}permissions VALUES (0,'User_profiles.Settings.View','','active');");
					$this->db->query("INSERT INTO {$prefix}role_permissions VALUES (4,".$this->db->insert_id().");");
					$this->db->query("INSERT INTO {$prefix}permissions VALUES (0,'User_profiles.Settings.Create','','active');");
					$this->db->query("INSERT INTO {$prefix}role_permissions VALUES (4,".$this->db->insert_id().");");
					$this->db->query("INSERT INTO {$prefix}permissions VALUES (0,'User_profiles.Settings.Edit','','active');");
					$this->db->query("INSERT INTO {$prefix}role_permissions VALUES (4,".$this->db->insert_id().");");
	}
	
	//--------------------------------------------------------------------
	
	public function down() 
	{
		$prefix = $this->db->dbprefix;

        // permissions
					$query = $this->db->query("SELECT permission_id FROM {$prefix}permissions WHERE name='User_profiles.Content.View';");
					foreach ($query->result_array() as $row)
					{
						$permission_id = $row['permission_id'];
						$this->db->query("DELETE FROM {$prefix}role_permissions WHERE permission_id='$permission_id';");
					}
					$this->db->query("DELETE FROM {$prefix}permissions WHERE name='User_profiles.Content.View';");
					$query = $this->db->query("SELECT permission_id FROM {$prefix}permissions WHERE name='User_profiles.Content.Create';");
					foreach ($query->result_array() as $row)
					{
						$permission_id = $row['permission_id'];
						$this->db->query("DELETE FROM {$prefix}role_permissions WHERE permission_id='$permission_id';");
					}
					$this->db->query("DELETE FROM {$prefix}permissions WHERE name='User_profiles.Content.Create';");
					$query = $this->db->query("SELECT permission_id FROM {$prefix}permissions WHERE name='User_profiles.Content.Edit';");
					foreach ($query->result_array() as $row)
					{
						$permission_id = $row['permission_id'];
						$this->db->query("DELETE FROM {$prefix}role_permissions WHERE permission_id='$permission_id';");
					}
					$this->db->query("DELETE FROM {$prefix}permissions WHERE name='User_profiles.Content.Edit';");
					$query = $this->db->query("SELECT permission_id FROM {$prefix}permissions WHERE name='User_profiles.Reports.View';");
					foreach ($query->result_array() as $row)
					{
						$permission_id = $row['permission_id'];
						$this->db->query("DELETE FROM {$prefix}role_permissions WHERE permission_id='$permission_id';");
					}
					$this->db->query("DELETE FROM {$prefix}permissions WHERE name='User_profiles.Reports.View';");
					$query = $this->db->query("SELECT permission_id FROM {$prefix}permissions WHERE name='User_profiles.Reports.Create';");
					foreach ($query->result_array() as $row)
					{
						$permission_id = $row['permission_id'];
						$this->db->query("DELETE FROM {$prefix}role_permissions WHERE permission_id='$permission_id';");
					}
					$this->db->query("DELETE FROM {$prefix}permissions WHERE name='User_profiles.Reports.Create';");
					$query = $this->db->query("SELECT permission_id FROM {$prefix}permissions WHERE name='User_profiles.Reports.Edit';");
					foreach ($query->result_array() as $row)
					{
						$permission_id = $row['permission_id'];
						$this->db->query("DELETE FROM {$prefix}role_permissions WHERE permission_id='$permission_id';");
					}
					$this->db->query("DELETE FROM {$prefix}permissions WHERE name='User_profiles.Reports.Edit';");
					$query = $this->db->query("SELECT permission_id FROM {$prefix}permissions WHERE name='User_profiles.Settings.View';");
					foreach ($query->result_array() as $row)
					{
						$permission_id = $row['permission_id'];
						$this->db->query("DELETE FROM {$prefix}role_permissions WHERE permission_id='$permission_id';");
					}
					$this->db->query("DELETE FROM {$prefix}permissions WHERE name='User_profiles.Settings.View';");
					$query = $this->db->query("SELECT permission_id FROM {$prefix}permissions WHERE name='User_profiles.Settings.Create';");
					foreach ($query->result_array() as $row)
					{
						$permission_id = $row['permission_id'];
						$this->db->query("DELETE FROM {$prefix}role_permissions WHERE permission_id='$permission_id';");
					}
					$this->db->query("DELETE FROM {$prefix}permissions WHERE name='User_profiles.Settings.Create';");
					$query = $this->db->query("SELECT permission_id FROM {$prefix}permissions WHERE name='User_profiles.Settings.Edit';");
					foreach ($query->result_array() as $row)
					{
						$permission_id = $row['permission_id'];
						$this->db->query("DELETE FROM {$prefix}role_permissions WHERE permission_id='$permission_id';");
					}
					$this->db->query("DELETE FROM {$prefix}permissions WHERE name='User_profiles.Settings.Edit';");
	}
	
	//--------------------------------------------------------------------
	
}