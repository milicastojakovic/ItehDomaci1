<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "serije";

$con = new mysqli($host,$user,$pass,$db);

if ($con->connect_errno){
    exit("Greska:".$con->connect_error.", kod:".$con->connect_errno);
}
?>