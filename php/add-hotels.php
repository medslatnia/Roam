<?php
if (isset($_POST['hotels'])) {
    echo "<select name=\"hotels_select\" id = \"selectNow\" style=\"margin-right:20px;\">";
    foreach ($_POST['hotels'] as $hotel) {
        echo " <option value=\"" . $hotel . "\">" . $hotel . "</option>";
    }
    echo "</select>
              <input type = \"button\" onclick = \"remove()\" value = \"X\" class=\"buttons\" >
               ";
}

?>
<script>
    function remove() {
        var x = document.getElementById("selectNow");
        x.remove(x.selectedIndex);
    }
</script>