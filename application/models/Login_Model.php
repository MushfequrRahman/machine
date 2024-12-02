<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_Model extends CI_Model {

	
	
	public function login($userid,$password)
	{
		$sql="SELECT * FROM user 
		WHERE user.userid='$userid' AND user.password='$password'";
		$query=$this->db->query($sql);
		if($query)
			{
				if($query->num_rows()==1)
					{
						//return true;
						return $query->result_array();
					}
				else
					{
						return false;
					}
			}
		
	}
	public function factory_list()
	{
		$query="SELECT * FROM factory";
		$result=$this->db->query($query);
		return $result->result_array();
		
	}
}
