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
    private $documentId;

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
    public function addNewOrdnerBox($titel, $inhalt, $ablaufsdatum, $ordnerqrcode, $abteilung, $gitterBoxId,$dokument_id)
    {

        $gitterBoxId = null;
        $query ="INSERT INTO ordnerbox(titel, inhalt, ablaufsdatum,ordnerqrcode, abteilung, gitterbox_id, dokument_id)
                                               VALUES ( '$titel' ,  '$inhalt',  '$ablaufsdatum' , '$ordnerqrcode', '$abteilung', null,  '$dokument_id')";

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
        $query = "SELECT * FROM ordnerbox WHERE ordnerqrcode LIKE '%".$qrcode."%' ";

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
        $query = "SELECT ordnerbox.id, ordnerbox.titel, ordnerbox.ablaufsdatum,ordnerbox.abteilung, dokuments.dokument FROM ordnerbox
                          INNER JOIN dokuments 
                          ON ordnerbox.dokument_id = dokuments.id";
        $sql = mysqli_query(Db::$conn, $query);
        if (!$sql){
            die(mysqli_error(Db::$conn));
        }
        return $sql;
    }

    public function getAllOrdnerInGitterBox($id){

        $query = "SELECT * FROM ordnerbox WHERE gitterbox_id = '$id'";
        $sql = mysqli_query(Db::$conn, $query);
        if (!$sql){
            die(mysqli_error(Db::$conn));
        }
        return $sql;
    }

    public function getOrdnerById($id){

        $query = "SELECT * FROM ordnerbox WHERE id = '$id'";
        $sql = mysqli_query(Db::$conn, $query);
        if (!$sql){
            die(mysqli_error(Db::$conn));
        }
        return $sql;
    }

    public function moveOldOrdnerInAnotherTableAfterEntmappenIfDateExpired($ordnerbox_id){

        $query = "INSERT INTO alte_ordnerbox(titel, inhalt, ablaufsdatum, ordnerqrcode, abteilung, dokument, gitterbox_name)
                        SELECT ordnerbox.titel, ordnerbox.inhalt, ordnerbox.ablaufsdatum, ordnerbox.ordnerqrcode, ordnerbox.abteilung, dokuments.dokument, gitterbox.name
                        FROM ordnerbox
                        INNER JOIN  gitterbox ON ordnerbox.gitterbox_id = gitterbox.id
                        INNER JOIN dokuments ON ordnerbox.dokument_id = dokuments.id
                        WHERE ordnerbox.id = '$ordnerbox_id'";
        $sql = mysqli_query(Db::$conn, $query);
        if (!$sql){
            die(mysqli_error(Db::$conn));
        }
        return $sql;
    }


}