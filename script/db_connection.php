<?php
    function OpenCon() {
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "Moneylot1$";
        $db = "soundboard";

        $conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connection Failed: %s\n" . $conn -> error);

        return $conn;
    }

    function CloseCon($conn) {
        $conn -> close();
    }

?>