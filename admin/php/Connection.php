<?php 

class Connection 
{
	private static function getConnection()
	{
		return new mysqli("localhost", "root","","test_test");
	}
	public static function getSelectAllQuery($sql_str)
	{
		$data = array();
		foreach (Connection::getConnection()->query($sql_str) as $value) {
			if (count($value)) { array_push($data,$value); } else {array_push($data,array('status' => false ,'message'=>'data is not present')); }
		}
		return json_decode(json_encode($data)) ; 
	}
	public function insertSqlString($sql_str)
	{
		return Connection::getConnection()->query($sql_str);
	}
	public function encode_data($data) { 
	  	return rtrim(strtr(base64_encode($data), '+/', '-_'), '='); 
	} 
	public function decode_data($data) { 
	  	return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT)); 
	}
	public function getSingleRowOfquery($sql_str)
	{
		return json_decode(json_encode(Connection::getConnection()->query($sql_str)->fetch_assoc()));
	}
}