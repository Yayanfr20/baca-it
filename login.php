<?php

// mulai session
session_start();

if (isset($_SESSION['admin'])) {
  header("Location: admin-pages/");
  exit;
}

// panggil function
require 'admin-pages/functions.php';

$welcome = '';


// logic login
if (isset($_POST["login"])) {

  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($conn, "SELECT * FROM multi_user WHERE username = '$username'");

  if (mysqli_num_rows($result) === 1 ) {

    $row = mysqli_fetch_assoc($result);

    if (password_verify($password, $row["password"])) {

      if( $row['level'] == 'admin') {

        // set session
        $_SESSION['admin'] = $row['id']; 
        $_SESSION["welcome"] = $welcome;
        header("Location: admin-pages/.");

        exit;

      // } else if( $row['level'] == 'user') {
      //    // set session
      //   //  $_SESSION['users'] = $row['id'];
      //   //  $_SESSION["tentang"] = $tentang; 
      //   //  $_SESSION["welcome"] = $welcome;
      //    header("Location: users-pages/.");
      //    exit;
      }
    // }
  }

  }

  $error = true;
}

?>


                <!-- jika password atau username salah dan form kosong -->
                <?php if (isset($error)) {
                    echo "<script>
                    setTimeout(function () {
                      Swal.fire ({
                        title: 'Ooops!',
                        text: 'pastikan password dan username Anda terisi dengan benar',
                        icon: 'warning',
                        showConfirmButton: false,
                        timer: '2000'
                    });
                  },10);
                  </script>
                    ";
                  } ?>
                  <!-- end -->

<!DOCTYPE html>
<html class="h-100" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>BacaIT - Login</title>
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> -->
    <link href="admin-pages/css/style.css" rel="stylesheet" />

    <!-- start link favicon -->
    <link
      rel="apple-touch-icon-precomposed"
      sizes="57x57"
      href="favicon/apple-touch-icon-57x57.png"
    />
    <link
      rel="apple-touch-icon-precomposed"
      sizes="114x114"
      href="favicon/apple-touch-icon-114x114.png"
    />
    <link
      rel="apple-touch-icon-precomposed"
      sizes="72x72"
      href="favicon/apple-touch-icon-72x72.png"
    />
    <link
      rel="apple-touch-icon-precomposed"
      sizes="144x144"
      href="favicon/apple-touch-icon-144x144.png"
    />
    <link
      rel="apple-touch-icon-precomposed"
      sizes="60x60"
      href="favicon/apple-touch-icon-60x60.png"
    />
    <link
      rel="apple-touch-icon-precomposed"
      sizes="120x120"
      href="favicon/apple-touch-icon-120x120.png"
    />
    <link
      rel="apple-touch-icon-precomposed"
      sizes="76x76"
      href="favicon/apple-touch-icon-76x76.png"
    />
    <link
      rel="apple-touch-icon-precomposed"
      sizes="152x152"
      href="favicon/apple-touch-icon-152x152.png"
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
      href="favicon/favicon-96x96.png"
      sizes="96x96"
    />
    <link
      rel="icon"
      type="image/png"
      href="favicon/favicon-32x32.png"
      sizes="32x32"
    />
    <link
      rel="icon"
      type="image/png"
      href="favicon/favicon-16x16.png"
      sizes="16x16"
    />
    <link
      rel="icon"
      type="image/png"
      href="favicon/favicon-128.png"
      sizes="128x128"
    />


    <!-- panggil sweet alert -->
    <link rel="stylesheet" href="admin-pages/plugins/sweetalert2/dist/sweetalert2.min.css">
    <!-- akhir sweet alert -->

    <meta name="application-name" content="&nbsp;" />
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="mstile-144x144.png" />
    <meta name="msapplication-square70x70logo" content="mstile-70x70.png" />
    <meta name="msapplication-square150x150logo" content="mstile-150x150.png" />
    <meta name="msapplication-wide310x150logo" content="mstile-310x150.png" />
    <meta name="msapplication-square310x310logo" content="mstile-310x310.png" />
    <!-- end link favicon -->
  </head>

  <body class="h-100">
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

    <div class="login-form-bg h-100">
      <div class="container h-100">
        <div class="row justify-content-center h-100">
          <div class="col-xl-6">
            <div class="form-input-content">
              <div class="card login-form mb-0">
                <div class="card-body pt-5">
                  <div class="text-center">
                    <img src="admin-pages/logo/bacait text.png" alt="" />
                  </div>

                  <form action="" method="post" class="mt-5 login-input">
                    <div class="form-group">
                      <input
                        type="text"
                        class="form-control"
                        name="username"
                        placeholder="Username"
                      />
                    </div>
                    <div class="form-group">
                      <input
                        type="password"
                        class="form-control"
                        name="password"
                        placeholder="Password"
                      />
                    </div>
                   <button type="submit" class="btn login-form__btn submit w-100" name="login" >Login</button>
                    </input>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="admin-pages/plugins/common/common.min.js"></script>
    <script src="admin-pages/js/custom.min.js"></script>
    <script src="admin-pages/js/settings.js"></script>
    <script src="admin-pages/js/gleek.js"></script>
    <script src="admin-pages/js/styleSwitcher.js"></script>

    <!-- sweet alert -->
    <script src="admin-pages/plugins/sweetalert/js/sweetalert2.all.min.js"></script>
    <script src="admin-pages/plugins/sweetalert/js/jquery-3.6.0.min.js"></script>

  </body>
</html>