<?php
 session_start();

$db = mysqli_connect("localhost:3306","mahiedinne", "12345", "mahiedinne-bouchouareb_moduleconnexion");
$requete =mysqli_query ($db ,"SELECT * FROM  utilisateurs ");
$query = mysqli_fetch_all($requete,MYSQLI_ASSOC);


?>

<?php include("header.php") ?>
<body class="adminBackground">
<header>
                <ul>
                    <li><a href="http://www.villeneuve-judo.com/pages/karate/presentation.html">Karate adulte</a></li>
                    <li><a href="http://www.villeneuve-judo.com/pages/karate/karate-enfant-loisir-et-educatif.html">Karate enfant</a></li>
                    <li><a href="http://www.sainteskarateclub.com/non-categorise/galerie-photos.html">Galerie photos</a></li>
                    <li><a href="inscription.php">Inscription</a></li>
                    <li><a href="profil.php">Profil</a></li>
                    <?php if (!isset($_SESSION['login'])) { ?>
                    <li><a href="connexion.php">Connexion</a></li>
                    <?php } ?><?php if (isset($_SESSION['login'])) { ?>
                    <li><a href="connexion.php">Déconnexion</a></li>
                    <?php } ?>
                </ul>
</header> 
    <div id="main">

<h1>ADMIN</h1>
<table border="10"  width="100%">
  <thead>
  <tr>
    <th> id </th>
    <th> login </th>
    <th> Prénom </th>
    <th> Nom</th>
    <th> Password</th>
  </tr>
  </thead>
<?php 
  foreach ($query as $key => $value)
  { 
        echo "<tr>";
        echo "<td><center>" . $value['id'] . "</center></td>";
        echo "<td><center>" . $value['login'] . "</center></td>";
        echo "<td><center>" . $value['prenom'] . "</center></td>";
        echo "<td><center>" . $value['nom'] . "</center></td>";
        echo "<td><center>" . $value['password'] . "</center></td>";
        echo "</tr>";
  }
?>
</table>
</div>
<?php include("footer.php") ?>

