<?php
include "../src/OrdnerBox.php";
if (isset($_POST['ordnerSuchen'])) {

    $ordnerQrCode = $_POST['qrCodeText'];
    $box = (new OrdnerBox)->findOrdner($ordnerQrCode);
    $resultOrdner = $box->fetch_assoc();
    $titel = $resultOrdner['titel'];
    $inhalt = $resultOrdner['inhalt'];
    $abteilung = $resultOrdner['abteilung'];
    $ablaufsdatum = $resultOrdner['ablaufsdatum'];



?>

    <?php include $_SERVER['DOCUMENT_ROOT']."/templates/includes/header.php"; ?>
    <?php include $_SERVER['DOCUMENT_ROOT']."/templates/includes/navbar.php"; ?>


<div class="container">



    <h3><?php echo $titel  ?></h3>
    <p><?php   echo $inhalt ?></p>
    <h3><?php echo $ablaufsdatum  ?></h3>
    <h3><?php echo $abteilung ?></h3>


</div>

<?php   } ?>





