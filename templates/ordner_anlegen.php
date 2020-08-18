<?php
include "../src/OrdnerBox.php";

$ordnerBox = new OrdnerBox();

if (isset($_POST ['saveBox'])) {
    $abteilung = $_POST['abteilung'];
    $titel = $_POST['titel'];
    $inhalt = $_POST['inhalt'];
    $ablaufsdatum = $_POST['ablaufsdatum'];
    $datum = date('Y-m-d', strtotime($ablaufsdatum));
    $qrcodetext = $_POST['ordnerqrcode'];

    $ordnerBox->addNewOrdnerBox($titel, $inhalt, $datum, $qrcodetext, $abteilung, null);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script type="application/javascript" src="../js/qrcode.js"></script>

</head>
<body>

<div class="container">
    <div class="row">

        <ul class="nav nav-pills ">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarOrdnerContainerAnlegen" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Ordner / Container anlegen
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarOrdnerContainerAnlegen">
                    <a class="dropdown-item" href="#">Ordner anlegen</a>
                    <a class="dropdown-item" href="#">Container anlegen</a>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">Ordner Archivieren</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Container suchen</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Ordner suchen</a>
            </li>
        </ul>
    </div>
    <br>
    <br>
    <form method="post" action="ordner_anlegen.php">
        <div class="form-group">
            <label for="abteilung_select">Abteilung auswählen</label>
            <select class="custom-select" id="abteilung_select" name="abteilung">
                <option selected>Choose...</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>

        </div>

        <div class="form-group">
            <label for="ablaufdatum_select">Ablaufdatum auswählen</label>
            <select class="form-control" id="ablaufdatum_select" name="ablaufsdatum">
                <option value="2 years">2 Jahre</option>
                <option value="5 years">5 Jahre</option>
                <option value="10 years">10 Jahre</option>
                <option value="15 years">15 Jahre</option>
                <option value="2 weeks">2 Wochen</option>
            </select>
        </div>

        <div class="form-group">
            <input class="form-control" type="text" placeholder="Titel" name="titel">
        </div>
        <div class="form-group">
            <input class="form-control" type="text" placeholder="Inhalt" name="inhalt">
        </div>
        <br>
        <input type="text" id="qrCodeText" name="ordnerqrcode">
        <button type="button" class="btn btn-outline-success" onclick="makeid(10) ; generateQrCodeForBigBox() ">Generate
            QR
        </button>
        <br>
        &nbsp;
        <input type="submit" name="saveBox" class="btn btn-outline-success">
        <div id="qrcode"></div>

    </form>
</div>


<script>


    function makeid(length) {
        var result = '';
        var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        var charactersLength = characters.length;
        for (var i = 0; i < length; i++) {
            result += characters.charAt(Math.floor(Math.random() * charactersLength));
        }
        document.getElementById("qrCodeText").value = result

    }

    var text = makeid(10)

    function generateQrCodeForBigBox() {
        document.getElementById("qrcode").innerHTML = ""
        new QRCode(document.getElementById("qrcode"), {
            text: text,
            width: 128,
            height: 128,
            colorDark: "#000000",
            colorLight: "#ffffff",
            correctLevel: QRCode.CorrectLevel.H

        });
    }


</script>
</body>
</html>