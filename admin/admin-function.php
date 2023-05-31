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

// if (isset($_POST["addbarangmasuk"])){
//   $id_barang = $_POST["id_barang"];
//   $tanggal_masuk = $_POST["tanggal_masuk"];
//   $deskripsi_barang = $_POST["deskripsi_barang"];
//   $stok_masuk = $_POST["stok_barang"];
//   $keterangan = $_POST["keterangan"];

//   $addtotablemasuk = mysqli_query($conn, "INSERT INTO barang_masuk (id_barang, tanggal_masuk, stok_masuk, keterangan) VALUES ('$id_barang', '$tanggal_masuk', '$stok_masuk', '$keterangan')");

//   if($addtotablemasuk){
//     header("location: barang-masuk.php");
//   } else {
//     echo "Gagal";
//     header("location: barang-masuk.php");
//   }
// };

// if (isset($_POST["updatebarangmasuk"])){
//   $id_barang = $_POST["id_barang"];
//   $tanggal_masuk = $_POST["tanggal_masuk"];
//   $deskripsi_barang = $_POST["deskripsi_barang"];
//   $stok_masuk = $_POST["stok_barang"];
//   $keterangan = $_POST["keterangan"];
//   $idbm = $_POST["idbm"];

//   $updatemasuk = mysqli_query($conn, "UPDATE barang_masuk SET id_barang='$id_barang', tanggal_masuk='$tanggal_masuk', stok_masuk='$stok_masuk', keterangan='$keterangan' WHERE id_barang ='$idb'");

//   if($updatemasuk){
//     header("location: barang-masuk.php");
//   } else {
//     echo "Gagal";
//     header("location: barang-masuk.php");
//   }
// };

// if(isset($_POST['hapusbarangmasuk'])){
//   $idbm = $_POST['idbm'];

//   $hapusmasuk = mysqli_query($conn, "DELETE FROM barang_masuk WHERE id_barang='$idbm'");

//   if($hapusmasuk){
//     header("location: barang-masuk.php");
//   } else {
//     echo "Gagal";
//     header("location: barang-masuk.php");
//   }
// };


// if (isset($_POST["addbarangkeluar"])) {
//   $id_barang = $_POST["id_barang"];
//   $tanggal_keluar = $_POST["tanggal_keluar"];
//   $stok_keluar = $_POST["stok_keluar"];
//   $penerima = $_POST["penerima"];

//   $addtotable = mysqli_query($conn, "INSERT INTO barang_keluar (id_barang, tanggal_keluar, stok_keluar, penerima) VALUES ('$id_barang', '$tanggal_keluar', '$stok_keluar', '$penerima')");
//   if ($addtotable) {
//     header("location:barang-keluar.php");
//   } else {
//     echo "GAGAL";
//     header("location:barang-keluar.php");
//   }
// };

// if (isset($_POST["updatebarangkeluar"])) {
//   $id_barang = $_POST["id_barang"];
//   $tanggal_keluar = $_POST["tanggal_keluar"];
//   $stok_keluar = $_POST["stok_keluar"];
//   $penerima = $_POST["penerima"];
//   $idbk = $_POST["idbk"];

//   $update = mysqli_query($conn, "UPDATE barang_keluar SET id_barang='$id_barang', tanggal_keluar='$tanggal_keluar', stok_keluar='$stok_keluar', penerima='$penerima' WHERE id_barang_keluar='$idbk'");
//   if ($update) {
//     header("location:barang-keluar.php");
//   } else {
//     echo "Gagal";
//     header("location:barang-keluar.php");
//   }
// };

// if (isset($_POST['hapusbarangkeluar'])) {
//   $idbk = $_POST['idbk'];

//   $hapus = mysqli_query($conn, "DELETE FROM barang_keluar WHERE id_barang_keluar='$idbk'");
//   if ($hapus) {
//     header("location:barang-keluar.php");
//   } else {
//     echo "Gagal";
//     header("location:barang-keluar.php");
//   }
// };


// if (isset($_POST["masuk"])) {
//   $nama_barang = $_POST["nama_barang"];
//   $desk_barang = $_POST["deskripsi_barang"];
//   $stok = $_POST["stok_barang"];
//   $tanggal_masuk = $_POST["tanggal_masuk"];
//   $keterangan = $_POST["keterangan"];

//   if (checkDeskripsiBarangMasuk($desk_barang)) {
//     tambahStokBarangMasuk($desk_barang, $stok, $tanggal_masuk, $keterangan);
//   }

//   header("location: barang-masuk.php");
//   exit;
// }

// // Fungsi untuk mengecek apakah deskripsi_barang sudah ada dalam database
// function checkDeskripsiBarangMasuk($desk_barang) {
//   global $conn;

//   $desk_barang = mysqli_real_escape_string($conn, $desk_barang);

//   // Melakukan query untuk mencari deskripsi_barang dalam stok_barang
//   $query = "SELECT COUNT(*) as count FROM stok WHERE deskripsi_barang = '$desk_barang'";
//   $result = mysqli_query($conn, $query);
//   $row = mysqli_fetch_assoc($result);

