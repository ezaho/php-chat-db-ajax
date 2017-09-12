  <?php 
  session_start(); 
 if (isset($_POST["pseudo"]) && isset($_POST["login"]) && !empty($_POST["pseudo"]) && !empty($_POST["login"]))
      {$pseudo= htmlspecialchars($_POST["pseudo"]);
       $login=htmlspecialchars($_POST["login"]);
   }

 ?>
<!DOCTYPE html>
<html>
<head>
	<title> tchatez-tchatons</title>
	   <meta charset="utf-8" />
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/ bootstrap/3.3.7/css/bootstrap.min.css">
        <style>
            form
                {
                   text-align:center;
                } 
        </style> 
</head>
<body>
 <header>
  <nav class="navbar navbar-default">
     <div class="container-fluid">
   <form action="minichat_post.php" method="post">

        <p>

        <label for="pseudo">Pseudo</label> : <input type="text" name="pseudo" id="pseudo" /><br />

        <label for="login">Login</label> :  <input type="text" name="login" id="login" /><br />


        <input type="submit" value="Envoyer" />

    </p>

    </form>
     </div>
    </nav>
    </header>
    <div class="container clearfix">
       <div class="people-list id=people-list">
   	   <div class="recherche">
   	    <input type="texte" placeholder="recherche">
   	     <i class="fa fa-search"></i>
   	     </div>
   	      <ul class="list">
   	      	<li class="clearfix">
   	      	  <img src="  " alt="avatar">
   	      	   <div class="about">
   	      	   	<div class="name">...</div>
   	      	   	<div class ="status"
   	      	   	    <i class="fa fa-circle online"></i> online
                     </div>
                   </div>
                </li>
                <li class="clearfix">
   	      	  <img src="  " alt="avatar">
   	      	   <div class="about">
   	      	   	<div class="name">...</div>
   	      	   	<div class ="status"
   	      	   	    <i class="fa fa-circle online"></i> online
                     </div>
                   </div>
                </li>
                <li class="clearfix">
   	      	  <img src="  " alt="avatar">
   	      	   <div class="about">
   	      	   	<div class="name">...</div>
   	      	   	<div class ="status"
   	      	   	    <i class="fa fa-circle online"></i> online
                     </div>
                   </div>
                </li>
             </ul>   	   	
   	   </div>
   	    <div class="chat">
      <div class="chat-header clearfix">
        <img src=".." alt="avatar"/>
          <div class="chat-about">
          <div class="chat-with">Chat with... </div>
          <div class="chat-num-messages">already ...messages</div>
        </div>
        <i class="fa fa-star"></i>
      </div> 
      <div class="chat-history">
        <ul>
          <li class="clearfix">
            <div class="message-data align-right">
              <span class="message-data-time" >   </span> &nbsp; &nbsp;
              <span class="message-data-name" > </span> <i class="fa fa-circle me"></i>
              
            </div>
            <div class="message other-message float-right">
              </div>
          </li>
           <li>
            <div class="message-data">
              <span class="message-data-name"><i class="fa fa-circle online"></i>   </span>
              <span class="message-data-time">    </span>
            </div>
            <div class="message my-message">
              </div>
          </li>
          </ul>
          </div>
           <div class="chat-message clearfix">
        <textarea name="message-to-send" id="message-to-send" placeholder ="Ecrivez votre message" rows="3"></textarea>
                
        <i class="fa fa-file-o"></i> &nbsp;&nbsp;&nbsp;
        <i class="fa fa-file-image-o"></i>
        
        <button>Envoyez</button>

      </div>
       </div>
   </div>

</body>
</html>