 <?php require 'header.php';?>
<?php
// session_start();

try {//nom du PDO
  $dbh = new PDO('mysql:host=localhost;dbname=chat', 'root', 'user');
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
print "Erreur !: " . $e->getMessage() . "<br/>";
die();
}
//print_r($_POST);
if (isset($_POST["formconnect"])) {
	$mail = htmlspecialchars($_POST['mail']);
	$mdp = sha1($_POST['mdp']);
	if (!empty($mail) && !empty($mdp)) {
		// requete si l'utilisateur existe vraiment
		$requser = $dbh->prepare("SELECT* FROM utilisateur WHERE mail=$mail  && mdp=$mdp");
			$requser->execute(array($mail,$mdp));
			$userexist = $requser->rowcount();
			if ($userexist == 1) {
				$userinfo = $requser -> fetch();
			       $_SESSION['id'] = $userinfo['id'];
			       $_SESSION['mail'] = $userinfo['mail'];
			       $_SESSION['pseudo'] =$userinfo['pseudo'];
			       }
			      // header('location :tchat.php?'). id=$_SESSION['id']);
		   else{
		     	$message ="mauvais mail ou mot de passe incorrect";
		     	}
	 }
	else {
		 $message = "tous les champs doivent être completés";
	   }
}
  ?>
<!DOCTYPE html>
<html>
<head>
	<title> tchatez-tchatons</title>
	<meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div container id="connexion"></div>
<div align="center">
    <h2>Connection</h2>
    </br></br>
    <form method="POST" action="tchat.php">
       <input type="email" name="mail" placeholder="mail"/>
       <input type="password" name="mdp" placeholder="mot de passe"/>
       <input type="submit" name="formconnect" value="se connecter"/>
    </form>
    <?php
    if (isset($message)){
    	echo "<font color='red'>" . $message="" ."</font color>";
      }?>
    </div>
    </div>
    </body>
    </html>
    <?php require 'footer.php';?>