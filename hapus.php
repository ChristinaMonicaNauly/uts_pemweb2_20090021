<?php
include('connection.php');

$sql = "delete from laptop where id='" . $_GET['id'] . "'";
$result = pg_affected_rows(pg_query($sql));
if($result == 1) {
    echo '<script type="text/javascript">';
    echo 'alert("Data telah terhapus");';
    echo 'window.location.href="index.php";';
    echo '</script>';
}
?>