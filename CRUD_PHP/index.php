<?php
require 'koneksi.php';
session_start();
$students = [];
$total = 0;

$sql = "SELECT * FROM students";
$result = $conn->query($sql);
$total = $result->num_rows;

while ($row = $result->fetch_assoc()) {
    $students[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .card{
            width: 1100px;
            margin: 30px auto;
        }
    </style>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Student</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
            <div class="" style="z-index: 2;">  
                <h3>List Siswa</h3>
            </div>
                <div class="d-flex flex-row-reverse mr-5" style="margin-top: -40px;">
                    <a href="tambah.php"><button type="button" class="btn btn-primary mr-3"><i class="fas fa-cloud-download-alt"></i>  Tambah+</button></a>
                </div>
            </div>
            <div class="card-body">
              <?php if (isset($_SESSION['berhasil'])) { ?>
                <div>
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= $_SESSION['berhasil'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  <?php unset($_SESSION['berhasil']) ?>
                </div>
              <?php } ?>

                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">No HP</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Jenjang</th>
                        <th scope="col" style="width:15%;">Action</th>
                      </tr>
                    </thead>
                    <tbody>

                    <?php foreach ($students as $k => $student) { ?>
                        <tr>
                            <td><?= $k + 1 ?></td>
                            <td><?= $student['nama_depan'] . ' ' . $student['nama_belakang'] ?></td>
                            <td><?= $student['no_hp'] ?></td>
                            <td><?= $student['gender'] ?></td>
                            <td><?= $student['jenjang'] ?></td>
                            <td>
                                <div class="text-center text-white">
                                    <a class="btn btn-primary btn-sm" href="detail.php?id=<?= $student['id'] ?>"><i class="far fa-eye"></i></a>
                                    <a class="btn btn-success btn-sm" href="edit.php?id=<?= $student['id'] ?>"><i class="fas fa-pencil-alt"></i></a>
                                    <a class="btn btn-danger btn-sm" href="hapus.php?id=<?= $student['id'] ?>"><i class="fas fa-trash-alt"></i></a>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>

                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>