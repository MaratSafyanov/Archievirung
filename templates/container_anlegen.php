<?php
include "../src/GitterBox.php";
 $gitterBox = new GitterBox();
if(isset($_POST ['saveContainer'])){
    $name = $_POST['container_name'];

    $gitterBox->addNewGitterBox($name);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script type="application/javascript" src="/js/qrcode.js"></script>

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
    <form method="post" action="container_anlegen.php">
        <div class="form-group">
            <input class="form-control" type="text" placeholder="Container Name" name="container_name" id="container_name">
        </div>

        <br>
        &nbsp
        <input type="submit" name="saveContainer" class="btn btn-outline-success">


    </form>
    <br>
    <button type="button" class="btn btn-outline-success" onclick="generateQrCodeForBigBox() ">Generate  QR
    </button>
    <div id="containerQrCode"></div>
</div>

<script>
    function generateQrCodeForBigBox() {
        document.getElementById("containerQrCode").innerHTML = ""
        new QRCode(document.getElementById("containerQrCode"), {
            text: document.getElementById("container_name").value,
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