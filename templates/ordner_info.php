<?php
include "../src/OrdnerBox.php";
if (isset($_POST['ordnerSuchen'])) {

    $ordnerQrCode = $_POST['qrCodeText'];
    $box = (new OrdnerBox)->findOrdner($ordnerQrCode);
    $resultOrdner = $box->fetch_assoc();
    $titel = $resultOrdner['titel'];
    $inhalt = $resultOrdner['inhalt'];
    $abteilung = $resultOrdner['abteilung'];
    $ablaufsdatum = $resultOrdner['ablaufsdatum'];



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

    <h3><?php echo $titel  ?></h3>
    <p><?php   echo $inhalt ?></p>
    <h3><?php echo $ablaufsdatum  ?></h3>
    <h3><?php echo $abteilung ?></h3>


</div>

<?php   } ?>





