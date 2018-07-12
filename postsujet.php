<!DOCTYPE html>
<?php  session_start(); ?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title> Techaktu </title>
   <link rel="stylesheet" type="text/css" href="style.css">
   <link rel="stylesheet" type="text/css" href="bootstrap.css">
</head>

	<body>
            
         <!-- <div class="container carremilieu"><p>ppp</p></div> !-->
        <div class="container-fluid entete">
           <a href="index.php"> <img src="Calque_2.png" alt="" class="Calque_2"></a>
            <h4 class="inscription"><a href="formulaire.php"> Inscription</a>| <a href="connexion.php"> Connexion</a></h4>
        
        </div> 
           
            <div class="container-fluid carremilieu">
                <form id="contact" method="post" action="envoi.php">
                    
                   <p><label for="message"></label><textarea id="message" name="message" tabindex="4" cols="50" rows="8" class=""></textarea></p>
         
        <div style="text-align:center;"><input type="submit" name="envoi" value=" Envoyer " class="envoyer" /></div>
    </form>
</div>
         <h4 class="textesujet">Poster un nouveau sujet</h4>
</body>
</html>
