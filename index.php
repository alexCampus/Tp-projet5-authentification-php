<?php
if (!isset($_SESSION)) 
{
  session_start();
}
if (isset($_COOKIE['cookie_form_alex_name'])) 
{
	header('Location: accueil.php');
}
else{
  ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mini Projet 5</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<style type="text/css">
	body {
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #eee;
}

.form-signin {
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;
}
.form-signin .form-signin-heading,
.form-signin .checkbox {
  margin-bottom: 10px;
}
.form-signin .checkbox {
  font-weight: normal;
}
.form-signin .form-control {
  position: relative;
  height: auto;
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
</style>
 <body>
 

    <div class="container">
		<nav class="navbar navbar-default navbar-fixed-top">
  			<div class="container">
   				<a href="register.php"><button type="button" class="btn btn-default navbar-btn">Créer un compte</button></a>
  			</div>
		</nav>
      	<form class="form-signin" action="LoginController.php" method="POST">
        	<h2 class="form-signin-heading">Connectez Vous</h2>
        	<label for="inputEmail" class="sr-only">Name</label>
        	<input type="text" id="inputName" name="name" class="form-control" placeholder="Name" required autofocus>
            <?php
               if (isset($_GET['msg']) && $_GET['msg'] === 'erreur-login') 
                {
                  include('erreur_login.inc.php');
                }
            ?>
        	<label for="inputPassword" class="sr-only">Mot de Passe</label>
        	<input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
            <?php 
              if (isset($_GET['msg']) && $_GET['msg'] === 'erreur-password') 
                {
                  include('erreur_password.inc.php');          
                }  
            ?>
       	 	<button class="btn btn-lg btn-primary btn-block" type="submit">Se Connecter</button>
      	</form>
	       <?php 
            if (isset($_GET['msg']) && $_GET['msg'] === 'logout') {
              echo "<h3>Vous êtes déconnecté</h3>";
            }
         ?>	
    </div> <!-- /container -->


    
  </body>
</html>
<?php 
}
?>