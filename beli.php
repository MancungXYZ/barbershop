<?php
session_start();
//mendapatkan url
$id_produk = $_GET['id'];


if (isset($_SESSION['keranjang'][$id_produk])) {
    $_SESSION['keranjang'][$id_produk] += 1;
} else {
    $_SESSION['keranjang'][$id_produk] = 1;
}

echo "<script>alert('Sukses, Menu berhasil ditambahkan')</script>";
echo "<script>location='keranjang.php';</script>";
