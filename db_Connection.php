<?php
$dbhost="localhost";
$dbuser="root";
$dbpass="";
$dbname="e farm";
$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if(!$conn)
{
    die("Connection Failed") ;
}
?>