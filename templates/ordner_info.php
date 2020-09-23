<?php
session_start();
include "../src/OrdnerBox.php";
include "../src/GitterBox.php";
include "../src/Dokument.php";

?>

<?php include $_SERVER['DOCUMENT_ROOT'] . "/templates/includes/header.php"; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/templates/includes/navbar.php"; ?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    //$box = (new OrdnerBox)->getOrdnerById($id);
    $boooox = (new OrdnerBox)->getDokumentAndGitterBoxById($id);


    while ($row = mysqli_fetch_array($boooox)){
        $dok =  $row['dokument'];
        $gitterName =  $row['name'];
        $titel = $row['titel'];
        $inhalt = $row['inhalt'];
        $ablaufsdatum = $row['ablaufsdatum'];
        $qrcode = $row['ordnerqrcode'];


    $img = null;

    if (date("Y-m-d") > $ablaufsdatum) {
        $img="alert-circle.svg";
    } else {
        $img ="check-circle.svg";
    }

    ?>

    <div class="container">


            <div class="col-md-8 order-md-1">
                <br>
                <h4 class="mb-3">Ordner Info   <img src="../bilder/<?php echo $img ?>" ></h4>
                <form class="">
                    <div class="form-group row">
                        <label for="titel" class="col-sm-2 col-form-label">Titel</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control" id="titel" placeholder=""
                                   value="<?php echo $titel ?>">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="inhalt" class="col-sm-2 col-form-label">Inhalt</label>
                        <div class="col-sm-10">
                            <textarea readonly class="form-control" id="inhalt"
                                      placeholder=""><?php echo $inhalt ?></textarea>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="doku" class="col-sm-2 col-form-label">Dokument</label>
                        <div class="col-sm-10">
                            <input readonly class="form-control" id="doku"
                                      placeholder="" value="<?php echo $dok?>" >

                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="ablaufsdatum" class="col-sm-2 col-form-label">Ablaufsdatum</label>
                        <div class="col-sm-10">
                            <input type="date" readonly class="form-control" id="ablaufsdatum" placeholder=""
                                   value="<?php echo $ablaufsdatum ?>">

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="qrcodeInfo" class="col-sm-2 col-form-label">QR Code</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control" id="qrcodeInfo" placeholder=""
                                   value="<?php echo $qrcode ?>">

                        </div>
                    </div>

                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Ok</button>
                </form>
            </div>

    </div>

<?php } } ?>





