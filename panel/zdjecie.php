<?php

require "polaczenie.php";

$sql = "select * from zdjecia";
$zdjecie = mysqli_query($polaczenie, $sql);

echo "<select name='zdjecie'><option selected disabled>Wybierz zdjęcie..</option>";
while($zdjecia = mysqli_fetch_assoc($zdjecie)){
echo "<option value=".$zdjecia['idZdjecia'].">".$zdjecia['SciezkaZdjecia']."</option>
";
}
echo "</select>";
?>