<?php 

// mulai session
session_start();
if (!isset($_SESSION["admin"])) {
    header("Location: ../.");
    exit;
}


require 'functions.php';

$id = $_GET["id"];

if( hapus($id) > 0 ) {
	echo "
		<script>
			alert('book berhasil dihapus!');
			document.location.href = 'daftar-ebook';
		</script>
	";
} else {
	echo "
		<script>
			alert('book gagal ditambahkan!');
			document.location.href = 'daftar-ebook';
		</script>
	";
}

?>


<!-- assets sweetlaert -->

	<!-- sweet alert -->
    <script src="plugins/sweetalert/js/sweetalert2.all.min.js"></script>
    <script src="plugins/sweetalert/js/jquery-3.6.0.min.js"></script>