<?php
if (isset($_POST['restos'])) {
    echo "<select name=\"restos_select\" id = \"selectNow1\" style=\"margin-right:20px;\">";
    foreach ($_POST['restos'] as $resto) {
        echo " <option value=\"" . $resto . "\">" . $resto . "</option>";
    }
    echo "</select>
              <input type = \"button\" onclick = \"remove()\" value = \"X\" class=\"buttons\" >
               ";
}

?>
<script>
    function remove() {
        var x = document.getElementById("selectNow1");
        x.remove(x.selectedIndex);
    }
</script>