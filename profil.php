<?php 
session_start();

 $bdd = new PDO('mysql:host=127.0.0.1;dbname=forum3','root', '');
 if(isset($_GET['id']) AND $_GET['id'] > 0)
 {
     $getid = intval($_GET['id']);
     $requser = $bdd->prepare('SELECT * FROM f_membres WHERE id_membres = ?');
     $requser->execute(array($getid));
     $userinfo = $requser->fetch();
?>
<html>

<head>
<title></title>
<meta charset="utf-8">
    </head>

<body>
     <div align="center">
            <h3>Profil de <?php echo $_SESSION['pseudo']; ?></h3>
            <br/><br />
           Pseudo = <?php echo $_SESSION['pseudo']; ?> <br/>
           Mail = <?php echo $_SESSION['mail']; ?><br />
            <?php 
           if(isset($_SESSION['id']) AND $_SESSION['id'] == $_SESSION['id']) 
           {
                ?>
               <a href="editionprofil.php">Editer mon profil</a>
               <a href="deconnexion.php">Déconnexion</a>
         <?php 
           }
                ?>
    </div>
    </body>
</html>

<?php 
 }
  
?>