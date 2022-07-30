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


// delete mail
function delmail($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM ebook WHERE id = $id");
    return mysqli_affected_rows($conn);

}




// upload pdf
function uploadpdf() {

	$namaFile = $_FILES['pdf']['name'];
	$error = $_FILES['pdf']['error'];
	$tmpName = $_FILES['pdf']['tmp_name'];

	// cek apakah tidak ada file pdf yang diupload
	if( $error === 4 ) {
		echo "<script>
		setTimeout(function () {
		  Swal.fire ({
			title: 'Oops!',
			text: 'Pilih file pdf terlebih dahulu',
			icon: 'warning',
			showConfirmButton : false,
			timer: '3500'
		});
	  },10);
	  </script>";
		return false;
	}

	// cek apakah yang diupload adalah file pdf
	$ekstensiGambarValid = ['pdf'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));

	if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
		echo "<script>
		setTimeout(function () {
		  Swal.fire ({
			title: 'Oops!',
			text: 'Yang Anda upload bukan file pdf',
			icon: 'warning',
			showConfirmButton : false,
			timer: '3500'
		});
	  },10);
	  </script>";
		return false;
	}

	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, 'pdf/' . $namaFileBaru);

	return $namaFileBaru;
}







// upload cover
function uploadcover() {

	$namaFile = $_FILES['cover']['name'];
	$error = $_FILES['cover']['error'];
	$tmpName = $_FILES['cover']['tmp_name'];

	// cek apakah tidak ada gambar yang diupload
	if( $error === 4 ) {
		echo "<script>
		setTimeout(function () {
		  Swal.fire ({
			title: 'Oops!',
			text: 'Pastika semua form terisi dengan benar',
			icon: 'warning',
			showConfirmButton: false,
			timer: '3500'
		});
	  },10);
	  </script>";

		return false;
	}

	// cek apakah yang diupload adalah gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
		echo "<script>
		setTimeout(function () {
		  Swal.fire ({
			title: 'Oops!',
			text: 'Yang Anda upload bukan file gambar',
			icon: 'warning',
			showConfirmButton : false,
			timer: '3500'
		});
	  },10);
	  </script>";

		return false;
	}


	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, 'cover/' . $namaFileBaru);

	return $namaFileBaru;
}



// upload ebook
function tambah($data) {
    global $conn;
    $judul = htmlspecialchars($data["judul"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $pdf = uploadpdf();
    $img = uploadcover();
    $tglupload = htmlspecialchars($data["tglupload"]);
    $admin_file_upload = htmlspecialchars($data["admin_file_upload"]);
    $waktu = htmlspecialchars($data["waktu"]);

    if(!$pdf) {
        return false;
    } echo "<script>
	setTimeout(function () {
	  Swal.fire ({
		title: 'Oops!',
		text: 'File pdf gagal di upload!',
		icon: 'error',
		showConfirmButton : false,
		timer: '3500'
	});
  },10);
  </script>";


    if (!$img) {

        return false;

    } echo "<script>
	setTimeout(function () {
	  Swal.fire ({
		title: 'Oops!',
		text: 'File gambar gagal di upload!',
		icon: 'error',
		showConfirmButton : false,
		timer: '3500'
	});
  },10);
  </script>";


$query = "INSERT INTO ebook VALUES ('', '$judul', '$deskripsi', '$pdf', '$img', '$tglupload', '$admin_file_upload', '$waktu')";

mysqli_query($conn, $query);

return mysqli_affected_rows($conn);

}










// function kirim pesan

function kirimpesan($data) {
        global $conn;
            $nama = htmlspecialchars($data['name']);
            $email = htmlspecialchars($data['email']);
            $pesan = htmlspecialchars($data['message']);
            $waktu = htmlspecialchars($data['waktu']);
            $tgl = htmlspecialchars($data['tgl']);


        $query = "INSERT INTO chat_users VALUES ('', '$nama', '$email', '$pesan', '$waktu', '$tgl')";

        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);


}

?>


<!-- assets sweetlaert -->

	<!-- sweet alert -->
    <script src="plugins/sweetalert/js/sweetalert2.all.min.js"></script>
    <script src="plugins/sweetalert/js/jquery-3.6.0.min.js"></script>