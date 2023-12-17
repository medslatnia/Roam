<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ROAM | ACCUEIL</title>
    <link rel="stylesheet" href="../css/MIPROJETCSS.css">

    <link rel="icon" href="../image/projet4.png">
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

    <section id="home">
        <h2>Welcome to Roam</h2>
        <h4>Let's explore the world</h4>
        <p></p>
        <p></p>
        <div class="find_trip">

            <form method="post">
                <div>
                    <label>CONTINENT</label>
                    <input name="continent" type="text" placeholder="Entrez un continent">
                </div>
                <div>
                    <label>PAYS</label>
                    <input name="country" type="text" placeholder="Entrez un Pays">
                </div>
                <div>
                    <label>VILLE</label>
                    <input name="city" type="text" placeholder="Entrez une ville">
                </div>

                <div>
                    <label>SITE</label>
                    <input name="site" type="text" placeholder="Entrez une site">
                </div>

                <input class="btn-reservation" type="submit" name="submitButton" value="Rechercher" />

            </form>


        </div>
    </section>
    <?php

    require('./connexion-bdd.php');

    if (isset($_POST['submitButton'])) {

        // get data of inputs from search form
        $continent = $_POST['continent'];
        $country = $_POST['country'];
        $city = $_POST['city'];
        $site = $_POST['site'];

        // check if inputs are empty replace them with blank "" else error in database
        if ($continent == null)  $continent = "";
        if ($country == null) $country = "";
        if ($city == null)  $city = "";
        if ($site == null) $site = "";

        // select query to search cities
        $sql = "select sub1.idvil,sub1.nomvil, sub1.nompay 
                    from
                    (
                        select sub2.idvil,sub2.nomvil, sub2.nompay, sub2.nomsit
                        from
                        (
                            select sub3.idvil,sub3.nomvil, sub3.nompay, sub3.nomsit
                            from
                            (
                                -- returns sites with their ville, pays and continent
                                select V.idvil, V.nomvil, P.nompay, S.nomsit
                                from ville V
                                inner join Pays P on V.idpay = P.idpay
                                inner join Continent C on P.idcon = C.idcon
                                inner join Site S on V.idvil = S.idvil
                                where C.nomcon like '" . $continent . "%'
                            ) as sub3
                            where sub3.nompay like '" . $country . "%'
                
                        ) as sub2
                        where sub2.nomvil like '" . $city . "%'
                
                    ) as sub1
                    where sub1.nomsit like '" . $site . "%'";

        $result = mysqli_query($con, $sql);

        $rows = $result->fetch_all(MYSQLI_ASSOC);
        if (isset($rows) && sizeof($rows) > 0) {
            echo "
            <div class=\"search-block-padding\">
                <div class=\"search-result-block\">
                    <h2 class=\"search-result\">Résultat de la recherche :</h2>
                    <ul>";
            foreach ($rows as $row) {
                echo
                "<li style=\"margin-bottom: 10px;\">
                            <a class=\"link\" href=\"details-ville.php?id=" . $row['idvil'] . "\">" . $row['nomvil'] . " (" . $row['nompay'] . ")</a>
                        </li> 
                ";
            }
            echo " </ul>
            </div>
        </div>";
        }
    }
    ?>
    <section>
        <div>
            <center><a href="formulaire.php" class="btn-reservation">ajouter une ville</a></center>
        </div>

    </section>


    <!-- section destination -->
    <section id="popular-destination">
        <h1 class="title">destinations populaires</h1>
        <div class="content">
            <!-- box -->
            <div class="box">
                <img src="../image/paris.jpg" alt="">
                <div class="content">
                    <div>
                        <h4>Paris</h4>
                        <p></p>
                        <p></p>
                        <a href="details-ville.php?id=9">Lire Plus</a>
                    </div>
                </div>
            </div>
            <!-- box -->
            <div class="box">
                <img src="../image/egypte.jpg" alt="">
                <div class="content">
                    <div>
                        <h4>Caire</h4>
                        <p></p>
                        <p></p>
                        <a href="details-ville.php?id=11">Lire Plus</a>
                    </div>
                </div>
            </div>
            <!-- box -->
            <div class="box">
                <img src="../image/london.jpg" alt="">
                <div class="content">
                    <div>
                        <h4>Londres</h4>
                        <p></p>
                        <p></p>
                        <a href="details-ville.php?id=12">Lire Plus</a>
                    </div>
                </div>
            </div>
            <!-- box -->
            <div class="box">
                <img src="../image/los.jpg" alt="">
                <div class="content">
                    <div>
                        <h4>Los Angeles</h4>
                        <p></p>
                        <p></p>
                        <a href="details-ville.php?id=13">Lire Plus</a>
                    </div>
                </div>
            </div>
            <!-- box -->
            <div class="box">
                <img src="../image/roma.jpg" alt="">
                <div class="content">
                    <div>
                        <h4>Rome</h4>
                        <p></p>
                        <p></p>
                        <a href="details-ville.php?id=14">Lire Plus</a>
                    </div>
                </div>
            </div>
            <!-- box -->
            <div class="box">
                <img src="../image/tokyo.jpg" alt="">
                <div class="content">
                    <div>
                        <h4>Tokyo</h4>
                        <p></p>
                        <p></p>
                        <a href="details-ville.php?id=15">Lire Plus</a>
                    </div>
                </div>
            </div>
            <!-- box -->
        </div>
    </section>
</body>

</html>