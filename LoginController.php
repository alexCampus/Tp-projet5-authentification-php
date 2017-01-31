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
	$password = sha1($password_hache); 
	
	$requete = $bdd->prepare('SELECT name, password, email FROM users WHERE name = :name AND password = :password');
	$requete -> execute(array(
		'name' => $name,
    	'password' => $password    	
    	));

	$resultat = $requete->fetch();

	if ($resultat) 
	{
		session_start();
		$_SESSION['name'] = $resultat['name'];
		$_SESSION['email'] = $resultat['email'];
		
	}	
} 

$name = strip_tags(htmlspecialchars($_POST['name']));
$password_hache = htmlspecialchars($_POST['password']);

loginUser($name, $password_hache);

if (isset($_SESSION['name'])) 
{
	header('Location: accueil.php');	
}
else
{
	header('Location: erreur.php');

}