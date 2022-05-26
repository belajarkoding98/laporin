<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title><?= $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Premium Bootstrap 5 Template" />
    <meta name="keywords" content="bootstrap 5, premium, marketing, multipurpose" />
    <meta content="Themesdesign" name="author" />

    <!-- favicon -->
    <link rel="shortcut icon" href="<?= base_url('assets/images/logo_uniku.png'); ?>" />

    <!-- tinyslider -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/beranda/css/tiny-slider.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

    <!-- css -->
    <link href="<?= base_url() ?>assets/beranda/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/beranda/css/style.min.css" rel="stylesheet" type="text/css" />
    <style>
        .navbar-back{
            font-size: 16px;
            color: #000;
        }
        a{
            color: #000;
        }
        a:hover{
            color: #50C594;
        }
        .form-check-input:checked {
    background-color: #50C594;
    border-color: #50C594;
}
    </style>
</head>

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="67">
    <!-- start navbar -->
    <nav class="navbar navbar-expand-lg fixed-top sticky" id="navbar">
        <div class="container">
            <a href="<?= base_url('/'); ?>" class="navbar-brand navbar-back">
            <i class="fas fa-arrow-left"></i>
                Kembali Ke Halaman Utama
            </a>
            <a href="javascript:void(0)" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggle-icon"><i data-feather="menu"></i></span>
            </a>
        </div>
        <!-- end container -->
    </nav>
    <!-- end navbar -->

    <!-- start hero -->
    <section class="hero-3 position-relative d-flex align-items-center justify-content-center overflow-hidden"
        id="home">
        <img class="hero-3-bg" src="<?= base_url() ?>assets/beranda/images/hero-3-bg.png" alt="">
        <div class="container">
            <div class="row align-items-center text-center text-md-start">
                <div class="col-md-6 mt-4 pt-2">
                    <h1 class="hero-3-title mb-3 pb-2">Sistem Aspirasi & Pengaduan Masyarakat</h1>
                    <h6 class="text-muted fs-18 fw-normal mb-4 pb-3">adalah kanal aduan kemanusiaan bagi masyarakat Kuningan
                    </h6>
                </div>
                <div class="col-md-2 mt-lg-4 pt-2 mt-5">
                </div>
                <div class="col-md-4 mt-lg-4 pt-2 mt-5">
                <?php if ($this->session->flashdata('success') != null) : ?>
            <div class="alert alert-success"><i class="fa fa-check-circle"></i> <?= $this->session->flashdata('success') ?></div>
            <?php endif ?>
                <?php if ($this->session->flashdata('failed') != null) : ?>
            <div class="alert alert-danger"><i class="fa fa-times-circle"></i> Login Gagal</div>
            <?php endif ?>
  <form method="post" action="<?php echo base_url('beranda/login'); ?>">
  <h2>Login</h2>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-12 col-form-label">Email</label>
                                    <div class="col-sm-12">
                                        <input type="email" class="form-control" name="emailMasuk" id="inputEmailMasuk" oninvalid="this.setCustomValidity('Masukan Email terlebih dahulu')" oninput="this.setCustomValidity('')"
                                            placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-12 col-form-label">Password</label>
                                    <div class="col-sm-12">
                                        <input type="password" class="form-control" name="passwordMasuk" minlength="5" oninvalid="password1()" oninput="this.setCustomValidity('')"
                                            id="inputPasswordMasuk" placeholder="Password" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2 mt-2">
    <div class="col">
      <!-- Simple link -->
      <a href="<?= base_url('auth/reset_password') ?>">Lupa password?</a>
    </div>
  </div>
                                 <div class="form-group row">
                                    <div class="col-sm-6">
                                        <button type="submit" class="btn btn-primary btn-block btn-flak">Masuk</button>
                                    </div>
                                </div>
                                <div class="form-group row mb-2 mt-2">
    <div class="col">
      <!-- Simple link -->
      <a href="<?= base_url() ?>register">Belum punya akun? Daftar disini</a>
    </div>
  </div>
                            </form>
                </div>

            </div>
        </div>
        <!-- end container -->
    </section>
    <!-- end hero -->


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Get In Touch</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" name="myForm" onsubmit="return validateForm()">
                        <span id="error-msg"></span>
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="fw-medium form-label" for="name">Name</label>
                                        <input type="text" class="form-control" placeholder="Your name" id="name" />
                                    </div>
                                    <!-- end col -->
                                    <div class="col-md-6 mb-3">
                                        <label class="fw-medium form-label" for="email">Email</label>
                                        <input type="email" class="form-control" placeholder="Your email" id="email" />
                                    </div>
                                    <!-- end col -->
                                    <div class="col-md-6 mb-3">
                                        <label class="fw-medium form-label" for="subject">Subject</label>
                                        <input type="text" class="form-control" placeholder="your subject"
                                            id="subject" />
                                    </div>
                                    <!-- end col -->
                                    <div class="col-md-6 mb-3">
                                        <label class="fw-medium form-label" for="number">Contact</label>
                                        <input type="text" class="form-control" placeholder="+00 1234 5678 90"
                                            id="number" />
                                    </div>
                                    <!-- end col -->
                                    <div class="col-12 mb-3">
                                        <label class="fw-medium form-label" for="comments">Message</label>
                                        <textarea class="form-control" id="comments" placeholder="Enter your message..."
                                            rows="5"></textarea>
                                    </div>
                                    <!-- end col -->
                                    <div class="col-12">
                                        <input type="submit" id="submit" name="send" class="btn btn-primary mt-2"
                                            value="Send Information" />
                                    </div>
                                    <!-- end col -->
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </form>
                    <!-- end form -->
                </div>
            </div>
        </div>
    </div>
    <!-- end modal -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="<?= base_url() ?>assets/beranda/js/bootstrap.bundle.min.js"></script>

    <!-- feather icon -->
    <script src="<?= base_url() ?>assets/beranda/js/feather.js"></script>

    <!-- client-slider -->
    <script src="<?= base_url() ?>assets/beranda/js/tiny-slider.js"></script>
    <script src="<?= base_url() ?>assets/beranda/js/tiny.init.js"></script>

    <script src="<?= base_url() ?>assets/beranda/js/app.js"></script>
    <script>
        function password1(){
        if($('#password').val() <= 8){
            this.setCustomValidity('Password kurang dari 8 karakter');
        }else{
            this.setCustomValidity('Masukan Password terlebih dahulu');
        }
    }
    </script>
</body>

</html>