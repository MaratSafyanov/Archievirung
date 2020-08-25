<?php
include "../src/OrdnerBox.php";
include "../src/GitterBox.php";


if (isset($_POST['ordnerMappen'])) {

    $ordnerQrCode = $_POST['ordnerBoxQrCode'];
    $box = (new OrdnerBox)->findOrdner($ordnerQrCode);
    $resultOrdner = $box->fetch_assoc();

    $gitterBoxName = $_POST['gitterBoxQrCode'];
    $gitterBox = (new GitterBox)->findGitterBox($gitterBoxName);
    $resultGitterBox = $gitterBox->fetch_assoc();


    $box = (new OrdnerBox)->ordnerZuordnen($resultGitterBox['id'], $resultOrdner['id']);
} else if (isset($_POST['ordnerEntmappen'])) {
    $ordnerQrCode = $_POST['ordnerBoxQrCode'];
    $box = (new OrdnerBox)->findOrdner($ordnerQrCode);
    $resultOrdner = $box->fetch_assoc();

    $gitterBoxName = $_POST['gitterBoxQrCode'];
    $gitterBox = (new GitterBox)->findGitterBox($gitterBoxName);
    //$resultGitterBox = $gitterBox->fetch_assoc();

    $box = (new OrdnerBox)->ordnerTrennen($resultOrdner['id']);

}

?>

<?php include $_SERVER['DOCUMENT_ROOT'] . "/templates/includes/header.php"; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/templates/includes/navbar.php"; ?>

<div class="container">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <br>
            <form action="ordner_archivieren.php" method="post">

                <div class="form-group">
                    <label for="ordnerId">Ordner Box</label>
                    <input type="text" id="ordnerId" name="ordnerBoxQrCode" class="form-control">
                </div>
                <div class="form-group">
                    <label for="containerId">Gitter Box</label>
                    <input type="text" id="containerId" name="gitterBoxQrCode" class="form-control">
                </div>
                <div class="btn-toolbar">
                    <div class="btn-group mr-auto">
                        <input type="submit" name="ordnerMappen" value="Verbinden" class="btn btn-outline-success"
                               onclick="fadeAlert()">
                    </div>
                    <div class="btn-group">
                        <input type="submit" name="ordnerEntmappen" value="Trennen" class="btn btn-outline-success">
                    </div>
                </div>

            </form>
            <br>
            <hr>

            <div role="alert" id="alertId">

            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
</div>
<script>

    function fadeAlert() {
        var alert = document.getElementById("alertId");
        alert.classList.add('.d-block', 'alert', 'alert-success')
        alert.innerHTML += "A simple success alert with an example link";
    }

</script>

</body>
</html>