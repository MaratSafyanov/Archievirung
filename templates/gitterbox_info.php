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
            <th scope="col">Abteilung</th>
            <th scope="col">Ablaufsdatum</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $box = (new OrdnerBox)->getAllOrdnerInGitterBox($id);
            while ($row = mysqli_fetch_assoc($box)){

                $id = $row['id'];
                $titel = $row['titel'];
                $ablaufsdatum = $row['ablaufsdatum'];
                $abteilung = $row['abteilung'];
                $img = null;

                if (date("Y-m-d") > $ablaufsdatum) {
                    $img="alert-circle.svg";
                } else {
                    $img ="check-circle.svg";
                }
                echo "<tr>";


                echo "<td><a href='ordner_info.php?id=$id'>{$titel}</a> </td>";
                echo "<td>{$abteilung}</td>";
                echo "<td>{$ablaufsdatum}</td>";
                echo "<td><img src='../bilder/$img'></td>";

                echo "</tr>";
            }

        }
        ?>

        </tbody>
    </table>

</div>
