<?php
try {//nom du PDO
  $dbh = new PDO('mysql:host=localhost;dbname=chat', 'root', 'user');
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
print "Erreur !: " . $e->getMessage() . "<br/>";
die();
}
print_r($_POST);
if isset($_POST["forminscription"])
{  $pseudo= htmlspecialchars($_POST["pseudo"]);
    	$mail= htmlspecialchars($_POST["mail"]);
    	$mail2= htmlspecialchars($_POST["mail2"]);
    	$mdp=sha1($_POST["mdp"]);
    	$mdp2=sha1($_POST["mdp2"]);
    if (!empty($_POST["pseudo"]) && !empty($_POST["mail"]) &&!empty($_POST["mail2"]) && !empty($_POST["mdp"]) &&  !empty($_POST["mdp2"]) )
     {
    	$insertmembre = $dbh->prepare("INSERT INTO utilisateur(pseudo,mail,mdp) VALUES (?,?,?)")
    	$insertmembre -> execute(array($pseudo,$mail,$mdp));
    	$_SESSIONS['comptecree'] ="votre compte a bien été créé";
    	header('location:index.php');
    };
    else{
    	echo "<font color='red'>" . $message="tous les champs doivent etre complétés" .</font color>
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
<div align="center">
    <h2>Inscription</h2>
    </br></br>
    <form method="POST" action="">
    	 <table >
    	 	<tr>
    	 	    <td align="right">
    	 	    	<label for="pseudo">Votre Pseudo :</label>
    	 	    </td>
    	 		 <td >
    	 		 	<input type="text" name="pseudo" id="pseudo" value="<?php if (isset($pseudo)) {
    	 		 		echo $pseudo;
    	 		 	}?>"/>
    	 		 </td>
    	 	</tr>
    	 	<tr>
    	 	    <td align="right">
    	 	    	<label for="mail">Votre adresse mail :</label>
    	 	    </td>
    	 		 <td >
    	 		 	<input type="email" name="mail" id="mail" value="<?php if (isset($mail)) {
    	 		 		echo $mail;
    	 		 	}?>"/>
    	 		 </td>
    	 	</tr>
    	 	<tr>
    	 	    <td align="right">
    	 	    	<label for="mail2">Confirmez votre mail :</label>
    	 	    </td>
    	 		 <td >
    	 		 	<input type="email" name="mail2" id="mail2" value="<?php if (isset($mail2)) {
    	 		 		echo $mail2;
    	 		 	}?>"/>
    	 		 </td>
    	 	</tr>
    	 	<tr>
    	 	    <td align="right">
    	 	    	<label for="mdp">mot de passe :</label>
    	 	    </td>
    	 		 <td >
    	 		 	<input type="password" name="mdp" id="mdp"/>
    	 		 </td>
    	 	</tr>
    	 	<tr>
    	 	    <td align="right">
    	 	    	<label for="mdp2">confirmez mot de passe :</label>
    	 	    </td>
    	 		 <td >
    	 		 	<input type="password" name="mdp2" id="mdp2"/>
    	 		 </td>
    	 	</tr>
         <tr>
         </br>
              <td></td>
              <td align="center">
              	<input type="submit" name="forminscription" value="Je m'inscris"/>
              </td>
          </tr>  	 
    	 
    	 </table>

    </form>
    <?php
    if (isset($message)) {
    	echo "$message";
    }
    </div>





</body>
</html>