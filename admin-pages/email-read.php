<?php 
  // mulai session
session_start();
if (!isset($_SESSION["admin"])) {
    header("Location: ../.");
    exit;
}

$id = $_GET['id'];

require 'functions.php';

$chat = query("SELECT * FROM chat_users WHERE id = $id")[0];

$listChat = mysqli_query($conn, "SELECT * FROM chat_users");
$daftarChat = mysqli_fetch_assoc($listChat);

// // hitung pesan dan ambil dari database
  $jumlahChat = count(query("SELECT * FROM chat_users"));



















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
                  </div>
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
        <div class="row page-titles mx-0">
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="email-left-box"><a href="email-inbox" class="btn btn-primary btn-sm">Kembali</a>
                                <div class="mail-list mt-4"><a href="email-inbox" class="list-group-item border-0 text-primary p-r-0"><i class="fa fa-inbox font-18 align-middle mr-2"></i> <b>Inbox</b> <span class="badge badge-primary badge-sm float-right m-t-5"><?= $jumlahChat; ?></span> </a><a href="delete-mail?id= <?= $chat ['id']; ?>" class="list-group-item border-0 p-r-0"><i class="fa fa-trash font-18 align-middle mr-2 text-danger" onclick="return confirm('yakin');"></i>Delete</a>
                                </div>
                            </div>
                            <div class="email-right-box">
                                <div class="read-content">
                                    <div class="media pt-5">
                                    <i class="fas fa-circle-user mr-3" style="font-size:50px;"></i>
                                        <div class="media-body">
                                            <h5 class="m-b-3"><?= $chat['email']; ?></h5>
                                            <p class="m-b-2"><?= $chat ['tgl']; ?></p>
                                        </div>
                                        
                                    </div>
                                    <hr>
                                    <div class="media mb-4 mt-1">
                                        <div class="media-body"><span class="float-right"><?= $chat['waktu']; ?></span>
                                        </div>
                                    </div>
                                    <h5 class="m-b-15">Hi, Admin</h5>
                                    <p><?= $chat['pesan']; ?></p>
                                    <hr>
                                </div>
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
