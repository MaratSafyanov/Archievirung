<?php
include "../src/GitterBox.php";
?>

<?php include $_SERVER['DOCUMENT_ROOT'] . "/templates/includes/header.php"; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/templates/includes/navbar.php"; ?>

<div class="container">

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
