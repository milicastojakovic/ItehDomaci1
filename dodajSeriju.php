<?php
require "dbb.php";
require "models/Serija.php";

session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

$poruka = "";

if(isset($_POST['dodajBtn'])){

    $naziv = trim($_POST['naziv']);
    $brojEp = trim($_POST['brojEp']);
    $brojOdg = trim($_POST['brojOdg']);
    $zanr = trim($_POST['zanroviCombo']);
    $jezik = trim($_POST['jeziciCombo']);


    if(Serija::add($naziv, $brojEp, $brojOdg, $zanr, $jezik, $con)){
        header("Location: pocetna.php");
    }else{
        $poruka = "Serija nije sačuvana";
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Arhiva serija</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&family=Teko:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

    <div id="header"></div>
    <div id="header2"></div>

    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5" style="max-width: 600px;">
                <h3 id="por"><?= $poruka; ?></h3>
            </div>
            <div class="row">
                <form method="post" action="">
                    <label for="naziv">Naziv</label>
                    <input type="text" id="naziv" name="naziv" class="form-control">
                    <label for="brojEp">Broj epizoda</label>
                    <input type="number" id="brojEp" name="brojEp" class="form-control">
                    </select>
                    <label for="brojOdg">Broj odgledanih epizoda</label>
                    <input type="number" id="brojOdg" name="brojOdg" class="form-control">
                    </select>
                    <label for="zanroviCombo">Zanr</label>
                    <select id="zanroviCombo" name="zanroviCombo" class="form-control">
                    </select>
                    <label for="jeziciCombo">Jezik</label>
                    <select id="jeziciCombo" name="jeziciCombo" class="form-control">
                    </select>
                    <br>
                    <button class="BtnForm" type="submit" name="dodajBtn" >Dodaj seriju</button>
                    <br><br>
                    <a href="pocetna.php", class="BtnForm">Nazad</a>

                </form>
            </div>
            <div style="height: 40px"></div>
            <br/>
            <br/>

        </div>
    </div>

    <div id="footer"></div>
 
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <script>
        function popuniZanrove() {

            $.ajax({
                url: 'popuniZanrove.php',
                success: function (data) {
                   $("#zanroviCombo").html(data);
                }
            });
        }
        popuniZanrove();
 
        function popuniJezike() {

            $.ajax({
                url: 'popuniJezike.php',
                success: function (data) {
                $("#jeziciCombo").html(data);
                }
            });
        }
        popuniJezike();

    </script>

</body>

</html>