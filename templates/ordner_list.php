<?php
include "../src/OrdnerBox.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <title>Title</title>
</head>
<body>
<div class="container">
    <div class="row">
        <ul class="nav nav-tabs ">
            <li class="nav-item">
                <a class="nav-link" href="#">Ordner anlegen</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Ordner Archivieren</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Container suchen</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Ordner suchen</a>
            </li>
        </ul>
    </div>

    <table class="table table-striped">
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
    <?php ?>

</div>
