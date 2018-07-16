<?php
session_start();
$servername="localhost";
$username="root";
$password="";
$db="sopon";
$database = new mysqli($servername, $username, $password,$db);

function dd($data){
    print_r($data);
    exit();
    }
?>
