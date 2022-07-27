<?php 

// koneksi database
$host = "localhost";
$username = "root";
$password = "";
$db = "baca-it";

$conn = mysqli_connect($host, $username, $password, $db);

// query database
function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows [] = $row;
    }
    return $rows;
}

// delete ebook
function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM ebook WHERE id = $id");
    return mysqli_affected_rows($conn);

}

// upload ebook
function tambah($data) {
    global $conn;
    $judul = htmlspecialchars($data["judul"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $pdf = uploadpdf();
    $img = uploadcover();
    $tglupload = htmlspecialchars($data["tglupload"]);
    if(!$pdf) {
        return false;
    }

    if (!$img) {
        return false;
    }

$query = "INSERT INTO ebook VALUES ('', '$judul', '$deskripsi', '$pdf', '$img', '$tglupload')";

mysqli_query($conn, $query);

return mysqli_affected_rows($conn);

}


// upload pdf

function uploadpdf() {

	$namaFile = $_FILES['pdf']['name'];
	$ukuranFile = $_FILES['pdf']['size'];
	$error = $_FILES['pdf']['error'];
	$tmpName = $_FILES['pdf']['tmp_name'];

	// cek apakah tidak ada gambar yang diupload
	if( $error === 4 ) {
		echo "<script>
				alert('pilih file terlebih dahulu!');
			  </script>";
		return false;
	}

	// cek apakah yang diupload adalah gambar
	$ekstensiGambarValid = ['zip', 'rar'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
		echo "<script>
				alert('yang anda upload bukan file!');
			  </script>";
		return false;
	}

	// cek jika ukurannya terlalu besar
	if( $ukuranFile > 100000000 ) {
		echo "<script>
				alert('ukuran file terlalu besar!');
			  </script>";
		return false;
	}

	// lolos pengecekan, gambar siap diupload
	// generate nama gambar baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, 'pdf/' . $namaFileBaru);

	return $namaFileBaru;
}

// upload cover
function uploadcover() {

	$namaFile = $_FILES['cover']['name'];
	$ukuranFile = $_FILES['cover']['size'];
	$error = $_FILES['cover']['error'];
	$tmpName = $_FILES['cover']['tmp_name'];

	// cek apakah tidak ada gambar yang diupload
	if( $error === 4 ) {
		echo "<script>
				alert('pilih gambar terlebih dahulu!');
			  </script>";
		return false;
	}

	// cek apakah yang diupload adalah gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
		echo "<script>
				alert('yang anda upload bukan gambar!');
			  </script>";
		return false;
	}

	// cek jika ukurannya terlalu besar
	if( $ukuranFile > 10000000 ) {
		echo "<script>
				alert('ukuran gambar terlalu besar!');
			  </script>";
		return false;
	}

	// lolos pengecekan, gambar siap diupload
	// generate nama gambar baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, 'cover/' . $namaFileBaru);

	return $namaFileBaru;
}

    ////////////////// function registration /////////////////
    // function regisadmin($data) {
    //     global $conn;

    //     $username = stripslashes($data['username']);
    //     $password = mysqli_real_escape_string(($conn, $data['password']));
    //     $password2 = mysqli_real_escape_string($conn, $data['password2'])
    //     $level = mysqli_real_escape_string($conn, $data['level']);

    //     $admin = myqli_query($conn, "SELECT username from multi_user WHERE username = '$username' ");

    //     if(mysqli_fetch_assoc($admin)) {
    //         echo "<script>
    //                 alert('nama yang anda pilih sekaran sudah digunakan, pilih username lain!');
    //                 document.location.href = 'halaman yang dituju'
    //               </script>"

    //               return false;
    //     }

    //     // cek kesamaan password
    //     if($password !== $password2) {
    //         echo "<script>
    //         alert('password yang anda masukkan tidak sesuai!');
    //         document.location.href = 'alamat yang dituju';
    //               </script>"

    //               return false;
    //     }

    //     // enksripsi password
    //     $password = password_hash($password, PASSWORD_DEFAULT);

    //     // masukkan data user/admin ke database
    //     mysqli_query($conn, "INSERT INTO multi_user VALUES(NULL, '$username', '$password', '$level')");
    //     mysqli_query($conn, "INSERT INTO admin VALUES(NULL, '$username', '$password', '$level')");

    //     return mysqli_affected_rows($conn);

    // }


function kirimpesan($data) {
        global $conn;
            $nama = htmlspecialchars($data['name']);
            $email = htmlspecialchars($data['email']);
            $pesan = htmlspecialchars($data['message']);
            $waktu = htmlspecialchars($data['waktu']);


        $query = "INSERT INTO chat_users VALUES ('', '$nama', '$email', '$pesan', '$waktu')";

        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);


}

?>