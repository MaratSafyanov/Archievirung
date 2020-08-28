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
    <div class="row">
        <div class="col-sm-3"></div>

        <div class="col-sm-6">
            <br>
            <br>
            <form method="post" action="ordner_anlegen.php">
                <div class="row">
                    <div class="form-group col-md-6 mb-3">
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

                    <div class="form-group col-md-6 mb-3">
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


                </div>


                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                           value="option1" onclick="datumChecked()" checked>
                    <label class="form-check-label" for="inlineRadio1">Ablaufsdatum auswählen</label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                           value="option2" onclick="datumChecked()">
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

                <div class="form-group">
                    <input class="form-control" type="text" placeholder="Titel" name="titel" required>
                </div>
                <div class="mb-3">
                    <textarea class="form-control" placeholder="Inhalt" name="inhalt" required=""></textarea>
                </div>

                <input type="hidden" id="qrCodeText" name="ordnerqrcode">
                <br>

                <button type="button" class="btn btn-outline-success" onclick="generateQrCodeForOrdner()"
                        data-toggle="modal" data-target="#editModal">Generate QR
                </button>

                &nbsp;<hr>
                <input type="submit" name="saveBox" class="btn btn-outline-success">

            </form>
            <br>

            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
                 aria-hidden="true">

                <div class="modal-dialog" role="img">
                    <!--<form method="post" action="xx">-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title" id="" style="font-size: 7em"></h1>
                        </div>
                        <div class="modal-body" id="qrcode">

                        </div>

                    </div>
                </div>
                <!--</form>-->
            </div>
        </div>







        </div>
        <div class="col-sm-3"></div>
    </div>
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

            width: 400,
            height: 400,
            colorDark: "#000000",
            colorLight: "#ffffff",
            correctLevel: QRCode.CorrectLevel.H

        });
        qrcode.makeCode(makeid(12))
    }


</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>
</html>