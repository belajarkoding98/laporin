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
            <a href="<?= base_url('auth/login'); ?>" class="navbar-brand navbar-back">
            <i class="fas fa-arrow-left"></i>
                Kembali Ke Halaman Login
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
            <div class="alert alert-success"><i class="fa fa-times-circle"></i> <?= $this->session->flashdata('success') ?></div>
            <?php endif ?>
                <?php if ($this->session->flashdata('failed') != null) : ?>
            <div class="alert alert-danger"><i class="fa fa-times-circle"></i> <?= $this->session->flashdata('failed') ?></div>
            <?php endif ?>
  <form method="post" action="<?php echo base_url('auth/newpassword'); ?>">
  <h2>Password Baru</h2>
  <input type="hidden" class="form-control" name="id_pelapor" id="inputEmailMasuk" value="<?= $id ?>">
  <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-12 col-form-label">Password</label>
                                    <div class="col-sm-12">
                                        <input type="password" class="form-control" id="password" name="regPass" minlength="8"
                                            placeholder="Masukan Password" oninvalid="password1()" oninput="this.setCustomValidity('')" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-12 col-form-label">Konfirmasi Password</label>
                                    <div class="col-sm-12">
                                        <input type="password" class="form-control" id="konfirmasiPassword" name="regKonfirmasiPass" minlength="8"
                                            placeholder="Masukan Konfirmasi Password" onkeyup="matchPass()" oninvalid="password2()" oninput="this.setCustomValidity('')" required>
                                    </div>
                                </div>
                                <div id="errorPassword"></div>
                                 <div class="form-group row mt-3">
                                    <div class="col-sm-8">
                                        <button type="submit" class="btn btn-primary btn-block btn-flak">ubah</button>
                                    </div>
                                </div>
                                <div class="form-group row mb-2 mt-2">
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
            function matchPass(){
        var pass1 = $('#password').val();
        var pass2 = $('#konfirmasiPassword').val();
        var errorPassword = $('#errorPassword');

        if(pass1 != pass2){
            errorPassword.css('color', 'red');
            errorPassword.html('Password yang dimasukan tidak sama!');
        }else{
            errorPassword.css('color', 'green');
            errorPassword.html('Password yang dimasukan sama!');

        }
    }

    function password1(){
        if($('#password').val() <= 8){
            this.setCustomValidity('Password kurang dari 8 karakter');
        }else{
            this.setCustomValidity('Masukan Password terlebih dahulu');
        }
    }
    function password2(){
        if($('#konfirmasiPassword').val() <= 8){
            this.setCustomValidity('Password kurang dari 8 karakter');
        }else{
            this.setCustomValidity('Masukan Password terlebih dahulu');
        }
    }
    </script>
</body>

</html>