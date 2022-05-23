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

    <!-- css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/beranda/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>assets/beranda/css/style.min.css" rel="stylesheet" type="text/css" />
    <style>

.counter-box {
	display: block;
	background: #f6f6f6;
	padding: 40px 20px 37px;
	text-align: center
}

.counter-box p {
	margin: 5px 0 0;
	padding: 0;
	color: #909090;
	font-size: 18px;
	font-weight: 500
}

.counter-box i {
	font-size: 60px;
	margin: 0 0 15px;
	color: #d2d2d2
}

.counter { 
	display: block;
	font-size: 32px;
	font-weight: 700;
	color: #666;
	line-height: 28px
}

.counter-box:hover {
      background: #3acf87;
}

.counter-box:hover p,
.counter-box.colored i,
.counter-box.colored .counter {
	color: #fff
}
    </style>
</head>

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="67">
    <!-- start navbar -->
    <nav class="navbar navbar-expand-lg fixed-top sticky" id="navbar">
        <div class="container">
            <a href="<?= base_url('/'); ?>" class="navbar-brand me-5">
                <img src="<?= base_url() ?>assets/beranda/images/logo-light.png" class="logo-light" alt="" height="22" />
                <img src="<?= base_url() ?>assets/beranda/images/logo-dark.png" class="logo-dark" alt="" height="22" />
            </a>
            <a href="javascript:void(0)" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggle-icon"><i data-feather="menu"></i></span>
            </a>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav navbar-center me-auto mt-lg-0 mt-2">
                    <li class="nav-item">
                        <a class="nav-link" href="#beranda">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tentang">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#prosedur">Prosedur</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#statistik">Statistik</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#kontak">Kontak</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#bantuan">Bantuan</a>
                    </li>
                </ul>
                <div class="mb-4 mb-lg-0">
                    <a target="_blank" href="https://wa.me/6281355538777?text=Saya%20ingin%20bertanya%20tentang%20pengaduan%20..." class="btn btn-sm nav-btn btn-primary mb-4 mb-lg-0 ms-auto">WhatsApp 08123456789</a>
                </div>
            </div>
        </div>
        <!-- end container -->
    </nav>
    <!-- end navbar -->

    <!-- start hero -->
    <section class="hero-3 position-relative d-flex align-items-center justify-content-center overflow-hidden"
        id="beranda">
        <img class="hero-3-bg" src="<?= base_url() ?>assets/beranda/images/hero-3-bg.png" alt="">
        <div class="container">
            <div class="row align-items-center text-center text-md-start">
                <div class="col-md-6 mt-4 pt-2">
                    <h1 class="hero-3-title mb-3 pb-2">Sistem Aspirasi & Pengaduan Masyarakat</h1>
                    <h6 class="text-muted fs-18 fw-normal mb-4 pb-3">adalah kanal aduan kemanusiaan bagi masyarakat Kuningan.
                    </h6>
                    <ul class="list-unstyled list-inline mb-4 pb-3 hero-link">
                        <li class="list-inline-item border rounded p-2"><a href="#"><i data-feather="facebook"
                                    class="fb icon-sm"></i></a></li>
                        <li class="list-inline-item border rounded p-2"><a href="#"><i data-feather="instagram"
                                    class="inst icon-sm"></i></a></li>
                        <li class="list-inline-item border rounded p-2"><a href="#"><i data-feather="twitter"
                                    class="tw icon-sm"></i></a></li>
                        <li class="list-inline-item border rounded p-2 warning"><a href="#"><i data-feather="youtube"
                                    class="yt icon-sm"></i></a></li>
                    </ul>
                    <div>
                        <a href="<?= base_url() ?>auth/register" class="btn btn-primary d-inline-block me-2">Daftar</a>
                        <a href="<?= base_url() ?>auth/login" class="btn btn-outline-primary d-inline-block">Masuk</a>
                    </div>
                </div>
                <div class="col-md-6 mt-lg-4 pt-2 mt-5">
                    <img class="hero-img" src="<?= base_url() ?>assets/beranda/images/hero-3-img.png" alt="">
                </div>

            </div>
        </div>
        <!-- end container -->
    </section>
    <!-- end hero -->

    <!-- start solution -->
    <section class="service-section" id="tentang">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-12 mb-4">
                    <h4 class="fw-semibold mb-3">Tentang Kami</h4>
                    <h5 class="text-muted fw-normal">E-Lapor adalah Aplikasi Pengelolaan Pengaduan Masyarakat dan
                        <br>
                        pelayanan terhadap semua aspirasi dan pengaduan masyarakat.
                    </h5>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <img class="img-container" src="<?= base_url() ?>assets/beranda/images/chat.png" alt="">
                </div>
                <div class="col-lg-6 mt-lg-0 mt-5 pt-lg-0 pt-4">
                    <h3 class="fw-semibold lh-base mb-4">Pengelolaan pengaduan pelayanan publik disetiap organisasi
                        penyelenggara di Indonesia belum terkelola secara efektif dan
                        terintegrasi. Oleh karena itu E-Lapor hadir untuk mengatasi masalah tersebut. Dengan adanya
                        E-Lapor masyarakat bisa melakukan
                        pengaduan secara online.</h3>
                </div>

            </div>
            <div class="row text-center">
                <div class="col-lg-12">
                    <div class="feature-slider">
                        <div>
                            <div class="mt-4 pt-2">
                                <div class="solution border rounded position-relative px-4 py-5">
                                    <i data-feather="bar-chart" class="sw-1 mb-4 icon-xxl sol-icon"></i>
                                    <h5 class="lh-base fs-16 mb-2">Meningkatkan Mutu Pelayanan</h5>
                                    <a class="text-muted">
                                        Dengan adanya <span class="fw-semibold fs-15 text-dark">Aplikasi E-Lapor</span>
                                        ini diharapkan dapat meningkatkan pelayanan
                                        terhadap masyarakat</a>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="mt-4 pt-2">
                                <div class="solution border rounded position-relative px-4 py-5">
                                    <i data-feather="watch" class="sw-1 mb-4 icon-xxl sol-icon"></i>
                                    <h5 class="lh-base fs-16 mb-2">Praktis dan Hemat Waktu</h5>
                                    <a class="text-muted">Dengan adanya <span
                                            class="fw-semibold fs-15 text-dark">E-lapor</span> ini masyarakat tidak
                                        perlu datang ke instansi terkit untuk melakukan pengaduan</a>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="mt-4 pt-2">
                                <div class="solution border rounded position-relative px-4 py-5">
                                    <i data-feather="fast-forward" class="sw-1 mb-4 icon-xxl sol-icon"></i>
                                    <h5 class="lh-base fs-16 mb-2">Cepat, Tepat dan Tuntas</h5>
                                    <a class="text-muted"><span class="fw-semibold fs-15 text-dark">Pengaduan dapat
                                            terkoordinasi dengan baik,</span> sehingga dapat mempercepat proses tindak
                                        lanjut</a>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="mt-4 pt-2">
                                <div class="solution border rounded position-relative px-4 py-5">
                                    <i data-feather="user-check" class="sw-1 mb-4 icon-xxl sol-icon"></i>
                                    <h5 class="lh-base fs-16 mb-2">Terverifikasi dengan baik</h5>
                                    <a class="text-muted"><span class="fw-semibold fs-15 text-dark">Setiap pengaduan dapat terverifikasi dengan baik,</span>sesuai dengan data yang sudah terekap.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end solution -->

    <!-- start services -->
    <section class="section bg-light" id="prosedur">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-12 mb-4">
                    <h4 class="fw-semibold mb-3">Proses Pengaduan</h4>
                    <h5 class="text-muted fw-normal">Berikut adalah prosedur pengaduan di aplikasi E-Lapor.</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mt-4 pt-2">
                    <div class="service rounded px-4 py-md-5 py-3">
                        <div class="bg-info p-3 d-inline-block rounded-circle">
                            <i data-feather="users" class="text-white"></i>
                        </div>
                        <h6 class="my-4">1. Daftar / Masuk</h6>
                        <p class="text-muted mb-4">
                            Daftar terlebih dahulu sebelum melakukan pengaduan. Setelah mendaftar,login untuk menulis
                            pengaduan anda.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 mt-4 pt-2">
                    <div class="service rounded px-4 py-md-5 py-3">
                        <div class="bg-warning p-3 d-inline-block rounded-circle">
                            <i data-feather="edit" class="text-white"></i>
                        </div>
                        <h6 class="my-4">Pre-approval</h6>
                        <p class="text-muted mb-4">
                        Tulis pengaduan yang sesuai dengan masalah yang anda alami atau
                                    yang anda temui. Sertakan surat atau foto sebelum melakukan pengaduan.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 mt-4 pt-2">
                    <div class="service rounded px-4 py-md-5 py-3">
                        <div class="bg-danger p-3 d-inline-block rounded-circle">
                            <i data-feather="check-square" class="text-white"></i>
                        </div>
                        <h6 class="my-4">3. Verifikasi Pengaduan</h6>
                        <p class="text-muted mb-4">
                            Jika anda sudah mengirim pengaduan, maka
                            pengaduan anda akan segera di proses dan
                            diverifikasi oleh petugas kami.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 mt-4 pt-2">
                    <div class="service rounded px-4 py-md-5 py-3">
                        <div class="bg-success p-3 d-inline-block rounded-circle">
                            <i data-feather="corner-down-left" class="text-white"></i>
                        </div>
                        <h6 class="my-4">4. Proses Tindak Lanjut</h6>
                        <p class="text-muted mb-4">
                            Setelah melalui proses verifikasi oleh petugas, selanjutnya kami akan menindak lanjuti
                            terkait
                            pengaduan anda.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 mt-4 pt-2">
                    <div class="service rounded px-4 py-md-5 py-3">
                        <div class="bg-secondary p-3 d-inline-block rounded-circle">
                            <i data-feather="message-square" class="text-white"></i>
                        </div>
                        <h6 class="my-4">5. Beri Tanggapan</h6>
                        <p class="text-muted mb-4">
                            Setelah kami tindak lanjuti, maka selanjutnya
                            anda tinggal menunggu tanggapan dari kami.

                        </p>
                    </div>
                </div>
                <div class="col-md-4 mt-4 pt-2">
                    <div class="service rounded px-4 py-md-5 py-3">
                        <div class="bg-dark p-3 d-inline-block rounded-circle">
                            <i data-feather="user-check" class="text-white"></i>
                        </div>
                        <h6 class="my-4">Selesai</h6>
                        <p class="text-muted mb-4">
                            Anda bisa melihat tanggapan atau status dari
                            pengaduan anda di halaman dashboard anda.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end servies -->

    <!-- start statistics -->
    <section class="section" id="statistik">
    <div class="container">
    <div class="row justify-content-center text-center">
                <div class="col-12 mb-4">
                    <h4 class="fw-semibold mb-3">Statistik Pengaduan</h4>
                    <h5 class="text-muted fw-normal">Berikut ini adalah staistik pengaduan masyarakat kepada kami</h5>
                </div>
            </div>
    <div class="row">

	<div class="four col-md-3">
		<div class="counter-box">
			<i class="fa fa-list-ol"></i>
			<span class="counter"><?= $total_pengaduan ?></span>
			<p>Jumlah Pengaduan</p>
		</div>
	</div>
	<div class="four col-md-3">
		<div class="counter-box">
			<i class="fa fa-retweet"></i>
			<span class="counter"><?= $diproses_pengaduan ?></span>
			<p>Pengaduan Diproses</p>
		</div>
	</div>
	<div class="four col-md-3">
		<div class="counter-box">
			<i class="fa  fa-stop-circle"></i>
			<span class="counter"><?= $ditolak_pengaduan ?></span>
			<p>Pengaduan Pending</p>
		</div>
	</div>
	<div class="four col-md-3">
		<div class="counter-box">
			<i class="fa fa-check-square"></i>
			<span class="counter"><?= $selesai_pengaduan ?></span>
			<p>Pengaduan Selesai</p>
		</div>
	</div>
  </div>	
