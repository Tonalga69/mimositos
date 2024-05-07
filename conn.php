<?php 
$server="localhost"; //nombre del servidor de base
$user="root"; //usuario de la
$pass=""; //contraseña del us
$dbname = "mimositos";//nombre de la bd

$conn=mysqli_connect($server, $user, $pass, $dbname);

if(!$conn){
    die("Conexión Fallida: ". mysqli_connect_error() ."<br>");
}else{

}



?>