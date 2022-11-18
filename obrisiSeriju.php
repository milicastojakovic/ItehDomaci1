<?php
require "dbb.php";
require "models/Serija.php";

session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

$poruka = "";

if(isset($_POST['obrisiBtn'])){
    $serija = trim($_POST['serijeCombo']);

    if(Serija::delete($serija, $con)){
        header("Location: pocetna.php");
    }else{
        $poruka = "Serija nije obrisana!";
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
            <div class="text-center mx-auto mb-5 wow fadeInUp" style="max-width: 600px;">
            <h3 id="por"><?= $poruka; ?></h3>
            </div>
            <div class="row">
                <form method="post" action="" style="margin-top: 75px;">
                    <label for="serijeCombo">Serija</label>
                    <select id="serijeCombo" name="serijeCombo" class="form-control"> 
                    </select>
                    <br>
                    <button class="BtnForm" type="submit" name="obrisiBtn">Obriši seriju</button>
                    <br><br>
                    <a href="pocetna.php", class="BtnForm">Nazad</a>

                </form>
            </div>
            <div style="height: 200px"></div>

        </div>
    </div>
  
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    
    <script>
    function popuniSerije() {
            $.ajax({
                url: 'popuniSerije.php',
                success: function (data) {
                   $("#serijeCombo").html(data);
                }
            });
        }
        popuniSerije();

    </script>


</body>

</html>