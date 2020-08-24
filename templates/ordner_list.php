<?php
include "../src/OrdnerBox.php";



?>

<?php include $_SERVER['DOCUMENT_ROOT'] . "/templates/includes/header.php"; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/templates/includes/navbar.php"; ?>

<div class="container">

    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th scope="col">Titel</th>
            <th scope="col">Inhalt</th>
            <th scope="col">Ablaufsdatum</th>
        </tr>
        </thead>
        <tbody>

        <?php

        if (isset($_POST['ordnerSuchen'])) {

                $ordnerQrCode = $_POST['qrCodeText'];
                $box = (new OrdnerBox)->findOrdner($ordnerQrCode);
          /*  else if ($_POST['ordnerSuchen'] == null) {
                $titelText = $_POST['titelText'];
                $box = (new OrdnerBox)->findOrdner(null, $titelText);
            }*/

                while ($resultOrdner = mysqli_fetch_assoc($box)) {
                    $titel = $resultOrdner['titel'];
                    $inhalt = $resultOrdner['inhalt'];
                    $ablaufsdatum = $resultOrdner['ablaufsdatum'];


                    echo "<tr>";
                    echo "<td>{$titel}</td>";
                    echo "<td>{$inhalt}</td>";
                    echo "<td>{$ablaufsdatum}</td>";
                    echo "</tr>";
                }
        }
        ?>


        </tbody>
    </table>

</div>
