<?php

$conn = mysqli_connect("localhost","root","","inventaris");


function sapa() {
    date_default_timezone_set('Asia/Jakarta'); // Sesuaikan dengan timezone Anda
    $waktu = date('H'); // Ambil jam saat ini
  
    if ($waktu < 12) {
      echo "Selamat pagi, pengunjung!";
    } elseif ($waktu < 18) {
      echo "Selamat siang, pengunjung!";
    } else {
      echo "Selamat malam, pengunjung!";
    }
  }
function register($data){
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $email = ($data["email"]);
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password_confirmation = mysqli_real_escape_string($conn, $data["password_confirmation"]);

    // cek data sudah terdaftar/belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

    if(mysqli_fetch_assoc($result)){
        echo "<script>
                alert('Username sudah terdaftar!');
            </script>";
        return false;
    }

    if( $password !== $password_confirmation){
    echo "<script>
        alert('konfirmasi password tidak sesuai!');
        </script>";

    return false;

    }
    // enkripsi agar aman
    $password = password_hash($password, PASSWORD_DEFAULT);
    
    // masukkan ke database
    mysqli_query($conn, "INSERT INTO user VALUES('','$username','$password','$email')");

    return mysqli_affected_rows($conn);
}

function login($username, $password) {
    global $conn;

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    // Cek apakah username ada di database
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        // Jika password cocok, return true
        if (password_verify($password, $row["password"])) {
            return true;
        }
    }

    // ?Jika username atau password tidak cocok, return false
    return false;
}

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
}

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
  var_dump($nama_barang);
  // var_dump('desk_barang' + $desk_barang);
  // var_dump('$stok' + $stok);
  // var_dump('tanggal_masuk' + $tanggal_masuk);
  // var_dump('tanggal_keluar' + $tanggal_keluar);
  // var_dump('berat' + $berat);
  // var_dump('panjang' + $panjang);
  // var_dump('lebar' + $lebar);
  // var_dump('tinggi' + $tinggi);
  // var_dump('idb' + $idb);

  $update = mysqli_query($conn, "update stok set nama_barang='$nama_barang', deskripsi_barang='$desk_barang', stok_barang='$stok', tanggal_masuk='$tanggal_masuk', tanggal_keluar='$tanggal_keluar', bobot_barang='$berat', panjang_barang='$panjang', lebar_barang='$lebar', tinggi_barang='$tinggi' where id_barang ='$idb'");
  if($update){
    header("location:update-barang.php");
  } else {
    echo "Gagal";
    header("location:update-barang.php");
  }
}

if(isset($_POST['hapusbarang'])){
  $idb = $_POST['idb'];

  $hapus = mysqli_query($conn, "delete from stok where id_barang='$idb'");
  if($hapus){
      header("location:delete-barang.php");
  } else {
      echo "Gagal";
      header("location:delete-barang.php");
  }
}
?>
