<?php
session_start();
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
                $ordnerBox = new OrdnerBox();

                $result = $gitterBox->getAllGitterBox();
                $count = 1;

                while ($row = mysqli_fetch_assoc($result)) {

                    $img = null;
                    $id = $row['id'];
                    $name = $row['name'];

                   $result2 = $ordnerBox->getAllOrdnerInGitterBox($id);
                   while ($row2 = mysqli_fetch_assoc($result2)) {

                       $ablaufsdatum = $row2['ablaufsdatum'];
                       if (date("Y-m-d") > $ablaufsdatum){
                           $img = "alert-circle.svg";
                           break;
                       }
                       elseif (date("Y-m-d") < $ablaufsdatum){
                           $img = "check-circle.svg";
                       }
                   }

                    echo "<tr>";

                    echo "<td>" . $count++ . "</td>";
                    echo "<td><a href='gitterbox_info.php?id=$id'>{$name}</a>   <img  src='../bilder/$img'></td>";


                    echo "</tr>";

                }

                ?>

                </tbody>
            </table>

        </div>
        <div class="col-sm 3"></div>
    </div>
</div>
