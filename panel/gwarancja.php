<?php

require "polaczenie.php";

$sql = "select idGwarancja, concat(cast(DlugoscGwarancji as char(5)), ' Lat/a - ', MiejsceGwarancji) as wartosc from gwarancja";
$gwarancja = mysqli_query($polaczenie, $sql);

echo "<select name='gwarancja'><option selected disabled>Wybierz rodzaj gwarancji..</option>";
while($gwarancje = mysqli_fetch_assoc($gwarancja)){
echo "<option value=".$gwarancje['idGwarancja'].">".$gwarancje['wartosc']."</option>
";
}
echo "</select>";
?>