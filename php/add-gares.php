<?php
if (isset($_POST['gares'])) {
    echo "<select name=\"gares_select\" id = \"selectNow2\" style=\"margin-right:20px;\">";
    foreach ($_POST['gares'] as $gare) {
        echo " <option value=\"" . $gare . "\">" . $gare . "</option>";
    }
    echo "</select>
              <input type = \"button\" onclick = \"remove()\" value = \"X\" class=\"buttons\" >
               ";
}

?>
<script>
    function remove() {
        var x = document.getElementById("selectNow2");
        x.remove(x.selectedIndex);
    }
</script>