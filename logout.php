<?php 
session_start();

$_SESSION = array();
session_destroy();
$msg = 'logout';
header('Location: index.php?msg='.$msg);