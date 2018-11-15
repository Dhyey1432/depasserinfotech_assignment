<?php include_once '../php/Connection.php';$connection = new Connection ; 
$sql_str_getCityByCountryId = "SELECT * FROM states WHERE country_id = ".$_POST['country_id'] ;
echo json_encode($connection::getSelectAllQuery($sql_str_getCityByCountryId));
?>