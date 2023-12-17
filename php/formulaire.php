<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/formulaire.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/MIPROJETCSS.css">
    <link rel="icon" href="../image/projet4.png">

    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="../js/formulaire.js"></script>
    <title>Roam | Add city</title>


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


    <div class="container">

        <form method="post">
            <div class="form first">
                <div class="details-personal">
                    <span class="title">Formulaire d'ajout d'une ville</span>

                    <div class="fields">
                        <div class="input-field required">
                            <label class="required" for="ville">VILLE</label>
                            <input type="text" name="ville" id="ville" placeholder="Choisir une ville" required>
                        </div>
                        <div class="input-field">
                            <label class="required" for="continent">CONTINENT</label>
                            <select id="continent" name="continent" placeholder="Choisir un continent" onchange="selectContinent();" required>
                                <option disabled selected value> -- select an option -- </option>
                                <option value="Afrique">Afrique</option>
                                <option value="Europe">Europe</option>
                                <option value="Amerique">Amerique</option>
                                <option value="Asie">Asie</option>
                            </select>
                        </div>
                        <div class="input-field" id="list-pays">
                        </div>
                    </div>
                    <div class="fields">
                    <div class="input-description required">
                            <label class="required" for="descriptif">DESCRIPTIF</label>
                            <textarea id="descriptif" name="descriptif" required></textarea>
                        </div>
                    </div>

                </div>
                <div class="input-fields">

                    <div id="sites-list" class="fields">
                        <div class="input-field required">
                            <label for="sites" class="required">SITES</label>
                            <input type="text" id="sites" placeholder="Choisir un site" required>
                        </div>
                        <div class="input-field">
                            <label for="photos">PHOTOS</label>
                            <input type="text" id="photos" name="photos">
                        </div>
                        <div class="input-field">
                            <input type="button" name="ajout_sites" value="Ajouter" onclick="addSite();" class="buttons">
                        </div>
                        <div class="input-field display-necessaire" id="sites_results"> 
                         </div>
                </div>
                <div class="fields">
                    <div class="input-field">
                        <label for="hotels">HOTELS</label>
                        <input type="text" id="hotels" name="hotels">
                    </div>
                    <div class="input-field">
                        <input type="button" name="ajout_hotels" value="Ajouter" onclick="addHotel();" class="buttons" />
                    </div>
                    <div class="input-field display-necessaire" id="hotels_results">
                    </div>
                </div>
                <div class="fields">
                    <div class="input-field">
                        <label for="restos">RESTAURANTS</label>
                        <input type="text" id="restos" placeholder="Choisir un restaurant">
                    </div>
                    <div class="input-field">
                        <input type="button" name="ajout_restos" value="Ajouter" onclick="addResto();" class="buttons">
                    </div>
                    <div id="restos_results" class="input-field display-necessaire">
                    </div>
                </div>
                <div class="fields">
                    <div class="input-field">
                        <label for="gares">GARES</label>
                        <input type="text" id="gares" placeholder="Choisir une gare">
                    </div>
                    <div class="input-field">
                        <input type="button" name="ajout_gares" value="Ajouter" onclick="addGare();" class="buttons">
                    </div>
                    <div id="gares_results" class="input-field display-necessaire">
                    </div>
                </div>
                <div class="fields">
                    <div class="input-field">
                        <label for="aeroports">AEROPORTS</label>
                        <input type="text" id="aeroports" placeholder="Choisir un aéroport">
                    </div>
                    <div class="input-field">
                        <input type="button" name="ajout_aeroports" value="Ajouter" onclick="addAeroport();" class="buttons">
                    </div>
                    <div id="aeroports_results" class="input-field display-necessaire">
                    </div>
                </div>
            <div class="button-wrapper">
                <input type="submit" name="envoyer" value="Ajouter la ville" class="ajouter-button">
                </div>
            </div>

        </form>
        <?php
        mysqli_report((MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT));
        require('./connexion-bdd.php');
        include('./get-countries.php');
        include('./add-sites.php');

        if (isset($_POST['envoyer'])) {
            if (!empty($_POST['ville'])) {
                // get nom ville du formulaire 
                $nom_ville = $_POST['ville'];
                // get id pays
                $id_pays = (int) $_POST['pays'];
                // get description de la ville 
                $description_ville = $_POST['descriptif'];
                // insert ville
                $sql_ville = "insert into ville (nomvil,descvil,idpay) values (\"" . $nom_ville . "\",\"" . $description_ville . "\"," . $id_pays . ");";
                if ($con->query($sql_ville) === TRUE) {
                    // get the new id ville
                    $sql_id_ville = "select idvil FROM ville where (nomvil = '" . $nom_ville . "');";
                    $result_ville = mysqli_query($con, $sql_id_ville);
                    $id_ville = (int) mysqli_fetch_row($result_ville)[0];
                    // get the lists of sites (with photos), hotels, restaurants, gares & aeroports 
                    $list_of_sites =json_decode($_COOKIE['sites_array']);
                    $list_of_hotels =json_decode($_COOKIE['hotels_array']);
                    $list_of_restos =json_decode($_COOKIE['restos_array']);
                    $list_of_gares =json_decode($_COOKIE['gares_array']);
                    $list_of_aeroports =json_decode($_COOKIE['aeroports_array']);
                    // execute query of insert sites, hotels, restaurants, gares & aeroportss
                    if(sizeof($list_of_sites)){
                        foreach($list_of_sites as $site_object){
                        $sql_sites = "insert into site (nomsit,cheminphoto,idvil) values (\"$site_object->nomSite\",\"$site_object->cheminPhotos\",'.$id_ville.');";
                        $con->query($sql_sites);
                         }
                    }
                    if(sizeof($list_of_hotels)){
                        foreach($list_of_hotels as $hotel_object){
                        $sql_hotels = "insert into necessaire (typenec,nomnec,idvil) values (\"hotel\",\"$hotel_object\",'.$id_ville.');";
                        $con->query($sql_hotels) === TRUE;
                        }
                    }
                    if(sizeof($list_of_restos)){
                        foreach($list_of_restos as $resto_object){
                        $sql_restos = "insert into necessaire (typenec,nomnec,idvil) values (\"restaurant\",\"$resto_object\",'.$id_ville.');";
                        $con->query($sql_restos);
                        }
                    }
                    if(sizeof($list_of_gares)){
                        foreach($list_of_gares as $gare_object){
                        $sql_gares = "insert into necessaire (typenec,nomnec,idvil) values (\"gare\",\"$gare_object\",'.$id_ville.');";
                        $con->query($sql_gares);
                        }
                    }
                    if(sizeof($list_of_aeroports)){
                        foreach($list_of_aeroport as $aeroport_object){
                        $sql_aeroports = "insert into necessaire (typenec,nomnec,idvil) values (\"aeroport\",\"$aeroport_object\",'.$id_ville.');";
                        $con->query($sql_aeroports);
                        }
                    }
                     // display alert to inform that ville is inserted
                    echo "<script>
                            if(confirm(\"Ville insérée !\")) {
                                window.location.href = \"MIPROJET.php\";
                            }
                        </script>";
                
                }
            }
        }
        ?>
    </div>
    </div>
</body>

</html>