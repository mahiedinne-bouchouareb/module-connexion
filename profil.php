<?php
 session_start();
 
 
$db = mysqli_connect("localhost:3306","mahiedinne123", "12345", "mahiedinne-bouchouareb_moduleconnexion");
 
 if(isset($_SESSION['login']))
 {
   $sessionlogin = $_SESSION['login'];
 
 $result = mysqli_query($db, "SELECT * FROM utilisateurs WHERE login='$sessionlogin'");
 $test = mysqli_fetch_array($result,MYSQLI_ASSOC);
 if (isset($_SESSION['login'])){
   $sessionlogin = htmlspecialchars($_SESSION['login']);
    
 }
 
 if(isset($_POST['newlogin']) AND !empty($_POST['newlogin']) AND $_POST['newlogin'] != $test['login']) {
   $newlogin =$_POST['newlogin']; 
    $newlogin = htmlspecialchars($_POST['newlogin']);
    $insertlogin = mysqli_query($db,"UPDATE utilisateurs SET login = '$newlogin' WHERE login = '$sessionlogin'");
    $_SESSION["login"]=$newlogin;
    header('Location: profil.php');
  
   }
  
    if(isset($_POST['newprenom']) AND !empty($_POST['newprenom']) AND $_POST['newprenom'] != $test['prenom']) {
      $newprenom =$_POST['newprenom']; 
       $newprenom = htmlspecialchars($_POST['newprenom']);
       $insertprenom = mysqli_query($db,"UPDATE utilisateurs SET prenom = '$newprenom' WHERE login = '$sessionlogin'");
       header('Location: profil.php');
    }
    if(isset($_POST['newnom']) AND !empty($_POST['newnom']) AND $_POST['newnom'] != $test['nom']) {
      $newnom =$_POST['newnom']; 
       $newnom = htmlspecialchars($_POST['newnom']);
       $insertnom = mysqli_query($db,"UPDATE utilisateurs SET nom = '$newnom' WHERE login = '$sessionlogin'");
       header('Location: profil.php');
    
    }
     if(isset($_POST['newmdp1']) AND !empty($_POST['newmdp1']) AND isset($_POST['newmdp2']) AND !empty($_POST['newmdp2'])) {
      $newmdp1 =$_POST['newmdp1']; 
      $newmdp2 =$_POST['newmdp2'];
      if ($newmdp1==$newmdp2){
         $insermotdepass = mysqli_query($db,"UPDATE utilisateurs SET password = '$newmdp1' WHERE login = '$sessionlogin'");
         header('Location: profil.php');
      }

        else {
          echo "Vos deux mdp ne correspondent pas !";
       }
        
     
      }
   }
      
?>

 <?php include("header.php") ?>
 
   <body class="profilBackground">
   <?php include("navbar.php") ?>
   <?php if(isset($_SESSION['login'])): ?> <!-- Si l'utilisateur est connecté -->
      <div align="center" id="main">
         <h2>Edition de mon profil</h2>
         <div align="center">
            <form method="POST" action="" enctype="multipart/form-data" id="formProfil">
               <div class="formProfil-item">
                  <label>login:</label>
                  <input type="text" name="newlogin" placeholder="login" autocomplete="off" value="<?php echo $test['login']; ?>" />
               </div>
               <div class="formProfil-item">
                  <label>prenom :</label>
                  <input type="text" name="newprenom" placeholder="prenom" autocomplete="off" value="<?php echo $test['prenom']; ?>" />
               </div>
               <div class="formProfil-item">
                  <label>nom :</label>
                  <input type="text" name="newnom" placeholder="nom" autocomplete="off" value=" <?php echo $test['nom']; ?>" />
               </div>
               <div class="formProfil-item">
                  <label>Mot de passe :</label>
                  <input type="password" name="newmdp1" placeholder="Mot de passe"/>
               </div>
               <div class="formProfil-item">
                  <label>Confirmation mot de passe</label>
                  <input type="password" name="newmdp2" placeholder="Confirmation du mot de passe" />
               </div>
               <div class="formProfil-item">
                  <input type="submit" value="Mettre à jour mon profil !" />
               </div>
             </form>
             <?php if(isset($msg)) { echo $msg; } ?>           
         </div>
      </div>
      <?php else: ?> <!-- Si l'utilisateur n'est pas connecté -->
         <div id="main">
            <p align="center">Vous n'êtes pas connecté. Cliquez <a href="connexion.php">ici</a> pour vous connecter.</p>
         </div>
      <?php endif; ?> <!-- Fin de la condition if ligne 62 -->
   <?php include("footer.php") ?>


    
