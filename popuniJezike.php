<?php
require "dbb.php";
require "models/Jezik.php";

$array = Jezik::getAll($con);

foreach ($array as $jezik){

    ?>
    <option value="<?= $jezik->jezikID ?>"><?= $jezik->jezik ?> </option>

<?php
}
?>