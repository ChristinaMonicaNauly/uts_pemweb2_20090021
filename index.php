<?php
include('connection.php');
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
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg text-uppercase" style="background-color: blue ">
        <div class="container d-flex justify-content-center">
            <a class="navbar-brand " style="color: black" href="index.php">PEREKAMAN DATA KENDARAAN</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    <!-- Close Navbar -->
    <div class="container d-flex justify-content-center">
        <h3 >Data Kendaraan</h3>
    </div>
    <div class="row mx-2">
        <div class="col">
        <br>
            <a class="btn btn-primary" href="tambah.php">Tambah</a>
        </br>
        </div>
    </div>
    <div class="row m-2">
        <div class="col">
        <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Nomor Plat</th>
                  <th scope="col">Merek</th>
                  <th scope="col">Tipe</th>  
                  <th scope="col">Hapus</th>  
                  <th scope="col">Ubah</th>  
                </tr>
              </thead>
              <tbody>
                <?php
                $sql = "select * from kendaraan";
                $result = pg_query($sql);

                while($row = pg_fetch_object($result)):
                ?>
                <tr>
                    <td><?php echo $row->id ?></td>
                    <td><?php echo $row->nomor ?></td>
                    <td><?php echo $row->merek ?></td>
                    <td><?php echo $row->tipe ?></td>
                    <td>
        <?php echo '<a onclick="konfirmasi(event)" href="hapus.php?id=' . $row->id . '">Hapus</a>' ?>
                    </td>
                    <td>
        <?php echo '<a href="ubah.php?id=' . $row->id . '">Ubah</a>' ?>
                    </td>
                </tr>
                <?php endwhile; ?>
              </tbody>
            </table>
        </div>
    </div>
    
    <script type="text/javascript">
        function konfirmasi(event){
            if(confirm("Yakin dihapus?")){
              return true
            } else event.preventDefault()
        }
    </script>