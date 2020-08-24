<?php
include "../src/OrdnerBox.php";
/*if (isset($_POST['ordnerSuchen'])) {

    $ordnerQrCode = $_POST['qrCodeText'];
    $box = (new OrdnerBox)->findOrdner($ordnerQrCode);
    $resultOrdner = $box->fetch_assoc();
    $titel = $resultOrdner['titel'];
    $inhalt = $resultOrdner['inhalt'];
    $abteilung = $resultOrdner['abteilung'];
    $ablaufsdatum = $resultOrdner['ablaufsdatum'];*/
    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $box = (new OrdnerBox)->getOrdnerById($id);
        $result = $box->fetch_assoc();
        $titel = $result['titel'];

    }

    ?>

    <?php include $_SERVER['DOCUMENT_ROOT'] . "/templates/includes/header.php"; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/templates/includes/navbar.php"; ?>

<?php
if (isset($_GET['id'])){
    $id = $_GET['id'];
    $box = (new OrdnerBox)->getOrdnerById($id);
    $result = $box->fetch_assoc();
    $titel = $result['titel'];
    $inhalt = $result['inhalt'];
    $ablaufsdatum = $result['ablaufsdatum'];




?>

    <div class="container">

        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Ordner Info</h4>
            <form class="">
                <div class="form-group row">
                    <label for="titel" class="col-sm-2 col-form-label">Titel</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control" id="titel" placeholder=""
                               value="<?php echo $titel?>">
                    </div>
                </div>


                <div class="form-group row">
                    <label for="inhalt" class="col-sm-2 col-form-label">Inhalt</label>
                    <div class="col-sm-10">
                        <textarea readonly class="form-control" id="inhalt" placeholder=""><?php echo $inhalt ?></textarea>

                    </div>
                </div>


                <div class="form-group row">
                    <label for="ablaufsdatum" class="col-sm-2 col-form-label">Ablaufsdatum</label>
                    <div class="col-sm-10">
                        <input type="date" readonly class="form-control" id="ablaufsdatum" placeholder="" value="<?php echo $ablaufsdatum ?>">

                    </div>
                </div>

                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Ok</button>
            </form>
        </div>


    </div>

<?php  }?>





