<?php 

// mulai session
session_start();
if (!isset($_SESSION["admin"])) {
    header("Location: ../.");
    exit;
}


require 'functions.php';

$id = $_GET["id"];

if( delmail($id) > 0 ) {
	echo "
		<script>
			alert('mail berhasil dihapus!');
			document.location.href = 'email-read';
		</script>
	";
} else {
	echo "
		<script>
			alert('mail gagal di hapus');
			document.location.href = 'email-read';
		</script>
	";
}

?>