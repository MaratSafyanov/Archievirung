<?php
include "../src/GitterBox.php";
$gitterBox = new GitterBox();
if (isset($_POST ['saveContainer'])) {
    $name = $_POST['container_name'];

    $gitterBox->addNewGitterBox($name);
}

?>

<?php include $_SERVER['DOCUMENT_ROOT'] . "/templates/includes/header.php"; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/templates/includes/navbar.php"; ?>

<div class="container">
    <br>
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <form method="post" action="container_anlegen.php">

                <div class="form-group">
                    <input class="form-control" type="text" placeholder="Container Name" name="container_name"
                           id="container_name">
                </div>
                <button type="button" class="btn btn-outline-success" onclick="generateQrCodeForBigBox() "
                        data-toggle="modal" data-target="#containerQrCode">Generate QR
                </button>
                <hr>
                <br>
                <input type="submit" name="saveContainer" class="btn btn-outline-success">
            </form>

            <br>

            <div id="containerQrCode" class="modal-dialog modal-dialog-centered">

            </div>


        </div>
    </div>
    <div class="col-sm-3"></div>
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