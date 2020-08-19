<?php
include_once "connect.php";
Db::initialize();
class GitterBox
{
    private $name;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function addNewGitterBox($name){

        $query ="INSERT INTO gitterbox(name) VALUES('$name')";
        $sql = mysqli_query(Db::$conn, $query);
        if (!$sql){
            die(mysqli_error(Db::$conn));
        }
        return $sql;
    }

    public function findGitterBox($name){

        $query = "SELECT * FROM gitterbox WHERE name = '$name'";

        $sql = mysqli_query(Db::$conn, $query);
        if (!$sql){
            die(mysqli_error(Db::$conn));
        }
        return $sql;
    }

    function getAllGitterBox(){

        $query = "SELECT * FROM gitterbox";
        $sql = mysqli_query(Db::$conn, $query);
        if (!$sql){
            die(mysqli_error(Db::$conn));
        }
        return $sql;
    }


}

