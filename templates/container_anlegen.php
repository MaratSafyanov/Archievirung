<?php
session_start();

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
                <button type="button" class="btn btn-outline-success" onclick="generateQrCodeForBigBox()"
                        data-toggle="modal" data-target="#editModal">Generate QR
                </button>
                <hr>
                <br>
                <input type="submit" name="saveContainer" class="btn btn-outline-success">
            </form>

            <br>

            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <!--<form method="post" action="xx">-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title" id="editModalLabel" style="font-size: 7em"></h1>
                            </div>
                            <div class="modal-body" id="containerQrCode">

                            </div>

                        </div>
                </div>
                <!--</form>-->
            </div>
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
            width: 400,
            height: 400,
            colorDark: "#000000",
            colorLight: "#ffffff",
            correctLevel: QRCode.CorrectLevel.H

        });
        document.getElementById("editModalLabel").innerHTML = document.getElementById("container_name").value;

    }

</script>


<script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>


</body>
</html>