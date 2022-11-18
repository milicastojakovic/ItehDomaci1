<?php
require "dbb.php";
require "models/Zanr.php";

$array = Zanr::getAll($con);

foreach ($array as $zanr){
    ?>
    <option value="<?= $zanr->zanrID ?>"><?=$zanr->zanr ?> </option>
    <?php
}
?>