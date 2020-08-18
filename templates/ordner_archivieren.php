<?php
include "../src/OrdnerBox.php";
include "../src/GitterBox.php";


if (isset($_POST['ordnerMappen'])){

    $ordnerQrCode = $_POST['ordnerBoxQrCode'];
    $box = (new OrdnerBox)->findOrdner($ordnerQrCode);
    $resultOrdner = $box->fetch_assoc();
    $resultOrdner['id'];

    $gitterBoxName = $_POST['gitterBoxQrCode'];
    $gitterBox = (new GitterBox)->findGitterBox($gitterBoxName);
    $resultGitterBox = $gitterBox->fetch_assoc();
    $resultGitterBox['id'];

    $box = (new OrdnerBox)->ordnerZuordnen( $resultGitterBox['id'], $resultOrdner['id'] );



}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <title>Title</title>
</head>
<body>
<div class="container">
    <div class="row">
        <ul class="nav nav-tabs ">
            <li class="nav-item">
                <a class="nav-link" href="#">Ordner anlegen</a>
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

    <form action="ordner_archivieren.php" method="post">

        <div class="form-group">
            <label for="ordnerId">Ordner Box</label>
            <input type="text" id="ordnerId" name="ordnerBoxQrCode">
        </div>
        <div class="form-group">
            <label for="containerId">Gitter Box</label>
            <input type="text" id="containerId" name="gitterBoxQrCode">
        </div>
        <div class="btn-toolbar">
            <div class="btn-group mr-2">
                <input type="submit" name="ordnerMappen" value="Verbinden" class="btn btn-outline-success">
            </div>
            <div class="btn-group">
                <input type="submit" name="ordnerEntmappen" value="Trennen" class="btn btn-outline-success">
            </div>
        </div>

    </form>


</div>
</body>
</html>