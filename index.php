<?php

// muali session
session_start();
if (isset($_SESSION["admin"])) {
  header("Location: admin-pages/");
  exit;
}

// if (!isset($_SESSION["login"])) {
//   header("Location: admin-pages/");
//   exit;
// }

// if (isset($_SESSION["staff"])) {
//   header("Location: staff/.");
//   exit;
// }
require 'admin-pages/functions.php';

if( isset($_POST['buttonPesan']) ) {
  if( kirimpesan($_POST) > 0) {
    echo "
    <script>
    setTimeout(function () {
      Swal.fire ({
        title: 'Success!',
        text: 'Pesan Anda berhasil terkirim, Terimakasih',
        icon: 'success',
        timer: '3500'
    });
  },10);
  </script>";
  }else {
    "
    <script>
    setTimeout(function () {
      Swal.fire ({
        title: 'Ooops!',
        text: 'Mohon maaf, pesan Anda gagal terkirim!',
        icon: 'error',
        timer: '3500'
    });
  },10);
  </script>";
  }
}


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, maximum-scale=1"
    />

    <title>Baca IT</title>
    <!--
App Starter Template
http://www.templatemo.com/tm-492-app-starter
-->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/animate.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />

    <link rel="stylesheet" href="css/magnific-popup.css" />

    <link rel="stylesheet" href="css/owl.theme.css" />
    <link rel="stylesheet" href="css/owl.carousel.css" />

    <link
      href="https://fonts.googleapis.com/css?family=Unica+One"
      rel="stylesheet"
      type="text/css"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,700"
      rel="stylesheet"
      type="text/css"
    />

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css" />

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
    <meta name="application-name" content="&nbsp;" />
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="mstile-144x144.png" />
    <meta name="msapplication-square70x70logo" content="mstile-70x70.png" />
    <meta name="msapplication-square150x150logo" content="mstile-150x150.png" />
    <meta name="msapplication-wide310x150logo" content="mstile-310x150.png" />
    <meta name="msapplication-square310x310logo" content="mstile-310x310.png" />
    <!-- end link favicon -->
  </head>
  <body data-spy="scroll" data-target=".navbar-collapse" data-offset="50">
    <!-- PRE LOADER -->

    <div class="preloader">
      <div class="sk-spinner sk-spinner-pulse"></div>
    </div>

    <!-- Navigation Section -->

    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button
            class="navbar-toggle"
            data-toggle="collapse"
            data-target=".navbar-collapse"
          >
            <span class="icon icon-bar"></span>
            <span class="icon icon-bar"></span>
            <span class="icon icon-bar"></span>
          </button>
          <a href="." class="navbar-brand"><span>Baca</span> IT</a>
        </div>

        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#home" class="smoothScroll">Beranda</a></li>
            <li><a href="#about" class="smoothScroll">Tentang kami</a></li>
            <li><a href="#screenshot" class="smoothScroll">Preview</a></li>
            <li><a href="#pricing" class="smoothScroll">Coba Baca IT</a></li>
            <li><a href="#newsletter" class="smoothScroll">Bantu kami</a></li>
            <li>
              <a href="#" data-toggle="modal" data-target="#modal1">Kontak</a>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Home Section -->

    <section id="home" class="main">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-7 col-xs-12">
            <div class="home-thumb">
              <h1 class="wow fadeInUp" data-wow-delay="0.6s">Baca IT</h1>
              <p class="wow fadeInUp" data-wow-delay="0.8s">
                Web Belajar coding Gratis tanpa embel embel pembayaran
              </p>
              <ul style="list-style: none; display: flex;">
                <li>
                  <a
                href="register"
                class="wow fadeInUp section-btn btn smoothScroll"
                data-wow-delay="1s" style="background-color: white; color:black; margin:5px;"
                >DAFTAR</a>
                </li>
                <li>
                  <a
                href="login"
                class="wow fadeInUp section-btn btn  smoothScroll" style="color: black; margin: 5px;"
                data-wow-delay="1s"
                >MASUK</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- About Section -->

    <section id="about">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12">
            <div class="wow bounceIn section-title">
              <h1>selamat datang di Baca IT</h1>
              <hr />
            </div>
          </div>

          <div class="wow fadeInUp col-md-6 col-sm-12" data-wow-delay="0.4s">
            <h2>Develover Team</h2>
            <h3 class="wow fadeInUp" data-wow-delay="0.8s">
              Baca IT di buat oleh kedua orang pria yang senang membagikan ilmu
              nya.
            </h3>
            <p class="wow fadeInUp" data-wow-delay="0.4s">
              Mereka adalah orang yang haus akan ilmu.
            </p>
          </div>

          <div class="wow fadeInUp col-md-3 col-sm-6" data-wow-delay="0.4s">
            <div class="about-thumb">
              <img
                src="images/team-img1.jpg"
                class="img-responsive"
                alt="Team"
                style="height: 300px"
              />
              <div class="about-overlay">
                <h3>Yayan Fathurohman</h3>
                <h4>Programmer</h4>
                <br />
                <h5>
                  <a href="http://yanz.epizy.com" target="_blank"
                    >kenali Yayan
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="16"
                      height="16"
                      fill="currentColor"
                      class="bi bi-arrow-bar-right"
                      viewBox="0 0 16 16"
                    >
                      <path
                        fill-rule="evenodd"
                        d="M6 8a.5.5 0 0 0 .5.5h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L12.293 7.5H6.5A.5.5 0 0 0 6 8zm-2.5 7a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5z"
                      /></svg
                  ></a>
                </h5>
              </div>
            </div>
          </div>

          <div class="wow fadeInUp col-md-3 col-sm-6" data-wow-delay="0.4s">
            <div class="about-thumb">
              <img
                src="images/team-img2.png"
                class="img-responsive"
                alt="Team"
                style="height: 300px"
              />
              <div class="about-overlay">
                <h3>Ferlan ferlani</h3>
                <h4>Programmer</h4>
                <br />
                <h5>
                  <a href="http://ferlanferlani.rf.gd" target="_blank"
                    >kenali Ferlan
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="16"
                      height="16"
                      fill="currentColor"
                      class="bi bi-arrow-bar-right"
                      viewBox="0 0 16 16"
                    >
                      <path
                        fill-rule="evenodd"
                        d="M6 8a.5.5 0 0 0 .5.5h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L12.293 7.5H6.5A.5.5 0 0 0 6 8zm-2.5 7a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5z"
                      /></svg
                  ></a>
                </h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Divider Section -->

    <section id="divider">
      <div class="container">
        <div class="row">
          <div class="col-md-offset-2 col-md-8 col-sm-12">
            <h2 class="wow fadeInUp" data-wow-delay="0.4s">
              Baca IT adalah web belajar coding untuk pemula metode pembelajaran
              yang diajarkan ialah text bacaan dan pdf.
            </h2>
            <a
              href="register"
              class="wow fadeInUp section-btn btn btn-success smoothScroll"
              data-wow-delay="0.8s"
              >Daftar sekarang</a
            >
          </div>
        </div>
      </div>
    </section>

    <!-- Screenshot Section -->

    <section id="screenshot">
      <div class="container">
        <div class="row">
          <div class="col-md-offset-2 col-md-8 col-sm-12">
            <div class="section-title">
              <h1>App Preview</h1>
              <p class="wow fadeInUp" data-wow-delay="0.8s">
                Berikut beberapa priview dari Baca IT
              </p>
            </div>
          </div>

          <!-- Screenshot Owl Carousel -->
          <div id="screenshot-carousel" class="owl-carousel">
            <div
              class="item col-md-3 col-sm-3 wow fadeInUp"
              data-wow-delay="0.9s"
            >
              <a href="images/screenshot-img1.jpg" class="image-popup">
                <img
                  src="images/screenshot-img1.jpg"
                  class="img-responsive"
                  alt="screenshot"
                />
              </a>
            </div>

            <div
              class="item col-md-3 col-sm-3 wow fadeInUp"
              data-wow-delay="0.9s"
            >
              <a href="images/screenshot-img2.jpg" class="image-popup">
                <img
                  src="images/screenshot-img2.jpg"
                  class="img-responsive"
                  alt="screenshot"
                />
              </a>
            </div>

            <div
              class="item col-md-3 col-sm-3 wow fadeInUp"
              data-wow-delay="0.9s"
            >
              <a href="images/screenshot-img3.jpg" class="image-popup">
                <img
                  src="images/screenshot-img3.jpg"
                  class="img-responsive"
                  alt="screenshot"
                />
              </a>
            </div>

            <div
              class="item col-md-3 col-sm-3 wow fadeInUp"
              data-wow-delay="0.9s"
            >
              <a href="images/screenshot-img4.jpg" class="image-popup">
                <img
                  src="images/screenshot-img4.jpg"
                  class="img-responsive"
                  alt="screenshot"
                />
              </a>
            </div>

            <div
              class="item col-md-3 col-sm-3 wow fadeInUp"
              data-wow-delay="0.9s"
            >
              <a href="images/screenshot-img5.jpg" class="image-popup">
                <img
                  src="images/screenshot-img5.jpg"
                  class="img-responsive"
                  alt="screenshot"
                />
              </a>
            </div>

            <div
              class="item col-md-3 col-sm-3 wow fadeInUp"
              data-wow-delay="0.9s"
            >
              <a href="images/screenshot-img6.jpg" class="image-popup">
                <img
                  src="images/screenshot-img6.jpg"
                  class="img-responsive"
                  alt="screenshot"
                />
              </a>
            </div>

            <div
              class="item col-md-3 col-sm-3 wow fadeInUp"
              data-wow-delay="0.9s"
            >
              <a href="images/screenshot-img7.jpg" class="image-popup">
                <img
                  src="images/screenshot-img7.jpg"
                  class="img-responsive"
                  alt="screenshot"
                />
              </a>
            </div>

            <div
              class="item col-md-3 col-sm-3 wow fadeInUp"
              data-wow-delay="0.9s"
            >
              <a href="images/screenshot-img8.jpg" class="image-popup">
                <img
                  src="images/screenshot-img8.jpg"
                  class="img-responsive"
                  alt="screenshot"
                />
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Pricing Section -->

    <section id="pricing">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12">
            <div class="section-title">
              <h1>Coba the Baca IT</h1>
              <hr />
            </div>
          </div>

          <div class="wow fadeInUp col-md-4 col-sm-4" data-wow-delay="0.4s">
            <div class="pricing-plan">
              <div class="pricing-month">
                <h2>Low</h2>
              </div>
              <div class="pricing-title">
                <h3>apa itu web ?</h3>
              </div>
              <p>1 modul</p>
              <h3 class="text-success">Tanpa daftar</h3>
              <a class="btn btn-default section-btn" href="modul/modul-low.html">Coba sekarang</a>
            </div>
          </div>

          <div class="wow fadeInUp col-md-4 col-sm-4" data-wow-delay="0.6s">
            <div class="pricing-plan">
              <div class="pricing-month">
                <h2>medium</h2>
              </div>
              <div class="pricing-title">
                <h3>apa itu programmer ?</h3>
              </div>
              <p>1 modul</p>
              <h3 class="text-success">Tanpa daftar</h3>
              <a class="btn btn-default section-btn" href="modul/modul-medium.html">Coba sekarang</a>
            </div>
          </div>

          <div class="wow fadeInUp col-md-4 col-sm-4" data-wow-delay="0.8s">
            <div class="pricing-plan">
              <div class="pricing-month">
                <h2>high</h2>
              </div>
              <div class="pricing-title">
                <h3>apa itu coding ?</h3>
              </div>
              <p>1 modul</p>
              <h3 class="text-success">Tanpa daftar</h3>
              <a class="btn btn-default section-btn" href="modul/modul-hard.html">Coba sekarang</a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Newsletter Section -->

    <section id="newsletter">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-md-offset-2 col-md-8 col-sm-12">
            <div class="wow bounceIn section-title">
              <h2>Bantu kami</h2>
              <p class="wow fadeInUp" data-wow-delay="0.5s">
                mari dukung kami agar Baca IT bisa berkembang lebih baik lagi.
              </p>
            </div>
            <div class="wow fadeInUp newsletter-form" data-wow-delay="0.8s">
              <form action="#" method="post">
                <div class="col-md-8 col-sm-7">
                  <input
                    name="email"
                    type="email"
                    class="form-control"
                    id="email"
                    placeholder="Email"
                  />
                </div>
                <div class="col-md-4 col-sm-5">
                  <input
                    name="submit"
                    type="submit"
                    class="form-control"
                    id="submit"
                    value="Kirim"
                  />
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer Section -->

    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-sm-6">
            <div class="wow fadeInUp footer-copyright" data-wow-delay="0.4s">
              <p>Copyright &copy; 2022 Your Baca IT</p>
            </div>
          </div>

          <div class="col-md-4 col-sm-6">
            <ul class="wow fadeInUp social-icon" data-wow-delay="0.8s">
              <li><a href="#" class="fa fa-facebook"></a></li>
              <li><a href="#" class="fa fa-twitter"></a></li>
              <li><a href="#" class="fa fa-google-plus"></a></li>
              <li><a href="#" class="fa fa-dribbble"></a></li>
              <li><a href="#" class="fa fa-linkedin"></a></li>
            </ul>
          </div>
        </div>
      </div>
    </footer>

    <!-- Modal Contact -->

    <div
      class="modal fade"
      id="modal1"
      tabindex="-1"
      role="dialog"
      aria-labelledby="myModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content modal-popup">
          <div class="modal-header">
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
            <h2 class="modal-title">Kontak</h2>
          </div>

          <form action="" method="post">
            <input
              name="waktu"
              type="hidden"
              class="form-control"
              id="name"
              placeholder="Waktu"
              value="<?php
              date_default_timezone_set('Asia/Jakarta'); 
              echo  date("h:i:s a"); ?>"
            />
            <input
              name="name"
              type="text"
              class="form-control"
              id="name"
              placeholder="Nama"
              required
            />
            <input
              name="email"
              type="email"
              class="form-control"
              id="email"
              placeholder="Email"
              required
            />
            <textarea
              name="message"
              rows="3"
              class="form-control"
              id="message"
              placeholder="Pesan"
              required
            ></textarea>
            <input
              name="buttonPesan"
              type="submit"
              class="form-control"
              id="submit"
              value="Kirim pesan"
            />
          </form>
        </div>
      </div>
    </div>

    <!-- Back top -->

    <a href="#" class="go-top"><i class="fa fa-angle-up"></i></a>

    <!-- SCRIPTS -->

    <!-- sweet alert -->
    <script src="admin-pages/plugins/sweetalert/js/sweetalert2.all.min.js"></script>
    <script src="admin-pages/plugins/sweetalert/js/jquery-3.6.0.min.js"></script>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/magnific-popup-options.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/smoothscroll.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/custom.js"></script>
     
  </body>
</html>
