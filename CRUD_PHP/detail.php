<?php
require 'koneksi.php';
if (isset($_GET['id'])) {
    $student = null;
    $id = $_GET['id'];
    // query
    $sql = "SELECT * FROM students WHERE id=? LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $result = $stmt->get_result();

    // merubah menjadi array assosiatif
    while ($row = $result->fetch_assoc()) {
        $student = $row;
    }
}else{
    die('Invalid student id');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .card{
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
        <div class="card text-dark bg-light mb-3" style="max-width: 25rem;">
            <div class="card-header"><?php echo $student['nama_depan'] . '' . $student['nama_belakang'] ?></div>
            <div class="card-body">
                <ul style="list-style: none;">
                    <li><i class="fas fa-paw"></i>&nbsp;<strong style="margin-left:10px;">Jenjang : </strong> <?php echo $student['jenjang'] ?></li>
                    <li><i class="fas fa-mobile-alt" style="margin-left:4px;"></i>&nbsp;<strong style="margin-left:13px;">No HP : </strong> <?php echo $student['no_hp'] ?></li>
                    <li><i class="fas fa-crown"></i><strong style="margin-left:7px;">&nbsp;Hobi : </strong> <?php echo $student['hobi'] ?></li>
                    <li><i class="fas fa-map-marked-alt"></i><strong style="margin-left:10px;">&nbsp;Alamat : </strong> <?php echo $student['alamat'] ?></li>
                </ul>
            </div>
            <div class="card-footer">
                <a href="index.php" class="btn btn-primary text-white"><i class="fas fa-arrow-alt-circle-left"></i></a>
                <a href="hapus.php?id=<?= $student['id'] ?>" class="btn btn-danger text-white"><i class="fas fa-trash"></i></a>
                <a href="edit.php?id=<?= $student['id'] ?>" class="btn btn-success text-white"><i class="fas fa-pencil-alt"></i></a>
            </div>
        </div>
    </div>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>