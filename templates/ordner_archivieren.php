<?php
include "../src/OrdnerBox.php";
include "../src/GitterBox.php";
include "../src/Dokument.php";

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
                    <input type="text" id="ordnerId" name="ordnerBoxQrCode" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="containerId">Gitter Box</label>
                    <input type="text" id="containerId" name="gitterBoxQrCode" class="form-control" required>
                </div>
                <div class="btn-toolbar">
                    <div class="btn-group mr-auto">
                        <input type="submit" name="ordnerMappen" value="Verbinden" class="btn btn-outline-success">
                    </div>
                    <div class="btn-group">
                        <input type="submit" name="ordnerEntmappen" value="Trennen" class="btn btn-outline-success">
                    </div>
                </div>

            </form>
            <hr>
            <?php
            $message = null;
            if (isset($_POST['ordnerMappen'])) {

                $ordnerQrCode = $_POST['ordnerBoxQrCode'];
                $box = (new OrdnerBox)->findOrdner($ordnerQrCode);
                $resultOrdner = $box->fetch_assoc();

                $gitterBoxName = $_POST['gitterBoxQrCode'];
                $gitterBox = (new GitterBox)->findGitterBox($gitterBoxName);
                $resultGitterBox = $gitterBox->fetch_assoc();
                $message = '<div class="alert alert-success alert-dismissible fade show"> Erfolgreich! Ordnerbox mit QRCode <strong>' . $resultOrdner['ordnerqrcode'] .
                                    '</strong> liegt in <strong>' .$resultGitterBox['name'] . '</strong></div>';


                $box = (new OrdnerBox)->ordnerZuordnen($resultGitterBox['id'], $resultOrdner['id']);
            } else if (isset($_POST['ordnerEntmappen'])) {

                $ordnerQrCode = $_POST['ordnerBoxQrCode'];
                $box = (new OrdnerBox)->findOrdner($ordnerQrCode);
                $resultOrdner = $box->fetch_assoc();
                $ablaufsdatum = $resultOrdner['ablaufsdatum'];

                $gitterBoxName = $_POST['gitterBoxQrCode'];
                $gitterBox = (new GitterBox)->findGitterBox($gitterBoxName);
                $resultGitterBox = $gitterBox->fetch_assoc();

                if($ablaufsdatum < date("Y-m-d")) {
                    (new OrdnerBox)->moveOldOrdnerInAnotherTableAfterEntmappenIfDateExpired($resultOrdner['id']);
                }

                $box = (new OrdnerBox)->ordnerTrennen($resultOrdner['id']);
                $message = '<div class="alert alert-info">Ordnerbox mit QRCode <strong>' . $resultOrdner['ordnerqrcode'] .
                                    '</strong> liegt <strong>nicht</strong> mehr in <strong>' . $resultGitterBox['name'] . '</strong></div>';
            }

            ?>

            <div role="alert" id="alertId">
                <?php echo $message ?>
            </div>


        </div>
        <?php ?>
        <div class="col-sm-3"></div>
    </div>
</div>
<script>


</script>

</body>
</html>