//   // Mengembalikan false jika deskripsi_barang belum ada dalam database
//   if ($row['count'] == 0) {
//     return false;
//   }

//   return true;
// }

// // Fungsi untuk menambah stok barang yang masuk
// function tambahStokBarangMasuk($desk_barang, $stok, $tanggal_masuk, $keterangan) {
//   global $conn;

//   $desk_barang = mysqli_real_escape_string($conn, $desk_barang);
//   $stok = mysqli_real_escape_string($conn, $stok);
//   $tanggal_masuk = mysqli_real_escape_string($conn, $tanggal_masuk);
//   $keterangan = mysqli_real_escape_string($conn, $keterangan);

//   // Melakukan query untuk mendapatkan id_barang berdasarkan deskripsi_barang
//   $query = "SELECT id_barang FROM stok WHERE deskripsi_barang = '$desk_barang'";
//   $result = mysqli_query($conn, $query);
//   $row = mysqli_fetch_assoc($result);
//   $id_barang = $row['id_barang'];

//   // Menambahkan stok baru ke stok_barang
//   $query = "UPDATE stok SET stok_barang = stok_barang + $stok, tanggal_masuk = '$tanggal_masuk', keterangan = '$keterangan' WHERE deskripsi_barang = '$desk_barang'";
//   mysqli_query($conn, $query);
// }

// if (isset($_POST["keluar"])) {
//   $nama_barang = $_POST["nama_barang"];
//   $desk_barang = $_POST["deskripsi_barang"];
//   $stok = $_POST["stok_barang"];
//   $stok_keluar = $_POST["stok_keluar"];
//   $tanggal_keluar = $_POST["tanggal_keluar"];
//   $penerima = $_POST["penerima"];
//   $stok_sisa = $_POST["stok_sisa"];

//   if (checkDeskripsiBarangKeluar($desk_barang)) {
//     kurangiStokBarangKeluar($desk_barang, $stok_keluar);
//     tambahBarangKeluar($desk_barang, $stok, $tanggal_keluar, $penerima);
//   }

//   header("location: barang-keluar.php");
//   exit;
// }

// // Fungsi untuk mengecek apakah deskripsi_barang sudah ada dalam database
// function checkDeskripsiBarangKeluar($desk_barang) {
//   global $conn;

//   $desk_barang = mysqli_real_escape_string($conn, $desk_barang);

//   // Melakukan query untuk mencari deskripsi_barang dalam stok_barang
//   $query = "SELECT COUNT(*) as count FROM stok WHERE deskripsi_barang = '$desk_barang'";
//   $result = mysqli_query($conn, $query);
//   $row = mysqli_fetch_assoc($result);

//   // Mengembalikan false jika deskripsi_barang belum ada dalam database
//   if ($row['count'] == 0) {
//     return false;
//   }

//   return true;
// }


// // Fungsi untuk menambahkan data barang keluar
// function tambahBarangKeluar($desk_barang, $stok_keluar, $tanggal_keluar, $penerima) {
//   global $conn;

//   $desk_barang = mysqli_real_escape_string($conn, $desk_barang);
//   $tanggal_keluar = mysqli_real_escape_string($conn, $tanggal_keluar);
//   $penerima = mysqli_real_escape_string($conn, $penerima);

//   // Cek apakah deskripsi_barang sudah ada dalam database
//   $query = "SELECT COUNT(*) as count FROM stok WHERE deskripsi_barang = '$desk_barang'";
//   $result = mysqli_query($conn, $query);
//   $row = mysqli_fetch_assoc($result);

//   if ($row['count'] > 0) {
//     // Jika deskripsi_barang sudah ada, update data barang keluar
//     $query = "UPDATE stok SET stok_sisa = stok_barang - '$stok_keluar', tanggal_keluar = '$tanggal_keluar', stok_keluar = '$stok_keluar', penerima = '$penerima' WHERE deskripsi_barang = '$desk_barang'";
//   } else {
//     // Jika deskripsi_barang belum ada, insert data barang keluar
//     $query = "INSERT INTO stok (deskripsi_barang, stok_keluar, tanggal_keluar, penerima) VALUES ('$desk_barang', '$stok_keluar', '$tanggal_keluar', '$penerima')";
//   }

//   mysqli_query($conn, $query);
// }

// function kurangiStokBarangKeluar($desk_barang, $stok_keluar) {
//   global $conn;

//   $desk_barang = mysqli_real_escape_string($conn, $desk_barang);

//   // Mendapatkan nilai stok sisa yang baru
//   $query = "SELECT stok_barang FROM stok WHERE deskripsi_barang = '$desk_barang'";
//   $result = mysqli_query($conn, $query);
//   $row = mysqli_fetch_assoc($result);

//   $stok_barang = (int) $row['stok_barang'];  // Cast to integer
//   $stok_sisa = $stok_barang - $stok_keluar;  // Perform subtraction

//   // Mengupdate nilai stok sisa
//   $query = "UPDATE stok SET stok_sisa = $stok_sisa WHERE deskripsi_barang = '$desk_barang'";
//   mysqli_query($conn, $query);
// }
?>