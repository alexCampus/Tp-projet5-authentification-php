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

function createUser($name, $email, $password_hache)
{

	$bdd=bdd();
	$password = sha1($password_hache);
	
	$requete = $bdd->prepare('INSERT INTO `users`(`name`, `email`, `password`) VALUES (:name,:email,:password)');

	$requete->execute(array(
		'name' => $name,
		'email' => $email,
		'password' => $password,
		));

		
		

}

function initialisationSession($name, $password_hache, $email)
{
	$bdd=bdd();
	$password = sha1($password_hache);

	$requete = $bdd->prepare('SELECT name, password, email FROM users WHERE name = :name AND password = :password');
	$requete -> execute(array(
		'name' => $name,
    	'password' => $password,    	
    	));

	$resultat = $requete->fetch();
	if ($resultat) 
	{
		session_start();
		$_SESSION['name'] = $resultat['name'];
		$_SESSION['email'] = $resultat['email'];
		setcookie('cookie_form_alex_name', $_SESSION['name'], (time() + 3600));
		setcookie('cookie_form_alex_email', $_SESSION['email'], (time() + 3600));
		
	}	
}

$name = strip_tags(htmlspecialchars($_POST['nom']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$password_hache = htmlspecialchars($_POST['password']);


if ($name && $email && $password_hache) 
{
	createUser($name, $email, $password_hache);
	initialisationSession($name, $password_hache, $email);
	header('Location: accueil.php');
}