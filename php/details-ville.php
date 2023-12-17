<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../image/projet4.png">
    <link href="../css/details-ville.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200&family=Montserrat:wght@100&display=swap" rel="stylesheet">
    <title>Roam | Détails d'une ville</title>
</head>

<body>
<header>
        <div class="logo">
            <img src="../image/projet4.png" alt="Logo Roam" width="30" height="30">
            <a href="MIPROJET.php"> <span>Roam</span>travel</a>
        </div>
        <ul class="menu">
            <li><a href="MIPROJET.php">ACCUEIL</a></li>
            <li><a href="about-us.php">ABOUT US</a></li>
            <li><a href="formulaire.php">AJOUTER</a></li>

        </ul>
    </header>
    <div class="title-container">
        <h1 class="title">Détails de la ville</h1>
    </div>

    <section id="ville">
        <?php
        include('./connexion-bdd.php');
        // Get id from  url
        if (isset($_GET['id'])) {
            $id = (int) $_GET['id'];
            // execute query to get the city selected in the previous page
            $sql1 = "select * FROM ville v where (v.idvil = " . $id . ");";
            $result1 = mysqli_query($con, $sql1);
            // get pays of the city
            $sql2 = "select nompay FROM pays p join ville v on p.idpay = v.idpay where (v.idvil = " . $id . ") limit 1;";
            $result2 = mysqli_query($con, $sql2);
            // get continent of the city
            $sql3 = "select nomcon FROM pays p join ville v on (p.idpay = v.idpay) join continent c on (c.idcon = p.idcon) where (v.idvil = " . $id . ") limit 1;";
            $result3 = mysqli_query($con, $sql3);
            // get sites of the city
            $sql4 = "select nomsit, cheminphoto FROM site where (idvil = " . $id . ");";
            $result4 = mysqli_query($con, $sql4);
            // put query results in $ville, pays, continent and sites
            $ville = mysqli_fetch_row($result1);
            $pays = mysqli_fetch_row($result2);
            $continent = mysqli_fetch_row($result3);

            // here we get an array of sites of a city !
            $sites = $result4->fetch_all(MYSQLI_ASSOC);

            // get information of the city idvil
            $nom_ville = $ville[1];
            $description_ville = $ville[2];
            // get country name
            $country_name = $pays[0];
            // get continent name
            $continent_name = $continent[0];
            echo "<div class=\"container\">
                    <p class=\"texte-details\">Nom de la ville : <strong> " . $nom_ville . "</strong></p>
                    <p class=\"texte-details\">Description : <strong> " . $description_ville . "</strong></p>
                    <p class=\"texte-details\">Pays : <strong> " . $country_name . "</strong></p>
                    <p class=\"texte-details\">Continent : <strong> " . $continent_name . "</strong></p>
                 </div>
                 <div class=\"title-sites\">
                     <h1 class=\"title\">Liste des sites de la ville</h1>
                 </div>  
                 ";
        }
        ?>

        <?php
        foreach ($sites as $site) {
            echo " 
                         <div class=\"container\">
                                <div class=\"list-sites\">
                                    <img  class=\"img-sites\" src=\"" . $site['cheminphoto'] . "\" >
                                    <p class=\"site-name\">" . $site['nomsit'] . "</p>
                                </div> 
                         </div>
                         ";
        }
        ?>

    </section>
    <section class="button-section">
        <div class="buttons-container">
            <form method="post">
                <input class="buttons" type="submit" name="modifier" value="Modifier" />
                <input class="buttons" type="submit" name="supprimer" value="Supprimer" />
            </form>
        </div>
        <?php
        if (isset($_POST['modifier'])) {
            header("Location: update-ville.php?id=$id");
        } else if (isset($_POST['supprimer'])) {
            // if user click on "supprimer", call next query to delete this city from data base
            $sql_del = "delete from ville where (idvil=" . $id . ");";
            if ($con->query($sql_del) === TRUE) {
                header("Location: MIPROJET.php");
            } else {
                echo "Error deleting record: " . $con->error;
            }
        }
        ?>
    </section>
</body>

</html>