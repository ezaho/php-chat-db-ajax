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
 if (isset($_POST['pseudo']) && isset($_POST['message']) && !empty($_POST['pseudo']) && !empty($_POST['message']))
  {
 	   $pseudo = htmlspecialchars($_POST['pseudo']); 
 	   // (pour sécuriser ,se proteger et eviter des injections sql,bloquer autres codes php)
 	   $message = htmlspecialchars($_POST['message']);
 	   $insertmsg = $dbh->prepare('INSERT INTO lesmessages(pseudo,listemessage) VALUES(pseudo,listemessage)');
 	   $insertmsg->execute[array($pseudo,$message)];
   } 
?>
<!DOCTYPE html>
<html>
<head>
	<title> Messages </title>
	<meta charset="utf-8">
</head>
<body>
 <div align="center">
     <form method="post" action="">
      <div id="membre1">
       <input  type="text"  name="pseudo" placeholder="pseudo" values ="<?php if (isset($pseudo)) { echo $pseudo;}   
        ?>"></br>
          <textarea type="text" name="message" placeholder="message">  </textarea></br>
          </div>
           <div id="membre2">
       <input  type="text"  name="pseudo" placeholder="pseudo" values ="<?php if (isset($pseudo)) { echo $pseudo;}   
        ?>"></br>
          <textarea type="text" name="message" placeholder="message">  </textarea></br>
          </div>
           <div id="membre3">
       <input  type="text"  name="pseudo" placeholder="pseudo" values ="<?php if (isset($pseudo)) { echo $pseudo;}   
        ?>"></br>
          <textarea type="text" name="message" placeholder="message">  </textarea></br>
          </div>


          <input type="submit" value="envoyez">
     </form>
     </div>
     <?php 
         $tousmessages = $dbh->query('SELECT * FROM lesmessages ORDER BY date DESC LIMIT 5');
         while ($message = $tousmessages->fetch()) 
         {
          ?>
           <!-- entre deux balises php je peux ecrire du html -->
          <b><?php echo $message['pseudo']  ;?>  : </b>
          <?php echo $message['message']  ;?> </br>

          <?php
          } 
          ?>         	
    </body>
</html>
<?php require 'footer.php';?>