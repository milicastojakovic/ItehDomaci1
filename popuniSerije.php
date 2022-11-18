<?php
require "dbb.php";
require "models/Serija.php";

$array = Serija::select("0", "asc", $con);;

foreach ($array as $serija){

    ?>
    <option value="<?= $serija->serijaID ?>"><?= $serija->naziv . " ( " . $serija->brojOdgledanihEpizoda . "/" . $serija->brojEpizoda . " )"?></option>

<?php
}
?>