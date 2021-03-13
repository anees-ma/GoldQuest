<?php 
session_start();
if(session_destroy()){
    header('location:http://www.goldquestglobal.in/customerlogin');
}
?>