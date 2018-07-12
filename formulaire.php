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
/* try
{
   $bdd = new PDO('mysql:localhost:8080;dbname=(forum);charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
} */

 $bdd = new PDO('mysql:host=127.0.0.1;dbname=forum3','root', '');

    if (isset($_POST['forminscription']))
    {
          $pseudo = htmlspecialchars($_POST['pseudo']);
          $mail = htmlspecialchars($_POST['mail']);
          $mail2 = htmlspecialchars($_POST['mail2']);
          $mdp = sha1($_POST['mdp']);
          $mdp2 = sha1($_POST['mdp2']);
        
        if(!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2']))
        {
          
            
            $pseudolenght = strlen($pseudo);
            if($pseudolenght <= 255)
            {
                
                if($mail == $mail2)
                {
                if(filter_var($mail, FILTER_VALIDATE_EMAIL))
                {
                    $reqmail = $bdd->prepare("SELECT * FROM f_membres WHERE mail = ? ");
                    $reqmail->execute(array($mail));
                    $mailexist = $reqmail->rowCount();
                    if ($mailexist == 0)
                    {
                
                    if($mdp == $mdp2)
                    {
                        $insertmbr = $bdd->prepare("INSERT INTO f_membres(pseudo, mail, motdepasse) VALUES (?, ?, ? )");
                        $insertmbr->execute(array($pseudo, $mail, $mdp));
                        $erreur = "Votre compte à bien été créé ! <a href=\"connexion.php\">Me connecter</a>";    
                    }
                    else
                    {
                        $erreur = "Vos mots de passes ne correspondent pas !";
                    }
                 }
                        
                  else {
                      $erreur = "Adresse mail déjà utilisée !";
                  }  
                }
            }
                else
                {
                    $erreur = "vos adresses mails ne corrsepondent pas !";
                }
              }
               else 
               {
                   $erreur = "Votre adresse mail n'est pas valide..";
               }
            }
            else 
            {
                $erreur = "Votre pseudo ne doit pas dépasser 255 caractères..";
            }
        }
        else
        {
            $erreur = "Tous les champs doivent être remplis !";
        }
   
?>



     <div align="center">
            <h3>Inscription</h3>
            <br/><br />
            <form method="POST" action="">
              <table>
                  <tr>
                <td align="right"> 
                  <label for="pseudo">Pseudo :</label>
                  </td>
                   <td align="right">
                       <input type="text" placeholder="Votre Pseudo" id="pseudo" name="pseudo" value="<?php if(isset($pseudo)) {echo $pseudo;} ?>"/>
                      </td>
                        </tr>
                               <tr>
                <td align="right"> 
                  <label for="mail">Mail :</label>
                  </td>
                   <td align="right">
                       <input type="email" placeholder="Votre Mail" id="mail" name="mail" value="<?php if(isset($mail)) {echo $mail;} ?>"/>
                      </td>
                        </tr>
                          <tr>
                <td align="right"> 
                  <label for="mail2">Confirmation du Mail :</label>
                  </td>
                   <td align="right">
                       <input type="email" placeholder="Confirmation de votre Mail" id="mail2" name="mail2" value="<?php if(isset($mail2)) {echo $mail2;} ?>"/>
                      </td>
                        </tr>
                           <tr>
                <td align="right"> 
                  <label for="mdp">Mot de Passe :</label>
                  </td>
                   <td align="right">
                       <input type="password" placeholder="Votre mot de passe" id="mdp" name="mdp"/>
                      </td>
                        </tr>
                           <tr>
                <td align="right"> 
                  <label for="mdp2">Confirmation du mot de Passe :</label>
                  </td>
                   <td align="right">
                       <input type="password" placeholder="Confirmation mot de passe" id="mdp2" name="mdp2"/>
                      </td>
                        </tr>
                  <tr>
                      <td></td>
                     
                      <td>
                           <br />
                     <input type="submit" name="forminscription" value="inscription" />
                          </td>
                      </tr>
                </table>
             
              
              
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


