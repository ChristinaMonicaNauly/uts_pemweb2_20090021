<?php
$conn_string = "host=ec2-44-195-169-163.compute-1.amazonaws.com port=5432 " . 
    "dbname=dblfpunhgksdop user=wtykeavntphgvp " .
    "password=2a114ff2eb340598d32e4e4b8a63cb2b1520a0e785c8db3f3efa4e774a56031f";
$conn = pg_connect($conn_string);

if($conn) {
    // echo "Koneksi DB Berhasil";
} else {
    echo "Koneksi DB GAGAL";
}
?>