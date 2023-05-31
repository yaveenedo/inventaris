<?php

$conn = mysqli_connect("localhost","root","","inventaris");

if (isset($_POST["addnewbarang"])){
  $nama_barang = $_POST["nama_barang"];
  $desk_barang = $_POST["deskripsi_barang"];
  $stok = $_POST["stok_barang"];
  $tanggal_masuk = $_POST["tanggal_masuk"];
  $tanggal_keluar = $_POST["tanggal_keluar"];
  $berat = $_POST["bobot_barang"];
  $panjang = $_POST["panjang_barang"];
  $lebar = $_POST["lebar_barang"];
  $tinggi = $_POST["tinggi_barang"];

  $addtotable = mysqli_query($conn, "insert into stok (nama_barang, deskripsi_barang, stok_barang, tanggal_masuk, tanggal_keluar, bobot_barang, panjang_barang, lebar_barang, tinggi_barang) values('$nama_barang', '$desk_barang', '$stok', '$tanggal_masuk', '$tanggal_keluar', '$berat', '$panjang', '$lebar', '$tinggi')");
  if($addtotable){
    header("location:tambah-barang.php");
  } else {
    echo "GAGAL";
    header("location:tambah-barang.php");
  }
};

if (isset($_POST["updatebarang"])){
  $nama_barang = $_POST["nama_barang"];
  $desk_barang = $_POST["deskripsi_barang"];
  $stok = $_POST["stok_barang"];
  $tanggal_masuk = $_POST["tanggal_masuk"];
  $tanggal_keluar = $_POST["tanggal_keluar"];
  $berat = $_POST["bobot_barang"];
  $panjang = $_POST["panjang_barang"];
  $lebar = $_POST["lebar_barang"];
  $tinggi = $_POST["tinggi_barang"];
  $idb = $_POST["idb"];

  $update = mysqli_query($conn, "update stok set nama_barang='$nama_barang', deskripsi_barang='$desk_barang', stok_barang='$stok', tanggal_masuk='$tanggal_masuk', tanggal_keluar='$tanggal_keluar', bobot_barang='$berat', panjang_barang='$panjang', lebar_barang='$lebar', tinggi_barang='$tinggi' where id_barang ='$idb'");
  if($update){
    header("location:update-barang.php");
  } else {
    echo "Gagal";
    header("location:update-barang.php");
  }
};

if(isset($_POST['hapusbarang'])){
  $idb = $_POST['idb'];

  $hapus = mysqli_query($conn, "delete from stok where id_barang='$idb'");
  if($hapus){
      header("location:delete-barang.php");
  } else {
      echo "Gagal";
      header("location:delete-barang.php");
  }
};

if (isset($_POST["addnewbarangmasuk"])){
  $id_barang_stok = $_POST["id_barang_stok"];
  $tanggal_masuk = $_POST["tanggal_masuk"];
  $stok_masuk = $_POST["stok_masuk"];
  $keterangan = $_POST["keterangan"];


  $addtotablemasuk = mysqli_query($conn, "insert into barang_masuk (id_barang_stok, tanggal_masuk, stok_masuk , keterangan) values('$id_barang_stok','$tanggal_masuk', '$stok_masuk', '$keterangan')");
  header("location:barang-masuk.php");
  if(!$addtotablemasuk) {
    echo "GAGAL";
  }
};

if (isset($_POST["editbarangmasuk"])){
  $id_barang_masuk = $_POST["id_barang_masuk"];
  $tanggal_masuk = $_POST["tanggal_masuk"];
  $stok_masuk = $_POST["stok_masuk"];
  $keterangan = $_POST["keterangan"];
  
  
  $edittotablemasuk = mysqli_query($conn, "update barang_masuk set tanggal_masuk='$tanggal_masuk', stok_masuk='$stok_masuk', keterangan='$keterangan' where id_barang_masuk='$id_barang_masuk'");
  header("location:barang-masuk.php");
  if(!$edittotablemasuk) {
    echo "GAGAL";
  }
};

if(isset($_POST['hapusbarangmasuk'])){
  $id_barang_masuk = $_POST['id_barang_masuk'];

  $hapusmasuk = mysqli_query($conn, "delete from barang_masuk where id_barang_masuk='$id_barang_masuk'");
  header("location:barang-masuk.php");
  if(!$hapusmasuk){
    echo "GAGAL";
  }
};
?>