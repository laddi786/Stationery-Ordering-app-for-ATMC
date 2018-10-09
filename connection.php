<?php
$servername="localhost";
$dbname="atmc";
$username="root";
$password="";

$conn= new PDO("mysql:host=$servername;dbname=$dbname;",$username,$password);

session_start();

?>