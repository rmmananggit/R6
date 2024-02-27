<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "r6_activity";

$con = mysqli_connect("$host", "$username", "$password", "$database");

if(!$con)
{
    die("". mysqli_connect_error());
}


?>