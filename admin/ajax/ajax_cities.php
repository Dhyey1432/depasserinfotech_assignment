<?php include_once '../php/Connection.php';$connection = new Connection ; 
$sql_str_getCitiesByStateId = "SELECT * FROM cities WHERE state_id = ".$_POST['state_id'];
echo json_encode($connection::getSelectAllQuery($sql_str_getCitiesByStateId)); ?>