</div>
</section>

    <!-- start subscription -->
    <section class="service-section overflow-hidden footer" id="kontak">
        <div class="container">
            <div class="row align-items-center bg-light rounded p-4">
                <div class="col-lg-6">
                    <h5 class="text-primary mb-3">Alamat Kami</h5>
                    <p class="mt-3 text-muted fs-15"><i class="fas fa-location-arrow"></i> Jl. Pramuka No.67, Purwawinangun, Kec. Kuningan, Kabupaten Kuningan, Jawa Barat 45512
                    </p>
                    <p class="mt-3 text-muted fs-15"><i class="fas fa-envelope-open"></i> fkom@uniku.ac.id
                    </p>
                    <p class="mt-3 text-muted fs-15"><i class="fas fa-phone"></i> 089123456789
                    </p>
                    <h3 class="text-muted fw-normal">Kirim Pertanyaan?</h3>
                    <form class="mt-4" method="post" action="<?= site_url('pesan/send') ?>">
                        <div class="form-group mb-3">
                            <input type="text" name="fullname" class="form-control" placeholder="masukan nama lengkap" oninvalid="this.setCustomValidity('Masukan Nama Lengkap')" oninput="this.setCustomValidity('')" required>
                        </div>
                        <div class="form-group mb-3">
                            <input type="email" name="email" class="form-control" placeholder="masukan email" oninvalid="this.setCustomValidity('Masukan Email Aktif')" oninput="this.setCustomValidity('')" required>
                        </div>
                        <div class="form-group mb-3">
                            <input type="text" name="subject" class="form-control" placeholder="masukan subjek" oninvalid="this.setCustomValidity('Masukan Subjek Pesan')" oninput="this.setCustomValidity('')" required>
                        </div>
                        <div class="form-group mb-3">
                            <textarea name="message" id="message" cols="30" rows="3" class="form-control" placeholder="masukan pesan" oninvalid="this.setCustomValidity('Masukan Pesan')" oninput="this.setCustomValidity('')" required></textarea>
                        </div>
                        <button class="btn btn-primary mt-3" type="submit">Submit <i data-feather="send"
                                class="icon-xxs icon"></i></button>
                    </form>
                </div>
                <!-- <div class="col-lg-5 offset-lg-1">
                    <img class="img-fluid mt-sm-0 mt-5" src="<?= base_url() ?>assets/beranda/images/subscribe-img.png" alt="">
                </div> -->
                <div class="col-lg-5 offset-lg-1">
                    <div class="card rounded border-0 mt-sm-0 mt-4">
                        <div class="map rounded">
                            <a href="#"
                                class="btn btn-light text-dark position-absolute top-50 start-50 translate-middle map-btn">View
                                Map</a>
                            <div class="bg-overlay rounded position-absolute top-0 right-0 bottom-0 left-0"></div>
                            <iframe class="rounded"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.2828165468613!2d108.47524631431772!3d-6.97592077024608!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f16802ef8da05%3A0xd752d8670e780968!2sKampus%202%20UNIKU%20Fakultas%20Ilmu%20Komputer!5e0!3m2!1sid!2sid!4v1651916097365!5m2!1sid!2sid" 
                                width="100%" height="430" style="border: 0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end subscription -->

    <!-- start footer -->
    <footer class="footer bg-dark" id="bantuan">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <!-- <a href="<?= base_url('/'); ?>">
                        <img src="<?= base_url() ?>assets/beranda/images/logo-light.png" alt="" height="22" />
                    </a> -->
                    <h6 class="mb-3 mt-sm-0 mt-5 text-white">E-Lapor</h6>
                    <p class="mt-3 text-muted fs-15">E-Lapor adalah kanal pengelolaan pengaduan masyarakat dan pelayanan terhadap semua aspirasi dan pengaduan masyarakat.
                    </p>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <h6 class="mb-3 mt-sm-0 mt-5 text-white">Useful Links</h6>
                    <ul class="list-unstyled footer-list">
                        <li class="py-2"><a class="fs-15" href="#"><span class="icon fs-12 me-2">∎</span> Home</a>
                        </li>
                        <li class="py-2"><a class="fs-15" href="#"><span class="icon fs-12 me-2">∎</span> Bantuan</a>
                        </li>
                        <li class="py-2"><a class="fs-15" href="#"><span class="icon fs-12 me-2">∎</span> Prosedur</a>
                        </li>
                        <li class="py-2"><a class="fs-15" href="#"><span class="icon fs-12 me-2">∎</span> Kontak
                        </a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <h6 class="mb-3 mt-sm-0 mt-5 text-white">Kontak Kami</h6>
                    <p class="mt-3 text-muted fs-15">Jl. Pramuka No.67, Purwawinangun, Kec. Kuningan, Kabupaten Kuningan, Jawa Barat 45512
                    </p>
                    <h6 class="text-primary fw-medium fs-15 mt-4"><strong>Phone: </strong>(0232) 875097</h6>
                    <h6 class="text-primary fw-medium fs-15 mt-4"><strong>Email: </strong>fkom@uniku.ac.id</h6>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </footer>
    <!-- end footer -->

    <!-- start footer alter -->
    <div class="footer-alt bg-dark">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-12">
                    <script>
                    document.write(new Date().getFullYear())
                    </script> &copy; by <a href="#" class="text-muted">Fakultas Ilmu Komputer</a>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end footer alter -->


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

    <script src="<?= base_url() ?>assets/beranda/js/bootstrap.bundle.min.js"></script>

    <!-- feather icon -->
    <script src="<?= base_url() ?>assets/beranda/js/feather.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- client-slider -->
    <script src="<?= base_url() ?>assets/beranda/js/tiny-slider.js"></script>
    <script src="<?= base_url() ?>assets/beranda/js/tiny.init.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?= base_url() ?>assets/beranda/js/app.js"></script>
    <script>
        <?= $this->session->flashdata('messageAlert'); ?>

          
$(document).ready(function() {

$('.counter').each(function () {
$(this).prop('Counter',0).animate({
Counter: $(this).text()
}, {
duration: 4000,
easing: 'swing',
step: function (now) {
    $(this).text(Math.ceil(now));
}
});
});

});  
    </script>
</body>

</html>