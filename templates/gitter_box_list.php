<?php
include "../src/GitterBox.php";
include "../src/OrdnerBox.php";
?>

<?php include $_SERVER['DOCUMENT_ROOT'] . "/templates/includes/header.php"; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/templates/includes/navbar.php"; ?>

<div class="container">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <table class="table  table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>


                </tr>
                </thead>
                <tbody>

                <?php
                $gitterBox = new GitterBox();


                $result = $gitterBox->getAllGitterBox();
                $count = 1;

                while ($row = mysqli_fetch_assoc($result)) {

                    $id = $row['id'];
                    $name = $row['name'];

                    echo "<tr>";

                    echo "<td>" . $count++ . "</td>";
                    echo "<td><a href='gitterbox_info.php?id=$id'>{$name}</a>   <img id='image' src=></td>";


                    echo "</tr>";

                }

                ?>

                </tbody>
            </table>
            <?php ?>
        </div>
        <div class="col-sm 3"></div>
    </div>
</div>
