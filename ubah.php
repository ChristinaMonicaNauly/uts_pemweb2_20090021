<?php
include('connection.php');

$sql = "select * from kendaraan where id=" . $_GET['id'] . "";
$result = pg_query($sql);
$data = pg_fetch_object($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <!-- Data Tables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <!-- Own CSS -->
    <link rel="stylesheet" href="css/style.css">

    <title>REKAM DATA KENDARAAN | CRUD</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg text-uppercase" style="background-color: blue ">
        <div class="container d-flex justify-content-center">
            <a class="navbar-brand " style="color: black" href="index.php">PEREKAMAN DATA KENDARAAN</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    <!-- Close Navbar -->
    <div class="container d-flex justify-content-center my-2">
        <h3>Form Ubah Data Kendaraan</h3>
    </div>

    <div class="row m-2">
        <div class="col-7">
            <form method="post" >
              <div class="form-group row my-1">
                <label for="nomor" class="col-sm-2 col-form-label">Nomor Plat</label>
                <div class="col-sm-10">
                  <input type="hidden" name="id" class="form-control" id="id" required="" 
                  value="<?php echo $data->id ?>">
                  <input type="text" name="nomor" class="form-control" id="nomor" required=""
                  value="<?php echo $data->nomor ?>">
                </div>
              </div>
              <div class="form-group row my-1">
                <label for="merek" class="col-sm-2 col-form-label">Merek</label>
                <div class="col-sm-10">
                  <input type="text" name="merek" class="form-control" id="merek" required=""
                  value="<?php echo $data->merek ?>">
                </div>
              </div>
              <div class="form-group row my-1">
                <label for="tipe" class="col-sm-2 col-form-label">Tipe</label>
                <div class="col-sm-10">
                  <input type="text" name="tipe" class="form-control" id="tipe" required=""
                  value="<?php echo $data->tipe ?>">
                </div>
              </div><div class="form-group row my-1 d-flex justify-content-end">
                <div class="col-3">
                  <button type="submit" class="form-control btn btn-primary" 
                  value="Simpan">Simpan</button>
                </div>
              </div>
            </form>
        </div>
    </div>
</body>

<?php
if(isset($_POST['id']) and !empty($_POST['id'])) {
    $sql = "update kendaraan set nomor='" . $_POST['nomor'] . "', merek='" . $_POST['merek'] . "', tipe='" . $_POST['tipe'] . 
        "' where id='" . $_POST['id'] . "'";
    $result = pg_affected_rows(pg_query($sql));
    if($result == 1) {
        echo '<script type="text/javascript">';
        echo 'alert("Perubahan data telah tersimpan");';
        echo 'window.location.href="index.php";';
        echo '</script>';
    }
}
?>