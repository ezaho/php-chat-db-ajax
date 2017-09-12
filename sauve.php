<?php
session_start();
try {//nom du PDO
  $dbh = new PDO('mysql:host=localhost;dbname=chat', 'root', 'user');
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
print "Erreur !: " . $e->getMessage() . "<br/>";
die();
}
print_r($_POST);

if (isset($_GET['id']) && $_GET['id']>0) {
	$getid = intval($_GET['id']);
	$requser = $dbh->prepare('SELECT * FROM utilisateur WHERE id')
	$requser->execute(array($getid));
	// affichage des données
	$userinfo = $requser->fetch();
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
    <h2>Profil de <?php echo $userinfo['pseudo']; ?></h2>
    </br></br>
      pseudo=<?php echo $userinfo['pseudo']; ?>
      </br>
      mail =<?php echo $userinfo['mail']; ?>
    <?php
    if (isset($_SESSION['id']) && $userinfo['id'])
    {
    	?>
    	<a href="#">Editer mon profil</a>
    	<a href="deconnection.php">Me deconncter</a>
    <?php
    }
    ?>
    </div>
    </body>
    </html>
    <?php
 }
 else
 {
 	header(string)
 }
    ?> }
