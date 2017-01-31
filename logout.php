<?php 
session_start();

$_SESSION = array();
session_destroy();
setcookie('cookie_form_alex_name');
setcookie('cookie_form_alex_email');
$msg = 'logout';
header('Location: index.php?msg='.$msg);