<?php
require("./connexion-bdd.php");
if (isset($_POST['continentSelected'])) {
    $continent = $_POST['continentSelected'];
    $sql_con = "select idcon FROM continent where (nomcon = '".$continent."');";
    $result_con = mysqli_query($con, $sql_con);
    $id_con = mysqli_fetch_row($result_con)[0];
    // get list of countries now that are in continent of id_con 
    $sql_pays = "select nompay, idpay FROM pays where (idcon = '".$id_con."');";
    $result_pays = mysqli_query($con, $sql_pays);
    $list_pays = $result_pays->fetch_all(MYSQLI_ASSOC);
    echo "  <label class=\"required\" for=\"pays\">PAYS</label>
     <select id=\"pays\" name=\"pays\" placeholder=\"Choisir un pays\" required>
    <option  disabled selected value> -- select an option -- </option>";
    foreach ($list_pays as $pays) {
       echo" <option value=\"".$pays['idpay']."\">".$pays['nompay']."</option> ";
    }
    echo "<select> ";
}

?>