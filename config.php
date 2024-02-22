<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "activity";

$con = mysqli_connect("$host", "$username", "$password", "$database");

if(!$con)
{
    die("". mysqli_connect_error());
}


?>