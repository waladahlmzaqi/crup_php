<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .card{
            width: 550px;
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
                <h3 class="mb-4">Edit Student</h3>
                <div class="d-flex flex-row-reverse" style="margin-top: -50px;">
                    <a href="index.php" type="button" class="btn-close ms-auto" data-bs-dismiss="modal" aria-label="Close"></a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="">
                        <?php
                            include 'koneksi.php';
                            $id = $_GET['id'];
                            $students = mysqli_query($conn,"SELECT * FROM students WHERE id='$id'");
                            while($data = mysqli_fetch_array($students)){
                        ?>
                        <form id="myForm" method="POST" action="update.php">
                            <input type="text" class="form-control" name="id" placeholder="" hidden value="<?= $data['id'] ?>">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Nama</span>
                                </div>
                                <input name="nama_depan" value="<?= $data['nama_depan'] ?>" type="text" class="form-control" placeholder="Nama Depan" />
                                <input name="nama_belakang"  value="<?= $data['nama_belakang'] ?>" type="text" class="form-control" placeholder="Nama Belakang"  />
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">No HP</span>
                                </div>
                                <input name="no_hp"  value="<?= $data['no_hp'] ?>" type="text" class="form-control" placeholder="No HP" />
                            </div>
                            <div class="form-group">
                                <h5>Gender</h5>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="gender" value="Pria">Pria
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="gender" value="Wanita">Wanita
                                    </label>
                                </div>
                            </div>
                            <div class="input-group mb-3 mt-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Jenjang</span>
                                </div>
                                <select class="form-select" name="jenjang" id="jenjang">
                                    <option value="TK">TK</option>
                                    <option value="SD">SD</option>
                                    <option value="SMP">SMP</option>
                                    <option value="SMA">SMA</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <h5>Hobi</h5>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input id="membaca" type="checkbox" class="form-check-input" name="membaca" value="Mambaca"> Membaca
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input id="menulis" type="checkbox" class="form-check-input" name="menulis" value="Menulis"> Menulis
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input id="menggambar" type="checkbox" class="form-check-input" name="menggambar" value="Menggambar"> Menggambar
                                    </label>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <div class="form-group">
                                    <span class="input-group-text">Alamat</span>
                                </div>
                                <textarea type="text" class="form-control" name="alamat" rows="3" placeholder="Masukan Alamat" value="<?= $data['alamat'] ?>"></textarea>
                            </div>
                            <div class="form-group">
                                <input class="form-control btn btn-primary" type="submit" value="update" name="submit" id="submit">
                            </div>
                        </form>
                        <?php 
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>