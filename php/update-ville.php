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

            <?php
                require("./connexion-bdd.php");
                mysqli_report((MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT));
                // get id de la ville from url
                $id_ville = (int) $_GET['id'];

                // get data of ville from bdd
                $sql1 = "select * FROM ville v where (v.idvil = " . $id_ville . ");";
                $result1 = mysqli_query($con, $sql1);
                $ville = mysqli_fetch_row($result1);
                // get nom et description de la ville et initialiser les inputs avec ces donnéess
                $nom_ville = $ville[1];
                $description_ville = $ville[2];

             ?>
    <div class="container">

        <form method="post">
            <div class="form first">
                <div class="details-personal">
                    <span class="title">Formulaire de modification d'une ville</span>

                    <div class="fields">
                        <div class="input-field required">
                            <label class="required" for="ville">VILLE</label>
                            <input type="text" name="ville" id="ville" placeholder="Choisir une ville"  value="<?php echo $nom_ville ? $nom_ville :'';?>"/>
                        </div>
                    </div>
                    <div class="fields">
                    <div class="input-description required">
                            <label class="required" for="descriptif">DESCRIPTIF</label>
                            <textarea id="descriptif" name="descriptif"><?php echo $description_ville ? $description_ville :'';?></textarea>
                        </div>
                    </div>

                </div>
            <div class="button-wrapper">
                <input type="submit" name="envoyer" value="Modifier la ville" class="ajouter-button">
                </div>
            </div>

        </form>
        <?php

        if (isset($_POST['envoyer'])) {
            if (!empty($_POST['ville'])) {
                // get nom ville du formulaire 
                $nom_ville = $_POST['ville'];
                // get description de la ville 
                $description_ville = $_POST['descriptif'];
                // insert ville
                $sql_ville = "update ville set nomvil=\"$nom_ville\", descvil =\"$description_ville\" where idvil=".$id_ville.";";
                if ($con->query($sql_ville) === TRUE) {
                    // get the new id ville
                    
                     // display alert to inform that ville is inserted
                    echo "<script>
                            if(confirm(\"Ville modifiée !\")) {
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