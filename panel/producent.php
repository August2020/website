<?php

require "polaczenie.php";

$sql = "select * from producent";
$producent = mysqli_query($polaczenie, $sql);

echo "<select name='producent'><option selected disabled>Wybierz producenta..</option>";
while($producenci = mysqli_fetch_assoc($producent)){
echo "<option value=".$producenci['idProducent'].">".$producenci['Nazwa']."</option>
";
}
echo "</select>";
?>