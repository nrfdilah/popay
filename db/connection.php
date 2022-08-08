<?php 
session_start();
	
	date_default_timezone_set("Asia/Jakarta");

	$host		= "localhost";
	$username	= "popaysit";
	$password	= "Ho)qES[39t0Up6";
	$database	= "popaysit_popay";

	$conn 		= mysqli_connect($host, $username, $password, $database);
	if ($conn) {
		// echo "berhasil terkoneksi!";
	} else {
		echo "gagal terkoneksi!";
	}

    function deleteUser($id) {
        global $conn;
            $query = mysqli_query($conn, "DELETE * FROM user WHERE id_pengelola = '$id'");
              return mysqli_affected_rows($conn);      
    }
