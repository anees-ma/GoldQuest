<?php 
session_start();
if(session_destroy()){
    header('location:https://admin.goldquestglobal.in/customerlogin');
}
?>