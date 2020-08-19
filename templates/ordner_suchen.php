<?php

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

    <form action="ordner_info.php" method="post">

        <div class="form-group">
            <label for="qrCodeTextId">Suchen nach QR Code</label>
            <input type="text" name="qrCodeText" placeholder="QR Code Text" id="qrCodeTextId">

        </div>
        <div class="form-group">
            <label for="ordnerTitel">Suchen nach Titel</label>
            <input type="text" name="titelText" placeholder="Titel" id="ordnerTitel">
        </div>

        <input type="submit" name="ordnerSuchen" class="btn btn-outline-success">


    </form>
    <br>
    <br>




</div>
