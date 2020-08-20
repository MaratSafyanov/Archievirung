<?php
include "../src/OrdnerBox.php";
include "../src/Abteilung.php";

$ordnerBox = new OrdnerBox();
$abteilung = new Abteilung();

if (isset($_POST ['saveBox'])) {
    $abteilung = $_POST['abteilung'];
    $titel = $_POST['titel'];
    $inhalt = $_POST['inhalt'];
    $ablaufsdatum = $_POST['ablaufsdatum'];
    $datum = date('Y-m-d', strtotime($ablaufsdatum));
    $qrcodetext = $_POST['ordnerqrcode'];

    $ordnerBox->addNewOrdnerBox($titel, $inhalt, $datum, $qrcodetext, $abteilung, null);
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

        <div class="form-group">
            <label for="ablaufdatum_select">Ablaufdatum auswählen</label>
            <select class="form-control" id="ablaufdatum_select" name="ablaufsdatum">
                <option value="2 years">2 Jahre</option>
                <option value="5 years">5 Jahre</option>
                <option value="10 years">10 Jahre</option>
                <option value="15 years">15 Jahre</option>
                <option value="2 weeks">2 Wochen</option>
            </select>
        </div>

        <div class="form-group">
            <input class="form-control" type="text" placeholder="Titel" name="titel" required>
        </div>
        <div class="form-group">
            <input class="form-control" type="text" placeholder="Inhalt" name="inhalt" required>
        </div>
        <div class="form-group">
            <input class="form-control" type="text" placeholder="Inhalt" name="inhalt" required>
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