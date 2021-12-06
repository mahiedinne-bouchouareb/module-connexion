<?php 
   session_start();
   if (isset($_SESSION['login'])) {
     session_destroy();
     header('refresh:0');
   }

   //connexion base de donner
$db = mysqli_connect("localhost:3306","mahiedinne123", "12345", "mahiedinne-bouchouareb_moduleconnexion");
  
   if (isset($_POST['login']) && isset($_POST['password'])){
    $login = htmlspecialchars($_POST['login']);
    $password = htmlspecialchars($_POST['password']);
    $requet = mysqli_query($db, "SELECT * FROM utilisateurs WHERE login='$login' and password='$password'");
    $resulta = mysqli_fetch_array($requet,MYSQLI_ASSOC);
      // vérifier si la connexion est réalisé
    if($resulta != null){
        $_SESSION['login'] = $login;
        //$_SESSION['password'] =$password;
       // On redirige le visiteur vers la page d'accueil 
        header("Location: index.php");
      if ($login === 'admin' &&  $password === 'admin'){
        $_SESSION['login'] =$login;
        header('location: admin.php');
      }
      else{
        $_SESSION['login'] =$login;
        header('location: profil.php');
      
      
      }
    
    }

    else
    {
      echo "Le nom d'utilisateur ou le mot de passe est incorrect.";
    }
     
   }
    
 ?>

<?php include("header.php") ?>

<body class="connexionBackground">
  <header class="btIndex">
  
  <a id="accueil" href="index.php">ACCUEIL</a>
  </header>
  <div id="main">

  <form method="post" action="#" id="connexionForm">
  <h2>Connexion</h2>
    <input type="text" class="box-input" name="login" autocomplete="off" placeholder="login" >
    <input type="password" class="box-input" name="password" autocomplet="off" placeholder="password">
    <input type="submit" value="Connexion " name="submit" class="box-button">
    <p class="box-register">Vous êtes nouveau ici <a href="inscription.php">S'inscrire</a></p>
  </form>
  </div>
  <?php include("footer.php") ?>
