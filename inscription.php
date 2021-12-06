
<?php
session_start();
 //connexion base de donner
$db = mysqli_connect("localhost:3306","mahiedinne", "12345", "mahiedinne-bouchouareb_moduleconnexion");
if (isset($_POST['submit'])){
  //creation de variable qui contienne la valeur qui sera rentré dans chaque champ $_POST
  $login = $_POST['login'];
  $prenom = $_POST['prenom'];
  $nom = $_POST['nom'];
  $password = $_POST['password'];
  $confirme = $_POST['confirme'];

  $requeteLogin = mysqli_query($db, "SELECT * FROM utilisateurs WHERE login = '$login'"); //Reponse de la requete permettant de trouver un utilisateur ayant le même login
  $queryLogin = mysqli_fetch_assoc($requeteLogin); //Extraction des données de la requete et retour sous forme de tableau association (clé => valeur)

  if(isset($queryLogin) && strtolower($login) == strtolower($queryLogin['login'])){ // strtolower() permet de convertir les majuscules en minuscule 
    echo "Il existe déjà un utilisateur avec ce login";
  }
  else //Sinon, on continue 
  {
      //Si la requête n'est pas vide et que le 
    //Condition de verification des mots de passe : le mot de passe et sa confirmation correspondent-ils ?
    if($password === $confirme)
    {
      // maintenant je test que tout les champ du formulaire son rempli et existe dans $_POST
      if (isset($login) && isset($prenom) && isset($nom) && isset($password)) { 
              $requete = mysqli_query ($db , "INSERT INTO `utilisateurs` (`login`,`prenom`,`nom`,`password`) VALUES ( '$login', '$prenom', '$nom', '$password')");
              //header("Location: connexion.php");
      }
    }
    else
    {
        echo "Les mots de passe ne correspondent pas.";
    }
  }
}

?>

<?php include("header.php") ?>


<body class="inscriptionBody">
<header>
       <ul> 
        <a href="index.php">ACCUEIL</a>
        <?php if (!isset($_SESSION['login'])) { ?>
        <link rel="stylesheet" href="css/index.css" />
        <li><a href="connexion.php">Connexion</a></li>
        <?php } ?><?php if (isset($_SESSION['login'])) { ?>
        <li><a href="connexion.php">Déconnexion</a></li>
        <?php } ?>
     </ul> 
</header> 

  <div id="main">
    <form method="post" action="" class="formInscription">
      <div id="inscriptionTitre">
        <h1 >inscription</h1>
      </div>
      
      <div class="inputs">
        <input type="login" placeholder="login" name="login" autocomplete="off" required>
        <input type="prenom" placeholder="prenom" name="prenom" autocomplete="off"  required>
        <input type="nom" placeholder="nom" name="nom" autocomplete="off"    required>
        <input type="password"placeholder="password" name="password" autocomplete="off" required>
        <input type="password"placeholder="Comfirmer password" name="confirme" autocomplete="off"required>
      </div>
      
      <p class="inscription">Je n'ai pas de <span>compte</span>. Je m'en <span>crée</span> un.</p>
      <div align="center">
        <button type="submit" name="submit">S'inscrire</button>
        </div>
    </form>
  </div>
  <?php include("footer.php") ?>
