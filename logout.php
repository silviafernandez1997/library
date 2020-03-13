<?php
session_start();
//this 2 lines of code destroy the session
unset($_SESSION['login_user']);
header("location: index.php");
?>