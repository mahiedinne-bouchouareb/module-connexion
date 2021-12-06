<?php 
session_start();
$db = mysqli_connect("localhost:3306","mahiedinne", "12345", "mahiedinne-bouchouareb_moduleconnexion");
$requete =mysqli_query ($db ,"SELECT * FROM  utilisateurs ");
$query = mysqli_fetch_all($requete,MYSQLI_ASSOC);

?>

<?php include("header.php") ?>

        <body class="indexBackground">
        
        <?php include("navbar.php") ?>
            <div id="main">

            
                <div id="karateTitre">
                  <h1 >Le karate</h1>
                </div>
               
                <div id="imgKarate">
                    <img src="images/kakato.gif" width="150" height="150">
                </div>
                
        
             
              <div id="article1" class="articles">  
                <h2 classe="h2">Un peu d'histoire</h2>
                <p  classe="para">L'histoire du karaté remonte à l'origine de l'homme sur la terre et au moment où il a dû apprendre à se défendre contre ses ennemis naturels. D'autre part, ses méthodes de combat sont issues de l'observation des animaux ou encore des anciens mouvements de gymnastique corporelle destinés à maintenir la santé.
                Les véritables origines se perdent dans la nuit des temps et se mélange abondamment avec de nombreuses légendes. En remontant à l'antiquité, nous pouvons retracer dans la mythologie grecque l'existence de méthodes similaires au karaté aujourd’hui connu.
                Les premières traces d'une méthode utilisant des coups de poing et de pied apparaissent dès le VIème siècle de notre ère en Chine. Cette preuve de l'existence des arts martiaux date de 770 et 480 avant J.C. dans le livre des chants I-CHIN CHING, décrivant avec abondance la vie de cette époque.
                C'est à un moine bouddhiste venu de l'Inde, BODHIDHARMA, également connu sous le nom de DARUMA TAISHI, que nous devons la mise au point de la méthode appelée SHAOLIN-SZU-KEMPO. Elle avait pour but d'améliorer la santé physique des moines du temple SHAOLIN, tout en leur enseignant une méthode d’autodéfense efficace.
                Cette première forme codifiée de science du combat puise ses racines dans une méthode guerrière de l'Inde appelée VAJRAMUSHTI. En Chine, elle se mêla à la technique locale de poings nommée CH'UAN-FA. Il en résulte une grande variété de techniques mettant surtout l'accent sur l'utilisation des poings telles que le PANGAI-NOON, le KUNG-FU, le PAKUA, le TAI-CHI, le KEMPO, et plus encore.</p>


              </div>
             </div>
        


        
        
             <?php include("footer.php") ?>
