<?php
include "../src/OrdnerBox.php";
?>

<?php include $_SERVER['DOCUMENT_ROOT']."/templates/includes/header.php"; ?>
<?php include $_SERVER['DOCUMENT_ROOT']."/templates/includes/navbar.php"; ?>

<div class="container">

    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Titel</th>
            <th scope="col">Abteilung</th>
            <th scope="col">Ablaufsdatum</th>
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

            echo "<tr>";

            echo "<td>{$id}</td>";
            echo "<td>{$titel}</td>";
            echo "<td>{$abteilung}</td>";
            echo "<td>{$ablaufsdatum}</td>";

            echo "</tr>";


        }

        ?>



        </tbody>
    </table>

</div>
