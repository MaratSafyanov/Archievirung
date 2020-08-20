<?php include $_SERVER['DOCUMENT_ROOT'] . "/templates/includes/header.php"; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/templates/includes/navbar.php"; ?>

<div class="container">

    <br>

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
