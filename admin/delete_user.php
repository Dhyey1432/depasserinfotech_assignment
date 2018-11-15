<?php 
include_once 'php/Sql_query.php';$sql = new Sql_query ; 
$user_id = $sql->decode_data($_GET['user_id']);
if ($sql->deleteUser($user_id)) {
	header("Location: user_list.php");exit();
}