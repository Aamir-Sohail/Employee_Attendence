<?php 
include "auth.php";
if(!isset($_SESSION['username'])){
    header("Location: ../index.php");
}else{
    $cuser=new auth();
    $result=$cuser->session_user($_SESSION['username']);
    $_SESSION['id'] = $result['id'];
    $_SESSION['name'] = $result['firstname'];
    $_SESSION['email'] = $result['email'];
    $_SESSION['address'] = $result['address'];
    $_SESSION['phone'] = $result['phone'];
    
}
?>