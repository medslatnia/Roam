<?php
if (isset($_POST['aeroports'])) {
    echo "<select name=\"aeroports_select\" id = \"selectNow3\" style=\"margin-right:20px;\">";
    foreach ($_POST['aeroports'] as $aeroport) {
        echo " <option value=\"" . $aeroport . "\">" . $aeroport . "</option>";
    }
    echo "</select>
              <input type = \"button\" onclick = \"remove()\" value = \"X\" class=\"buttons\" >
               ";
}

?>
<script>
    function remove() {
        var x = document.getElementById("selectNow3");
        x.remove(x.selectedIndex);
    }
</script>