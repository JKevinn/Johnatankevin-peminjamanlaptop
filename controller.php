<?php
    $conn = mysqli_connect("localhost", "root", "", "db_peminjaman" );

    function query( $query ){
        global $conn;
        $result = mysqli_query($conn, $query);
        $container = [];
        while( $th = mysqli_fetch_assoc($result)){
            $container[] = $th;
        }
        return $container;
    }

?>