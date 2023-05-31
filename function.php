<?php

$conn = mysqli_connect("localhost","root","","inventaris");

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

function getLoggedInUsername() {
  // untuk mendapatkan username dari akun yang sedang login
  if (isset($_SESSION['username'])) {
    return $_SESSION['username'];
  }

  return null;
}

$usernameFromDatabase = getLoggedInUsername();

$username = $usernameFromDatabase;
function sapa() {
  global $username;
  date_default_timezone_set('Asia/Jakarta'); // Sesuaikan dengan timezone Anda
  $waktu = date('H'); // Ambil jam saat ini

  if ($waktu < 10) {
    echo "Selamat pagi, ", $username;
  } elseif ($waktu < 15) {
    echo "Selamat siang, ", $username;
  } elseif ($waktu < 19) {
    echo "Selamat sore, ", $username;
  } else {
    echo "Selamat malam, ",$username;
  }
}
?>
