<?php 

require 'functions.php';

// mulai session
session_start();
if (!isset($_SESSION["admin"])) {
    header("Location: ../.");
    exit;
}

  $totalEbook = count(query("SELECT * FROM ebook"));
  $totalAdmin = count(query("SELECT * FROM admin"));
  $totalPesan = count(query("SELECT * FROM chat_users"));

  // <!-- cetak session login -->
  if ($_SESSION['admin']) {
    $login = $_SESSION['admin'];

    $result = mysqli_query($conn, "SELECT * FROM multi_user WHERE id = '$login'");
    $data = mysqli_fetch_assoc($result);
  } 
  // akhir cetak session Login
  
  // notifikasi
  $infoupload = query("SELECT * FROM ebook ORDER BY id DESC");


  // data login user
  // <!-- cetak session login -->
  if ($_SESSION['admin']) {
    $login = $_SESSION['admin'];

    $result = mysqli_query($conn, "SELECT * FROM multi_user WHERE id = '$login'");
    $data = mysqli_fetch_assoc($result);
  } 
  // akhir cetak session Login


  // ambil data dri dtabase chat_user
  $chat = mysqli_query($conn, "SELECT * FROM chat_users");

  $dataChat = mysqli_fetch_assoc($chat);


























 ?>



<?php if (isset($_SESSION['welcome'])) {
  echo "<script>
          setTimeout(function () {
            Swal.fire ({
              title: 'Ooops!',
              text: 'pastikan password dan username Anda terisi dengan benar',
              icon: 'warning',
              timer: '3200'
          });
        },10);
        </script>
        ";

  unset($_SESSION['welcome']);
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Bacait - Admin Dashboard</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png" />
    <!-- Pignose Calender -->
    <link
      href="./plugins/pg-calendar/css/pignose.calendar.min.css"
      rel="stylesheet"
    />
    <!-- Chartist -->
    <link rel="stylesheet" href="./plugins/chartist/css/chartist.min.css" />
    <link
      rel="stylesheet"
      href="./plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css"
    />
    <!-- Custom Stylesheet -->
    <link href="css/style.css" rel="stylesheet" />

    <!-- start link favicon -->
    <link
      rel="apple-touch-icon-precomposed"
      sizes="57x57"
      href="../favicon/apple-touch-icon-57x57.png"
    />
    <link
      rel="apple-touch-icon-precomposed"
      sizes="114x114"
      href="../favicon/apple-touch-icon-114x114.png"
    />
    <link
      rel="apple-touch-icon-precomposed"
      sizes="72x72"
      href="../favicon/apple-touch-icon-72x72.png"
    />
    <link
      rel="apple-touch-icon-precomposed"
      sizes="144x144"
      href="../favicon/apple-touch-icon-144x144.png"
    />
    <link
      rel="apple-touch-icon-precomposed"
      sizes="60x60"
      href="../favicon/apple-touch-icon-60x60.png"
    />
    <link
      rel="apple-touch-icon-precomposed"
      sizes="120x120"
      href="../favicon/apple-touch-icon-120x120.png"
    />
    <link
      rel="apple-touch-icon-precomposed"
      sizes="76x76"
      href="../favicon/apple-touch-icon-76x76.png"
    />
    <link
      rel="apple-touch-icon-precomposed"
      sizes="152x152"
      href="../favicon/apple-touch-icon-152x152.png"
    />
    <link
      rel="icon"
      type="image/png"
      href="favicon-196x196.png"
      sizes="196x196"
    />
    <link
      rel="icon"
      type="image/png"
      href="../favicon/favicon-96x96.png"
      sizes="96x96"
    />
    <link
      rel="icon"
      type="image/png"
      href="../favicon/favicon-32x32.png"
      sizes="32x32"
    />
    <link
      rel="icon"
      type="image/png"
      href="../favicon/favicon-16x16.png"
      sizes="16x16"
    />
    <link
      rel="icon"
      type="image/png"
      href="../favicon/favicon-128.png"
      sizes="128x128"
    />

    <!-- panggil font awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- akhir font awesome -->

    <meta name="application-name" content="&nbsp;" />
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="mstile-144x144.png" />
    <meta name="msapplication-square70x70logo" content="mstile-70x70.png" />
    <meta name="msapplication-square150x150logo" content="mstile-150x150.png" />
    <meta name="msapplication-wide310x150logo" content="mstile-310x150.png" />
    <meta name="msapplication-square310x310logo" content="mstile-310x310.png" />
    <!-- end link favicon -->
  </head>

  <body>
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
      <div class="loader">
        <svg class="circular" viewBox="25 25 50 50">
          <circle
            class="path"
            cx="50"
            cy="50"
            r="20"
            fill="none"
            stroke-width="3"
            stroke-miterlimit="10"
          />
        </svg>
      </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">
      <!--**********************************
            Nav header start
        ***********************************-->
      <div class="nav-header">
        <div class="brand-logo">
          <a href=".">
            <b class="logo-abbr"
              ><img src="logo/it-logo-6882B7887A-seeklogo.com.png" alt="" />
            </b>
            <span class="logo-compact"
              ><img src="./images/logo-compact.png" alt=""
            /></span>
            <span class="brand-title">
              <img src="logo/bacait text.png" alt="" />
            </span>
          </a>
        </div>
      </div>
      <!--**********************************
            Nav header end
        ***********************************-->

      <!--**********************************
            Header start
        ***********************************-->
      <div class="header">
        <div class="header-content clearfix">
          <div class="nav-control">
            <div class="hamburger">
              <span class="toggle-icon"><i class="icon-menu"></i></span>
            </div>
          </div>
          <div class="header-right">
            <ul class="clearfix">
              <li class="icons dropdown">
                <a href="javascript:void(0)" data-toggle="dropdown">
                  <i class="mdi mdi-email-outline"></i>
                  <span class="badge badge-pill gradient-2"><?= $totalPesan;?></span>
                </a>
                <div
                  class="drop-down animated fadeIn dropdown-menu dropdown-notfication"
                >
                  <div
                    class="dropdown-content-heading d-flex justify-content-between"
                  >
                    <h4 class="">Notifications</h4>

                    <!-- logic jika tidak ada pesan masuk -->
                    <?php
                    if ($dataChat == 0) {
                      echo "<h6 class='mt-5' style='margin-right: 60px;'><i class='fa-solid fa-ban'></i> tidak ada pesan</h6>";
                    }
                    ?>
                  </div>

                  
                  <!-- foreach data -->
                  <?php foreach($chat as $row) : ?>
                  <div class="dropdown-content-body">
                    <ul>
                      <li>
                          <span class="mr-3 avatar-icon bg-success-lighten-2"
                            ><i class="mdi mdi-email-outline"></i
                          ></span>
                          <div class="notification-content">
                            <h6 class="notification-heading">
                              <?= $row['email']; ?>
                            </h6>
                            <span class="notification-text"
                              ><?= $row['pesan']; ?></span
                            >
                          </div>
                      </li>
                    </ul>
                  </div>
                  <?php endforeach; ?>
                  <!-- end foreach -->

                  <!-- logic jika tidak ada pesan tombol detail off -->
                  <?php
                  if ($dataChat == 0) {
                    echo'';
                  } else {
                    echo'<a href="email-inbox"><div class="btn btn-danger btn-sm mt-4 m-2">Detail</div></a>';
                  }
                  ?>


                </div>
              </li>
              <li class="icons dropdown">
                <div
                  class="user-img c-pointer position-relative"
                  data-toggle="dropdown"
                >
                  <span class="activity active"></span>
                  <img
                    src="images/profile/profile.jpg"
                    height="40"
                    width="40"
                    alt=""
                  />
                </div>
                <div
                  class="drop-down dropdown-profile animated fadeIn dropdown-menu"
                >
                  <div class="dropdown-content-body">
                    <ul>
                      <li>
                        <a href="app-profile"
                          ><i class="icon-user"></i> <span>Profile</span></a
                        >
                      </li>
                      <hr class="my-2" />
                      <li>
                        <a href="logout"
                          ><i class="icon-logout"></i> <span>Logout</span></a
                        >
                      </li>
                    </ul>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

      <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">
          <div class="nk-nav-scroll">
            <ul class="metismenu" id="menu">
            <li class="nav-label">Menu</li>
            <li>
              <a href="." aria-expanded="false">
                <i class="icon-speedometer menu-icon"></i
                ><span class="nav-text">Dashboard</span>
              </a>
            </li>
            <li>
              <a href="admin" aria-expanded="false">
              <i class="fas fa-user-gear"></i
                  ><span class="nav-text">Admin</span>
              </a>
            </li>
            <li>
              <a href="users" aria-expanded="false">
              <i class="fas fa-users"></i
                  ><span class="nav-text">Users</span>
              </a>
            </li>
            <li>
              <a href="app-upload" aria-expanded="false">
                <i class="fas fa-upload"></i
                ><span class="nav-text">Upload Ebook</span>
              </a>
            </li>
            <li>
              <a href="daftar-ebook" aria-expanded="false">
              <i class="fa-solid fa-list"></i><span class="nav-text">Daftar Ebook</span>
              </a>
            </li>
            <li>
              <a href="email-inbox" aria-expanded="false">
              <i class="fas fa-envelope"></i><span class="nav-text">Inbox</span>
              </a>
            </li>
            <li>
              <a href="widgets" aria-expanded="false">
              <i class="fa-solid fa-code-pull-request"></i><span class="nav-text">Daftar Request Ebook</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
      <!--**********************************
            Sidebar end
        ***********************************-->

      <!--**********************************
            Content body start
        ***********************************-->
      <div class="content-body">
        <div class="container-fluid mt-3">
          <div class="row">
            <div class="col-lg-3 col-sm-6">
              <div class="card gradient-1">
                <div class="card-body">
                  <h3 class="card-title text-white">Jumlah Ebook</h3>
                  <div class="d-inline-block">
                    <h2 class="text-white"><?= $totalEbook; ?></h2>
                  </div>
                  <span class="float-right display-5 opacity-5"
                    ><i class="fa fa-book"></i
                  ></span>
                  <br>
                  <a href=""><div class="btn btn-primary btn-sm mt-4">Detail</div></a>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6">
              <div class="card gradient-2">
                <div class="card-body">
                  <h3 class="card-title text-white">Request Ebook</h3>
                  <div class="d-inline-block">
                    <h2 class="text-white">8541</h2>
                  </div>
                  <span class="float-right display-5 opacity-5"
                    ><i class="fa-solid fa-code-pull-request"></i></span>
                    <br>
                  <a href=""><div class="btn btn-danger btn-sm mt-4">Detail</div></a>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6">
              <div class="card gradient-3">
                <div class="card-body">
                  <h3 class="card-title text-white">Jumlah Pengguna</h3>
                  <div class="d-inline-block">
                    <h2 class="text-white">4565</h2>
                  </div>
                  <span class="float-right display-5 opacity-5"
                    ><i class="fas fa-users"></i
                  ></span>
                  <br>
                  <a href=""><div class="btn btn-warning btn-sm mt-4">Detail</div></a>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6">
              <div class="card gradient-4">
                <div class="card-body">
                  <h3 class="card-title text-white">Admin</h3>
                  <div class="d-inline-block">
                    <h2 class="text-white"><?= $totalAdmin; ?></h2>
                  </div>
                  <span class="float-right display-5 opacity-5"
                    ><i class="fas fa-user-gear"></i
                  ></span>
                  <br>
                  <a href=""><div class="btn btn-info btn-sm mt-4">Detail</div></a>
                </div>
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-xl-3 col-lg-6 col-sm-6 col-xxl-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Aktivitas Upload E-book</h4>
                  <!-- cek jika tidak ada data ebook di upload -->
                  <?php
                  if($totalEbook == 0) {
                    echo "<h3 class='text-center'>Tidak ada ebook yang telah di upload</h3>";
                  }

                  ?>
                  <!-- end -->
                  <div id="activity">
                    <?php foreach($infoupload as $info) : ?>
                    <div class="media border-bottom-1 pt-3 pb-3">
                      <img
                        width="35"
                        src="./images/avatar/1.jpg"
                        class="mr-3 rounded-circle"
                      />
                      <div class="media-body">
                        <h5><?= $data['username']; ?></h5>
                        <p class="mb-0">
                          <?= '<span class="text-danger">Judul : </span>'. $info['judul']. 
                              '<br>'.
                              '<span class="text-danger">Deskripsi : </span>'. $info['deskripsi']
                               ?>
                        </p>
                      </div>
                      <span class="text-muted"><?= $info['tglupload']; ?></span>
                    </div>
                    <br>
                    <?php endforeach; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- #/ container -->
      </div>
      <!--**********************************
            Content body end
        ***********************************-->

      <!--**********************************
            Footer start
        ***********************************-->
      <div class="footer">
        <div class="copyright">
          <p>
            Copyright &copy; Designed & Developed by
            <a href="https://themeforest.net/user/quixlab">Bacait</a> 2018
          </p>
        </div>
      </div>
      <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="plugins/common/common.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/gleek.js"></script>
    <script src="js/styleSwitcher.js"></script>

    <!-- Chartjs -->
    <script src="./plugins/chart.js/Chart.bundle.min.js"></script>
    <!-- Circle progress -->
    <script src="./plugins/circle-progress/circle-progress.min.js"></script>
    <!-- Datamap -->
    <script src="./plugins/d3v3/index.js"></script>
    <script src="./plugins/topojson/topojson.min.js"></script>
    <script src="./plugins/datamaps/datamaps.world.min.js"></script>
    <!-- Morrisjs -->
    <script src="./plugins/raphael/raphael.min.js"></script>
    <script src="./plugins/morris/morris.min.js"></script>
    <!-- Pignose Calender -->
    <script src="./plugins/moment/moment.min.js"></script>
    <script src="./plugins/pg-calendar/js/pignose.calendar.min.js"></script>
    <!-- ChartistJS -->
    <script src="./plugins/chartist/js/chartist.min.js"></script>
    <script src="./plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>

    <script src="./js/dashboard/dashboard-1.js"></script>
  </body>
</html>
