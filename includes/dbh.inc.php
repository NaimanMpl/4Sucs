<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "brasserie_des_4_sucs";

$con = mysqli_connect($servername, $username, $password, $database);

if(!$con) {
    die("Impossible de se connecter à la base de donnée !");
}