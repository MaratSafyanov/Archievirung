<?php
include "../src/GitterBox.php";
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

    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>

        </tr>
        </thead>
        <tbody>

        <?php
        $ordnerBox = new GitterBox();
        $result = $ordnerBox->getAllGitterBox();

        while ($row = mysqli_fetch_assoc($result)) {

            $id = $row['id'];
            $name = $row['name'];
            echo "<tr>";

            echo "<td>$id</td>";
            echo "<td><a href='gitterbox_info.php?id=$id'>{$name}</a></td>";

            echo "</tr>";


        }

        ?>



        </tbody>
    </table>
    <?php ?>

</div>
