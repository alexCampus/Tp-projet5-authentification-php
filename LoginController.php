<?php

function bdd()
{
	try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=TP-miniprojet5', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch (Exception $e)
    {
    die('Erreur : ' . $e->getMessage());
    }
	return $bdd;
}

function loginUser($name, $password_hache)
{
	$bdd=bdd();

	//On vérifie que le login existe dans la table
	//et on recupere les infos si il existe
	$verif_login = $bdd->query("SELECT name, password, email FROM users WHERE name = '" . $name . "' LIMIT 1");
	$donnees = $verif_login->fetch();

	if (sha1($password_hache) == $donnees['password']) 
	{
		session_start();
		$_SESSION['name'] = $donnees['name'];
		$_SESSION['email'] = $donnees['email'];
		setcookie('cookie_form_alex_name', $_SESSION['name'], (time() + 3600));
		setcookie('cookie_form_alex_email', $_SESSION['email'], (time() + 3600));
		header('Location: accueil.php');
		exit;
	}
	
	
	if (!isset($donnees['name'])) 
	{
		$msg = "erreur-login";
	}
	else
	{
		$msg = "erreur-password";
	}
		
	header('Location: erreur.php?msg=' . $msg);
	
} 

$name = strip_tags(htmlspecialchars($_POST['name']));
$password_hache = htmlspecialchars($_POST['password']);

loginUser($name, $password_hache);

