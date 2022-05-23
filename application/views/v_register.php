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
.hero-3-bg{
    position: absolute;
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
    <section class="position-relative align-items-center overflow-hidden">
        <img class="hero-3-bg" src="<?= base_url() ?>assets/beranda/images/hero-1-bg.png" alt="">
        <div class="container mb-lg-5">
            <div class="row align-items-center text-center text-md-start">
                <div class="col-md-6 mt-4 pt-2">
                    <h1 class="hero-3-title mb-3 pb-2">Sistem Aspirasi & Pengaduan Masyarakat</h1>
                    <h6 class="text-muted fs-18 fw-normal mb-4 pb-3">adalah kanal aduan kemanusiaan bagi masyarakat Kuningan
                    </h6>
                </div>
                <div class="col-md-2 mt-lg-4 pt-2 mt-5">
                </div>
                <div class="col-md-4 mt-lg-4 pt-2 mt-5 mb-5">
                <?php if ($this->session->flashdata('success') != null) : ?>
                <div class="alert alert-success" style="margin-top: 20px"><i class="fa fa-check-circle"></i>
                    <?php echo $this->session->flashdata('success'); ?></div>
                <?php endif ?>
                <?php if ($this->session->flashdata('failed') != null) : ?>
                <div class="alert alert-danger" style="margin-top: 20px"><i class="fa fa-times-circle"></i>
                    <?php echo $this->session->flashdata('failed'); ?></div>
                <?php endif ?>
                <form method="post" action="<?php echo base_url('beranda/register'); ?>"  enctype='multipart/form-data'>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-12 col-form-label">Nama Lengkap</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="regNama" id="inputNama"
                                            placeholder="Masukan Nama Lengkap" oninvalid="this.setCustomValidity('Masukan Nama Lengkap terlebih dahulu')" oninput="this.setCustomValidity('')" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-12 col-form-label">No Telepon</label>
                                    <div class="col-sm-12">
                                        <input type="number" class="form-control" id="inputTelepon" name="regTelp" minlength="10"
                                            placeholder="Masukan No Telepon" oninvalid="noTelp()" oninput="this.setCustomValidity('')" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-12 col-form-label">No
                                        Identitas KTP</label>
                                    <div class="col-sm-12">
                                        <input type="number" class="form-control" id="inputId" name="regId" minlength="16"
                                            placeholder="Masukan No Identitas" oninvalid="inputId()" oninput="this.setCustomValidity('')" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Upload KTP</label>
                                <div class="col-sm-12">
                                    <input type="file" name="files" class="form-control" accept="image/png, image/jpeg" required>
                                </div>
                                <b><p style="font-size:9pt;">*)File yang harus diupload berupa file PNG/ JPG</p></b>
                                </div> 
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-12 col-form-label">Email</label>
                                    <div class="col-sm-12">
                                        <input type="email" class="form-control" id="inputEmail" name="regEmail"
                                            placeholder="Masukan Email" oninvalid="this.setCustomValidity('Masukan Email terlebih dahulu')" oninput="this.setCustomValidity('')" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputAddress" class="col-sm-12 col-form-label">Alamat</label>
                                    <div class="col-sm-12">
                                        <textarea name="regAlamat" id="" cols="30" rows="2" class="form-control" placeholder="Masukan Alamat Lengkap" oninvalid="this.setCustomValidity('Masukan Alamat terlebih dahulu')" oninput="this.setCustomValidity('')" required></textarea>
                                    </div>
                                </div>
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
                                <!-- <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label for="inputPassword3" class="col-sm-12 col-form-label">Daftar Sebagai</label>
                                        <input type="radio" name="isOrgz" class="form-check-input" value="Individu" checked> Individual
                                        <input type="radio" name="isOrgz" class="form-check-input" value="Organisasi"> Organisasi
                                    </div>
                                </div>
                                <div id="organisasiDiv" style="display: none" class="mb-3">
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-form-label">Nama Organisasi</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="namaOrg" name="namaOrg"
                                                placeholder="Nama Organisasi">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-form-label">Alamat Organisasi</label>
                                        <div class="col-sm-12">
                                        <textarea class="form-control" name="alamatOrg" id="alamatOrg" placeholder="Alamat Organisasi"></textarea>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="form-group row mt-3">
                                    <div class="col-sm-6">
                                    <button type="submit" class="btn btn-primary btn-block btn-flak">Daftar</button>
                                    </div>
                                </div>
                            </form>
                </div>

            </div>
        </div>
        <!-- end container -->
    </section>
    <!-- <section id="projects" class="projects-section bg-light">
        <div class="container">
            sadsadad
        </div>
    </section> -->
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
    <script src="<?php echo base_url(); ?>assets/beranda/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="<?php echo base_url(); ?>assets/beranda/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="<?php echo base_url(); ?>assets/beranda/js/grayscale.min.js"></script>
    <script>
    $(document).ready(function() {
        $('input[type=radio][name=isOrgz]').change(function() {
            if (this.value == 'Individu') {
                $('#organisasiDiv').slideUp('fast');
            } else if (this.value == 'Organisasi') {
                $('#organisasiDiv').slideDown('fast');
            }
        });
    })

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
    function noTelp(){
        if($('#inputTelepon').val() <= 10){
            this.setCustomValidity('Password kurang dari 10 karakter');
        }else{
            this.setCustomValidity('Masukan Nomor Telepon terlebih dahulu')
        }
    }
    function inputId(){
        if($('#inputId').val() <= 16){
            this.setCustomValidity('Password kurang dari 16 karakter');
        }else{
            this.setCustomValidity('Masukan Nomor Identitas KTP terlebih dahulu')
        }
    }
    </script>
</body>

</html>