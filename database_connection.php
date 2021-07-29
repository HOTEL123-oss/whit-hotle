<?php
$connect = new PDO('mysql:host=localhost;dbname=hotel;charset=utf8', 'root', '');
if(!isset($_SESSION)){
    session_start(); 
       
   }
?>