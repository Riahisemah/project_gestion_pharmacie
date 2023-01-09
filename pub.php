<?php

if (!empty($_POST))
{
    
session_start();

$_SESSION['nom']=$_POST['nom'];
$_SESSION['pass']=$_POST['pass'];

if($_SESSION['nom']=="admin"&&$_SESSION['pass']=="admin"){
    $x=$_SESSION['nom'];
    $y=$_SESSION['pass'];

    header("location:bib.php?nom=$x$&pass=$y");}

    else {
        header("location:login.html");
    }

}




?>