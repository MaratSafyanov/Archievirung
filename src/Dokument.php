<?php
include_once 'connect.php';
Db::initialize();

class Dokument
{
    private $id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }
    private $dokument;
    private $aufbewahrungsfrist;
    private $aufbewahrungsart;


    public function getAllDokuments(){

        $query = "SELECT * FROM dokuments";
        $sql = mysqli_query(Db::$conn, $query);
        if (!$sql){
            die(mysqli_error(Db::$conn));
        }
        return $sql;
    }

    public function findIdDokumentByName($dokumentName){
        $query = "SELECT  id  FROM dokuments WHERE dokument = '$dokumentName'";
        $sql = mysqli_query(Db::$conn, $query);
        if (!$sql){
            die(mysqli_error(Db::$conn));
        }
        return $sql;

    }
}