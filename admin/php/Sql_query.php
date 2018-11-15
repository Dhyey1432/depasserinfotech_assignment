<?php 

include_once 'connection.php';

class Sql_query extends Connection
{
	public function getAllCuntry()
	{
		$sql_str = "SELECT * FROM countries";
		return $this->getSelectAllQuery($sql_str);
	}
	public function Users($data , $image_name = '' , $user_id = 0)
	{
		if ($user_id == 0) {
			$sql_str = "INSERT INTO users SET firstname = '".$data['firstname']."',lastname = '".$data['lastname']."',email = '".$data['email']."',contact = '".$data['contact']."',password = '".$data['password']."',address_1 = '".$data['address_1']."',address_2 = '".$data['address_2']."',country_id = '".$data['country_id']."',state_id = '".$data['state_id']."',city_id = '".$data['city_id']."',created_date = NOW() , status = true , image = '".$image_name."'";
			return $this->insertSqlString($sql_str);
		} else {
			if ($image_name) {
				$sql_str = "UPDATE users SET firstname = '".$data['firstname']."',lastname = '".$data['lastname']."',email = '".$data['email']."',contact = '".$data['contact']."',password = '".$data['password']."',address_1 = '".$data['address_1']."',address_2 = '".$data['address_2']."',country_id = '".$data['country_id']."',state_id = '".$data['state_id']."',city_id = '".$data['city_id']."',created_date = NOW() , status = true , image = '".$image_name."' WHERE id = '".$user_id."'";
			} else {
				$sql_str = "UPDATE users SET firstname = '".$data['firstname']."',lastname = '".$data['lastname']."',email = '".$data['email']."',contact = '".$data['contact']."',password = '".$data['password']."',address_1 = '".$data['address_1']."',address_2 = '".$data['address_2']."',country_id = '".$data['country_id']."',state_id = '".$data['state_id']."',city_id = '".$data['city_id']."',created_date = NOW() , status = true WHERE id = '".$user_id."'";
			}
			return $this->insertSqlString($sql_str);
		}
	}
	public function getUserData()
	{
		$sql_str = "SELECT * FROM users WHERE status = true";
		return $this->getSelectAllQuery($sql_str);
	}
	public function deleteUser($user_id)
	{
		$sql_str = "UPDATE users SET status = false WHERE id = ".$user_id ;
		return $this->insertSqlString($sql_str);
	}
	public function getSingleUserData($user_id)
	{
		$sql_str = "SELECT * FROM users WHERE id = ".$user_id ; 
		return $this->getSingleRowOfquery($sql_str);
	}
}