<?php
class Db{

    private static $init = FALSE;
    /** The mysqli connection object
     */
   public static $conn;
    /** initializes the static class variables. Only runs initialization once.
     * does not return anything.
     */
public static function initialize()
    {
        if (self::$init===TRUE)return;
        self::$init = TRUE;
        self::$conn = new mysqli("localhost", "root", "", "archivedb");
    }


}



?>