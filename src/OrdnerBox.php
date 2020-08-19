<?php
include_once 'connect.php';
Db::initialize();

class OrdnerBox
{
    private $id;
    private $abteilung;
    private $titel;
    private $inhalt;
    private $ablaufsdatum;
    private $ordnerqrcode;
    private $gitterBoxId;

    /**
     * @return mixed
     */
    public function getAbteilung()
    {
        return $this->abteilung;
    }

    /**
     * @param mixed $abteilung
     */
    public function setAbteilung($abteilung): void
    {
        $this->abteilung = $abteilung;
    }

    /**
     * @return mixed
     */
    public function getOrdnerqrcode()
    {
        return $this->ordnerqrcode;
    }

    /**
     * @param mixed $ordnerqrcode
     */
    public function setOrdnerqrcode($ordnerqrcode): void
    {
        $this->ordnerqrcode = $ordnerqrcode;
    }


    /**
     * @return mixed
     */
    public function getTitel()
    {
        return $this->titel;
    }

    /**
     * @param mixed $titel
     */
    public function setTitel($titel): void
    {
        $this->titel = $titel;
    }

    /**
     * @return mixed
     */
    public function getInhalt()
    {
        return $this->inhalt;
    }

    /**
     * @param mixed $inhalt
     */
    public function setInhalt($inhalt): void
    {
        $this->inhalt = $inhalt;
    }

    /**
     * @return mixed
     */
    public function getAblaufsdatum()
    {
        return $this->ablaufsdatum;
    }

    /**
     * @param mixed $ablaufsdatum
     */
    public function setAblaufsdatum($ablaufsdatum): void
    {
        $this->ablaufsdatum = $ablaufsdatum;
    }


    //Funktion, um  neuen OrdnerBox zu estellen
    public function addNewOrdnerBox($titel, $inhalt, $ablaufsdatum, $ordnerqrcode, $abteilung, $gitterBoxId)
    {

        $gitterBoxId = null;
        $query ="INSERT INTO ordnerbox(titel, inhalt, ablaufsdatum,ordnerqrcode, abteilung, gitterbox_id)
                                               VALUES ( '$titel' ,  '$inhalt',  '$ablaufsdatum' , '$ordnerqrcode', '$abteilung', null)";

        $sql = mysqli_query(Db::$conn, $query);
        if (!$sql){
            die(mysqli_error(Db::$conn));
        }
        return $sql;
    }

    public function ordnerZuordnen($gitterbox_id, $id){
        $query = "UPDATE ordnerbox SET gitterbox_id = '$gitterbox_id' WHERE id = '$id' ";

        $sql = mysqli_query(Db::$conn, $query);
        if (!$sql){
            die(mysqli_error(Db::$conn));
        }
        return $sql;
    }

    public function findOrdner($qrcode){
        $query = "SELECT * FROM ordnerbox WHERE ordnerqrcode = '$qrcode'";

        $sql = mysqli_query(Db::$conn, $query);
        if (!$sql){
            die(mysqli_error(Db::$conn));
        }
        return $sql;

    }

    public function ordnerTrennen($id)
    {
        $query = "UPDATE ordnerbox SET gitterbox_id = NULL  WHERE id = '$id' ";

        $sql = mysqli_query(Db::$conn, $query);
        if (!$sql){
            die(mysqli_error(Db::$conn));
        }
        return $sql;
    }

    public function getAllOrdner(){
        $query = "SELECT * FROM ordnerbox";
        $sql = mysqli_query(Db::$conn, $query);
        if (!$sql){
            die(mysqli_error(Db::$conn));
        }
        return $sql;
    }


}