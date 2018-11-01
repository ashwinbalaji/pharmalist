<?php
//include database configuration file
include_once 'config/db.php';
$myArray = array();
$sql="SELECT * FROM pharmacy_list ORDER BY pharmacy_name";
$result = $db->query($sql);
while ($row = $result->fetch_array(MYSQL_ASSOC)){
    $myArray[] = $row;
}
$pharmacyList["aaData"] = $myArray;
echo json_encode($pharmacyList);

