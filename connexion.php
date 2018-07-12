<!DOCTYPE html>

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
                   <?php 
session_start();

 $bdd = new PDO('mysql:host=127.0.0.1;dbname=forum3','root', '');
 if(isset($_POST['formconnexion']))
 {
     $mailconnect = htmlspecialchars($_POST['mailconnect']);
     $mdpconnect = sha1($_POST['mdpconnect']);
     if(!empty($mailconnect) AND !empty($mdpconnect))
     {
         $requser = $bdd->prepare("SELECT * FROM f_membres WHERE mail = ? AND motdepasse= ?");
         $requser->execute(array($mailconnect, $mdpconnect));
         $userexist = $requser->rowCount();
         if($userexist == 1)
         {
             $userinfo = $requser->fetch();
             $_SESSION['id'] = $userinfo['id_membres'];
             $_SESSION['pseudo'] = $userinfo['pseudo']; 
             $_SESSION['mail'] = $userinfo['mail'];
             header("location: profil.php?id=".$_SESSION['id']);
         } else
         {
             $erreur = "Mauvais Identifiants !";
         }
     }
     else
     {
         $erreur = "Tous les champs doivent être remplis !";
     }
 }
?>

     <div align="center">
            <h3>Connexion</h3>
            <br/><br />
            <form method="POST" action="">
             <input type="email" name="mailconnect" placeholder="Mail" />
             <input type="password" name="mdpconnect" placeholder="Mot de passe" />
             <input type="submit" name="formconnexion" value="Se connecter" />
              
            </form>
            <?php 
           if(isset($erreur))
           {
               echo '<font color="red">'.$erreur."</font>";
           }
         
         ?>
        </div>

</div>
     
</body>
</html>



 