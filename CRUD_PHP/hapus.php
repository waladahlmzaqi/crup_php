<?php 
require 'koneksi.php';

// ---------------------------------------hapus---------------------------------------
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM students WHERE id=? LIMIT 1";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        session_start();
        $_SESSION['berhasil'] ='data berhasil di hapus';
        header('Location: index.php');
    }
}
// ---------------------------------------hapus---------------------------------------
?>