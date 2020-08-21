<?php
include "../src/OrdnerBox.php";
include "../src/Abteilung.php";
include "../src/Dokument.php";

$ordnerBox = new OrdnerBox();
$abteilung = new Abteilung();
$dokument = new Dokument();

if (isset($_POST ['saveBox'])) {
    $abteilung = $_POST['abteilung'];
    $titel = $_POST['titel'];
    $inhalt = $_POST['inhalt'];

    $ablaufsdatum = $_POST['ablaufsdatum'];
    $datum = date('Y-m-d', strtotime($ablaufsdatum));
    $qrcodetext = $_POST['ordnerqrcode'];
    $docName = $_POST['dokument'];
    $dokumentResult = $dokument->findIdDokumentByName($docName);
    $dokument_id = $dokumentResult->fetch_array(MYSQLI_NUM)[0];
    $ordnerBox->addNewOrdnerBox($titel, $inhalt, $datum, $qrcodetext, $abteilung, null, $dokument_id);
}

?>

<?php include $_SERVER['DOCUMENT_ROOT'] . "/templates/includes/header.php"; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/templates/includes/navbar.php"; ?>


<div class="container">


    <br>
    <br>
    <form method="post" action="ordner_anlegen.php">
        <div class="form-group">
            <label for="abteilung_select">Abteilung auswählen</label>
            <select class="custom-select" id="abteilung_select" name="abteilung">
                <?php
                $abteilungen = $abteilung->getAllAbteilungen();
                while ($row = mysqli_fetch_assoc($abteilungen)) {
                    $abt = $row['abteilung'];

                    echo "<option value=" . $abt . ">" . $abt . "</option>";
                }
                ?>
            </select>

        </div>


        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" onclick="datumChecked()" checked>
            <label class="form-check-label" for="inlineRadio1">Ablaufsdatum auswählen</label>
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2" onclick="datumChecked()">
            <label class="form-check-label" for="inlineRadio2">Ablaufsdatum manuell</label>
        </div>
        <br>

        <div class="form-row">

            <div class="col-md-6 mb-3">

                <select class="form-control" id="ablaufdatum_select" name="ablaufsdatum">
                    <option value=""></option>
                    <option value="2 years">2 Jahre</option>
                    <option value="5 years">5 Jahre</option>
                    <option value="10 years">10 Jahre</option>
                    <option value="15 years">15 Jahre</option>
                    <option value="2 weeks">2 Wochen</option>
                </select>
            </div>


            <div class="col-md-6 mb-3">

                <input type="date" name="ablaufsdatum" class="form-control" id="ablaufdatumManuell" disabled>
            </div>
        </div>
        <br>

        <div class="form-group">
            <input class="form-control" type="text" placeholder="Titel" name="titel" required>
        </div>
        <div class="mb-3">
            <textarea class="form-control is-invalid" placeholder="Inhalt" name="inhalt" required=""></textarea>
        </div>
        <div class="form-group">
            <label for="document_select">Dokument auswählen</label>
            <select class="custom-select" id="abteilung_select" name="dokument">
                <?php
                $docs = $dokument->getAllDokuments();
                while ($row = mysqli_fetch_assoc($docs)) {
                    $docType = $row['dokument'];

                    echo "<option value=" . $docType . ">" . $docType . "</option>";
                }
                ?>
            </select>
        </div>
        <br>
        <input type="text" id="qrCodeText" name="ordnerqrcode">
        <button type="button" class="btn btn-outline-success" onclick="generateQrCodeForOrdner()">Generate
            QR
        </button>
        <br>
        &nbsp;
        <input type="submit" name="saveBox" class="btn btn-outline-success">
        <div id="qrcode"></div>

    </form>

</div>

<script>

    function datumChecked() {

        if (document.getElementById("inlineRadio1").checked) {
            document.getElementById("ablaufdatumManuell").disabled = true;
            document.getElementById("ablaufdatum_select").disabled = false;


        } else if (document.getElementById("inlineRadio2").checked) {
            document.getElementById("ablaufdatum_select").disabled = true;
            document.getElementById("ablaufdatumManuell").disabled = false;
        }
    }


    function makeid(length) {
        var result = '';
        var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        var charactersLength = characters.length;
        for (var i = 0; i < length; i++) {
            result += characters.charAt(Math.floor(Math.random() * charactersLength));
        }
        document.getElementById("qrCodeText").value = result
        return result

    }


    function generateQrCodeForOrdner() {

        document.getElementById("qrcode").innerHTML = ""
        var qrcode = new QRCode(document.getElementById("qrcode"), {

            width: 128,
            height: 128,
            colorDark: "#000000",
            colorLight: "#ffffff",
            correctLevel: QRCode.CorrectLevel.H

        });
        qrcode.makeCode(makeid(10))
    }


</script>
</body>
</html>