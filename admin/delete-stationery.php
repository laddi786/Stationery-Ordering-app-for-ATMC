<?php
include '../connection.php';

$id=$_GET['id'];
$s=$conn->prepare("UPDATE stationery SET is_delete='1' WHERE id='$id'");
if($s->execute()){
	header('location:view-stationery.php');
}

?>