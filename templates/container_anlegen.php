<?php
include "../src/GitterBox.php";
 $gitterBox = new GitterBox();
if(isset($_POST ['saveContainer'])){
    $name = $_POST['container_name'];

    $gitterBox->addNewGitterBox($name);
}

?>

    <?php include $_SERVER['DOCUMENT_ROOT']."/templates/includes/header.php"; ?>
    <?php include $_SERVER['DOCUMENT_ROOT']."/templates/includes/navbar.php"; ?>

    <div class="container">
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