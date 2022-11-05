<?php

$base = 'http://localhost/Hotel_Booking';

$db_name = 'hotel_db';
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';

$pdo = new PDO("mysql:dbname=".$db_name.";host=".$db_host, $db_user, $db_pass);

$check = filter_input(INPUT_POST,'check');

function create_unique_id(){
    $str = 'abcdefgijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $rand = array();
    $lenght = strlen($str) - 1;

    for ($i=0; $i < 20; $i++) { 
       $n = mt_rand(0,$lenght);
       $rand[] = $str[$n];
    }

    return implode($rand);
}

if(isset($_COOKIE['user_id'])){
    $user_id = $_COOKIE['user_id'];
}else{
    setcookie('user_id',create_unique_id(),time() + 60*60*24*30, '/');
    header('location:index.php');
}

