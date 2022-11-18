<?php
require "dbb.php";
require "models/Serija.php";

$zanr = trim($_GET['zanr']);
$sortiranje = trim($_GET['sortiranje']);

$array = Serija::select($zanr, $sortiranje, $con);

?>

<table class="table table-hover">
    <thead>
        <tr>
            <th>Naziv</th>
            <th>Zanr</th>
            <th>Jezik</th>
            <th>Epizode</th>
        </tr>
    </thead>
    <tbody>
 <?php

foreach ($array as $serija){
    ?>
    <tr>
        <td><?= $serija->naziv?></td>
        <td><?= $serija->zanr?></td>
        <td><?= $serija->jezik?></td>
        <td><?= $serija->brojOdgledanihEpizoda. "/" . $serija->brojEpizoda ?></td>
    </tr>
<?php
}
?>
    </tbody>
</table>

