<?php
require 'koneksi.php';
// ---------------------------------------start---------------------------------------
if (isset($_POST['submit'])) {

    // ---------------------------------------tambahdata---------------------------------------
        $nama_depan = $_POST['nama_depan'];
        $nama_belakang = isset($_POST['nama_belakang']) ? $_POST['nama_belakang'] : '';
        $no_hp = isset($_POST['no_hp']) ? $_POST['no_hp'] : '';
        $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
        $jenjang = isset($_POST['jenjang']) ? $_POST['jenjang'] : '';
        $membaca = isset($_POST['membaca']) ? $_POST['membaca'] : '';
        $menulis = isset($_POST['menulis']) ? $_POST['menulis'] : '';
        $menggambar = isset($_POST['menggambar']) ? $_POST['menggambar'] : '';
        $alamat = isset($_POST['alamat']) ? $_POST['alamat'] : '';
        $submit = isset($_POST['submit']) ? $_POST['submit'] : '';
    // ---------------------------------------tambahdata---------------------------------------



    //---------------------------------------tag error---------------------------------------
        $erorrs = [];
        if (!empty($submit)) {
            if (empty($nama_depan)) {
                $erorrs[] = "Nama Depan Tidak Boleh Kosong";
            }if (empty($nama_belakang)) {
                $erorrs[] = "Nama Belakang Tidak Boleh Kosong";
            }if (empty($no_hp)) {
                $erorrs[] = "Nomer HP Tidak Boleh Kosong";
            }
            if (empty($gender)) {
                $erorrs[] = "Gender Tidak Boleh Kosong";
            }
            if (empty($jenjang)) {
                $erorrs[] = "Jenjang Tidak Boleh Kosong";
            }
            if (empty($alamat) ) {
                $erorrs[] = "Alamat Tidak Boleh Kosong";
            }
        }
    //---------------------------------------tag error---------------------------------------



    //---------------------------------------tag hobbi---------------------------------------
        $hobbies = [];
        if (!empty($membaca)) {
            $hobbies[] = $membaca;
        }
        if (!empty($menulis)) {
            $hobbies[] = $menulis;
        }
        if (!empty($menggambar)) {
            $hobbies[] = $menggambar;
        }
        $hobi = implode(", ", $hobbies);
        
    //---------------------------------------tag hobbi---------------------------------------

    

    // ---------------------------------------cek kondisi---------------------------------------
        if (empty($erorrs)) {
            $sql = "INSERT INTO students VALUES ('','$nama_depan', '$nama_belakang','$no_hp', '$gender', '$jenjang', '$hobi', '$alamat')";
            $conn->query($sql);
        }
        if (mysqli_affected_rows($conn) > 0 ) {
            session_start();
            $_SESSION['berhasil'] = 'data anda berhasil di tambah';
            header('Location: index.php');
        }
    // ---------------------------------------cek kondisi---------------------------------------

    }
// ---------------------------------------end---------------------------------------
?>
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
                <h3 class="mb-4">Add Student</h3>
                <div class="d-flex flex-row-reverse" style="margin-top: -50px;">
                    <a href="index.php" type="button" class="btn-close ms-auto" data-bs-dismiss="modal" aria-label="Close"></a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="">
                        <div class="alert alert-danger alert-dismissible fade show <?php echo empty($erorrs)?"d-none":"" ?>" role="alert">
                            <ul>
                                <?php foreach($erorrs as $error){?>
                                        <li><?php echo $error ?></li>
                                <?php }?>
                            </ul>
                        </div>
                        <form id="myForm" method="POST">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Nama</span>
                                </div>
                                <input name="nama_depan" value="" type="text" class="form-control" placeholder="Nama Depan" />
                                <input name="nama_belakang"  value="" type="text" class="form-control" placeholder="Nama Belakang"  />
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">No HP</span>
                                </div>
                                <input name="no_hp"  value="" type="text" class="form-control" placeholder="No HP" />
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
                                <textarea type="text" class="form-control" name="alamat" rows="3" placeholder="Masukan Alamat"></textarea>
                            </div>
                            <div class="form-group">
                                <input class="form-control btn btn-primary" type="submit" value="submit" name="submit" id="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>