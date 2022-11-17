<?php

require "dbb.php";
require "models/Korisnik.php";

$poruka="";

 session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
} 

if (isset($_COOKIE["korisnik"])){
    $poruka="by " . $_COOKIE["korisnik"];
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
    
    <div class="container-xxl py-5">
        <div>
            <center><h2 id="naslov">Moja arhiva</h2>
            <div id="overline">
            <h3 id="poruka"><?= $poruka; ?></h3></center>
            </div>
            <br/><br>
            <center>
            <a href="dodajSeriju.php", class="BtnForm">Dodaj novu seriju</a>
            <a href="izmeniSeriju.php", class="BtnForm">Izmeni broj odgledanih epizoda</a>
            <a href="obrisiSeriju.php", class="BtnForm">Obrisi seriju</a>
            </center>
            <br><br>
            <div class="row" id="rowc">
                <div class="col-md-5">
                <label for="zanroviCombo">Zanr</label>
                    <select class="form-control" id="zanroviCombo" onchange="pretrazi()">
                    </select>
                </div>
                <div class="col-md-5">
                <label for="sortiranjeCombo">Sortiranje po broju epizoda</label>
                <select class="form-control" id="sortiranjeCombo" onchange="pretrazi()">
                    <option value="asc">Rastuće</option>
                    <option value="desc">Opadajuće</option>
                    </select>
                </div>
            </div>
        </div>
        <br><br><br>
                <div id="serije" ></div>
        

        </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <script>

        function popuniZanrove() {
            $.ajax({
                url: 'popuniZanrove.php',
                success: function (data) {
                    let dataP = "<option value='0'>Svi</option>" + data;
                    $("#zanroviCombo").html(dataP);
                }
            });
        }
        popuniZanrove();

        function pocetnoStanje() {
            let zanr = '0';
            let sortiranje = 'asc';
            $.ajax({
                url: "pretraga.php",
                data: {
                    zanr: zanr,
                    sortiranje: sortiranje
                },
                success: function (podaci) {
                    $("#serije").html(podaci);
                }
            });
        }
        pocetnoStanje();
        
        function pretrazi() {
            let zanr = $("#zanroviCombo").val();
            let sortiranje = $("#sortiranjeCombo").val();
            $.ajax({
                url: 'pretraga.php',
                data: {
                    zanr: zanr,
                    sortiranje: sortiranje
                },
                success: function (data) {
                    $("#serije").html(data);
                }
            });
        }

    </script>

</body>
</html>
