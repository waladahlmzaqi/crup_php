<?php
    $DB_HOST = "localhost";
    $DB_DATABASE = "db_sekolah";
    $DB_USERNAME = "root";
    $DB_PASSWORD = "";

    // -------------Create connection-------------
    $conn = new mysqli($DB_HOST, $DB_USERNAME, $DB_PASSWORD,  $DB_DATABASE,);

    // -------------Check connection-------------
    if ($conn->connect_error){
        die("Koneksi gagal : $conn->connect_error");
    }





    

?>
