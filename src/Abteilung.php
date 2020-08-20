<?php
include_once 'connect.php';
Db::initialize();

class Abteilung
{
private $id;
private $abt;
private $kuerzel;

public function getAllAbteilungen(){
    $query = "SELECT * FROM abteilungen";
    $sql = mysqli_query(Db::$conn, $query);
    if (!$sql){
        die(mysqli_error(Db::$conn));
    }
    return $sql;
}
}