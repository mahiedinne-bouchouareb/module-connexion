<header>
                <ul>
                    <li><a href="https://www.sepai-dojo.fr/karate-adulte-2/">Karate adulte</a></li>
                    <li><a href="http://sportingkaratemarseille.fr/sporting-karate-marseille-club-de-karate-marseille-enfant-et-adulte-2/">Karate enfant</a></li>
                    <li><a href="http://www.sainteskarateclub.com/non-categorise/galerie-photos.html">Galerie photos</a></li>
                    <li><a href="profil.php">Profil</a></li>
                    
                    <?php 
                        if (!isset($_SESSION['login'])) { 
                    ?>
                    <li><a href="inscription.php">Inscription</a></li>
                    <li><a href="connexion.php">Connexion</a></li>
                    <?php } 
                    ?>

                    <?php if (isset($_SESSION['login'])) { ?>
                    <li><a href="connexion.php">Déconnexion</a></li>
                    <?php } ?>
                </ul>
            </header> 