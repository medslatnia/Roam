<?php
 
if (isset($_POST['sites'])) {
    echo "<select name=\"sites_select\" id = \"selectNow4\" style=\"margin-right:20px;\">";
    $sites = $_POST['sites'];
    foreach ( $sites as $site) {
        echo " <option value=\"" . $site['nomSite'] . "\">" . $site['nomSite'] . "</option>";
    }
    echo "</select>
              <input type = \"button\" onclick = \"remove()\" value = \"X\" class=\"buttons\">
               ";
}

?>
<script>
    function remove() {
        var x = document.getElementById("selectNow4");
        x.remove(x.selectedIndex);
    }
</script>