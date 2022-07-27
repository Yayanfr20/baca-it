<?php

// mulai session
session_start();
if (!isset($_SESSION["admin"])) {
    header("Location: ../.");
    exit;
}

$id = $_GET['id'];
require 'functions.php';

$ebook = query("SELECT * FROM ebook WHERE id = $id")[0];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail ebook</title>
</head>
<body>
    <ul>
        <li>
            <img src="cover/<?= $ebook['cover'] ?>" alt="" width="200px">
        </li>
        <li>Judul : <?= $ebook['judul']; ?></li>
        <li>Deskripsi : <?= $ebook['deskripsi'];?></li>
        <li>Tanggal upload : <?= $ebook['tglupload']; ?></li>
    </ul>
    <br>
    <a href="daftar-ebook">Kembali</a>
</body>
</html>