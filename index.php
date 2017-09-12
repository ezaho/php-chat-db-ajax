  <?php require 'header.php';?>
  <?php 
try {//nom du PDO
  $dbh = new PDO('mysql:host=localhost;dbname=chat', 'root', 'user');
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
print "Erreur !: " . $e->getMessage() . "<br/>";
die();
}
// print_r($_POST);
if (isset($_POST["forminscription"]))
{  $pseudo= htmlspecialchars($_POST["pseudo"]);
    	$mail= htmlspecialchars($_POST["mail"]);
    	$mail2= htmlspecialchars($_POST["mail2"]);
    	$mdp=sha1($_POST["password"]);
    	$mdp2=sha1($_POST["password2"]);
    if (!empty($_POST["pseudo"]) && !empty($_POST["mail"]) &&!empty($_POST["mail2"]) && !empty($_POST["password"]) &&  !empty($_POST["password2"]) )
     {
    	$insertmembre = $dbh->prepare("INSERT INTO utilisateur(pseudo,mail,password) VALUES (?,?,?)");
    	$insertmembre->execute(array($pseudo,$mail,$mdp));
    	// $message="votre compte a bien été créé";
    	$_SESSION['comptecree'] ="votre compte a bien été créé!<a href=\"connection.php\">Me connecter</a>";
    	header('location:connexion.php');
    	// echo "<font color='green'>" .$message="votre compte a bien été créé" ."</font color>";
    }
        else
         {
    	      echo "<font color='red'>" . $message="tous les champs doivent etre complétés" ."</font color>";
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
       <link rel="stylesheet" href="style.css">
</head>
<body>
<div container id="acceuil">
<div id="inscription" class="center">
    <h2>Inscription</h2>
    <form method="POST" action="" id="center">
    	 <table >
    	 	<tr>
    	 	    <td class="right">
    	 	    	<label for="pseudo">Votre Pseudo :</label>
    	 	    </td>
    	 		 <td >
    	 		 	<input type="text" name="pseudo" id="pseudo" value="<?php if (isset($pseudo)) {
    	 		 		echo $pseudo;
    	 		 	}?>"/>
    	 		 </td>
    	 	</tr>
    	 	<tr>
    	 	    <td class="right">
    	 	    	<label for="mail">Votre adresse mail :</label>
    	 	    </td>
    	 		 <td >
    	 		 	<input type="email" name="mail" id="mail" value="<?php if (isset($mail)) {
    	 		 		echo $mail;
    	 		 	}?>"/>
    	 		 </td>
    	 	</tr>
    	 	<tr>
    	 	    <td class="right">
    	 	    	<label for="mail2">Confirmez votre mail :</label>
    	 	    </td>
    	 		 <td >
    	 		 	<input type="email" name="mail2" id="mail2" value="<?php if (isset($mail2)) {
    	 		 		echo $mail2;
    	 		 	}?>"/>
    	 		 </td>
    	 	</tr>
    	 	<tr>
    	 	    <td class="right">
    	 	    	<label for="password">mot de passe :</label>
    	 	    </td>
    	 		 <td >
    	 		 	<input type="password" name="password" id="password"/>
    	 		 </td>
    	 	</tr>
    	 	<tr>
    	 	    <td class="right">
    	 	    	<label for="password2">confirmez mot de passe :</label>
    	 	    </td>
    	 		 <td >
    	 		 	<input type="password" name="password2" id="password2"/>
    	 		 </td>
    	 	</tr>
         <tr>
         </br>
              <td></td>
              <td class="center">
              	<input type="submit" name="forminscription" value="Je m'inscris"/>
              </td>
          </tr>  	 
    	 
    	 </table>

    </form>
    <?php 
    if (isset($message)) {
    	echo "<font color='red'>".$message."</font>";
    }
    ?>
    </div>
 </div>





</body>
</html>
<?php require 'footer.php';?>
