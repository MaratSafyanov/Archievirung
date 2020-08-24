<?php
include "../src/OrdnerBox.php";
?>

<?php include $_SERVER['DOCUMENT_ROOT']."/templates/includes/header.php"; ?>
<?php include $_SERVER['DOCUMENT_ROOT']."/templates/includes/navbar.php"; ?>

<div class="container">

    <table class="table table-hover">
        <thead>
        <tr>

            <th scope="col">Titel</th>
            <th scope="col">Abteilung</th>
            <th scope="col">Ablaufsdatum</th>
            <th scope="col">Dokument</th>
        </tr>
        </thead>
        <tbody>

        <?php
        $ordnerBox = new OrdnerBox();
        $result = $ordnerBox->getAllOrdner();

        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $titel = $row['titel'];
            $ablaufsdatum = $row['ablaufsdatum'];
            $abteilung = $row['abteilung'];
            $dokument = $row['dokument'];


            echo "<tr>";

            echo "<td><a href='ordner_info.php?id=$id'> {$titel}</a></td>";
            echo "<td>{$abteilung}</td>";
            echo "<td>{$ablaufsdatum}</td>";
            echo "<td>{$dokument}</td>";

            echo "</tr>";


        }

        ?>



        </tbody>
    </table>

</div>
