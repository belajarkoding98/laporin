<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>

    
</script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<section class="content-header">
    <h1>
        Beranda
        <small>Sistem Aspirasi & Pengaduan Masyarakat</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Lapor</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="box box-warning" id="box-laporan">
        <div class="box-header with-border">
            <h3 class="box-title">Form Sistem Aspirasi & Pengaduan Masyarakat</h3>
        </div>
        <div class="box-body" style="font-size: 1.0em">
        <?php if($this->session->userdata('admin') == 1): ?>
        <ul class="nav nav-pills nav-justified" style="margin-bottom: 20px">
              <li><a href="<?php echo base_url(); ?>admin">Dashboard</a></li>
              <?php if ($this->session->userdata('admin') == 1): ?>
                <li class="active"><a href="<?php echo base_url(); ?>admin/laporan">Laporan</a></li>
              <?php endif ?>
              <li><a href="<?php echo base_url(); ?>admin/progress">Sedang Ditangani</a></li>
              <?php if ($this->session->userdata('admin') == 1): ?>
                <li><a href="<?php echo base_url(); ?>admin/pelapor">Manajemen User</a></li>
              <?php endif ?>
            </ul>
            <?php endif ?>
            <div class="col-sm-8">
                <?php if ($this->session->flashdata('success') != null) : ?>
                <div class="alert alert-success" style="margin-top: 20px"><i class="fa fa-check-circle"></i>
                    <?php echo $this->session->flashdata('success'); ?></div>
                <?php endif ?>
                <?php if ($this->session->flashdata('failed') != null) : ?>
                <div class="alert alert-danger" style="margin-top: 20px"><i class="fa fa-times-circle"></i>
                    <?php echo $this->session->flashdata('failed'); ?></div>
                <?php endif ?>
                
                <form class="form-horizontal" id="form-lapor" method="post"
                    action="<?php echo base_url('beranda/insertLapor'); ?>" enctype='multipart/form-data'>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Jenis Laporan</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="jenis" id="jenisAduan">
                                <option value="">Pilih Jenis Laporan</option>
                                <option value="Aspirasi">Aspirasi</option>
                                <option value="Aduan">Aduan</option>
                            </select>
                        </div>
                    </div>
                    <div id="setelahmemilihjenis" style="display: none">
                    <?php if($this->session->userdata('admin') == 1): ?>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Pelapor</label>
                            <div class="col-sm-8">
                            <select id="single" class="js-states form-control col-sm-8" name="id_pelapor">
                                <option>Pilih pelapor</option>
                                <?php
                                echo $pelapor;
                                    foreach($pelapor as $p):
                                        echo '<option value="'.$p->id_pelapor.'">'.$p->nama_pelapor.'</option>';
                                    endforeach;
                                ?>
          </select>
                            </div>
                        </div>
                        <?php endif ?>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Perkiraan Waktu Kejadian</label>
                            <div class="col-sm-8">
                                <input type="date" name="waktu_kejadian" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                        <label class="col-sm-4 control-label">Kategori Laporan</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="kategori" id="jenisAduan">
                                <option value="">Pilih Kategori Laporan</option>
                                <option value="Pemerintah">Pemerintah</option>
                                <option value="Ekonomi">Ekonomi</option>
                                <option value="Kesehatan">Kesehatan</option>
                                <option value="Pendidikan">Pendidikan</option>
                                <option value="Sarana & Prasarana">Sarana & Prasarana</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                            <label class="col-sm-4 control-label">Judul Pengajuan/Aspirasi</label>
                            <div class="col-sm-8">
                                <input type="text" name="judul" class="form-control" placeholder="Judul Pengajuan / Aspirasi" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Deskripsi Umum</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" placeholder="Deskripsi Umum" name="desc_umum"
                                    style="height: 150px" required></textarea>
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <label class="col-sm-4 control-label">Deskripsi Aset</label>
                            <div class="col-sm-8">
                                <hr>
                            </div>
                        </div> -->
                        <!-- <div class="form-group">
                            <label class="col-sm-4 control-label">Nama Aset</label>
                            <div class="col-sm-8">
                                <input type="text" name="nama_aset" class="form-control" placeholder="Nama Aset" required>
                            </div>
                        </div> -->
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Lokasi</label>
                            <div class="col-sm-8">
                                <input type="text" name="lokasi" class="form-control" placeholder="Lokasi" required>
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <label class="col-sm-4 control-label">Identitas Pemilik/Penanggung Jawab</label>
                            <div class="col-sm-8">
                                <input type="text" name="id_pemilik" class="form-control"
                                    placeholder="Identitas Pemilik" required>
                            </div>
                        </div> -->
                        <script type="text/javascript">
                            $('#jenisAduan').change(function() {
                               var aduan = $(this).val();
                               if(aduan == "Aspirasi"){
                                   $("#files").empty().append('<label class="col-sm-4 control-label">Bukti Aspirasi</label><div class="col-sm-8"><input type="file" name="bukti" onchange="Filevalidation1()" id="buktiUpload1" class="form-control" accept=",.doc, .docx, .pdf" required></div></div><div class="col-sm-4"></div><div class="col-sm-8"><b><p style="font-size:9pt;">*)File yang harus diupload berupa file word/ pdf</p></b><p style="font-size:9pt;" id="filesize1"></p></div>')
                            }else if(aduan == "Aduan"){
                                    $("#files").empty().append('<label class="col-sm-4 control-label">Bukti Aduan</label><div class="col-sm-8"><input type="file" onchange="Filevalidation(this)" id="buktiUpload" name="bukti" class="form-control" accept="image/png, image/gif, image/jpeg" required></div></div><div class="col-sm-4"></div><div class="col-sm-8"><b><p style="font-size:9pt;">*)File yang harus diupload berupa gambar (.PNG/.JPG./JPEG)</p></b><p style="font-size:9pt;" id="filesize"></p></div><label class="col-sm-4 control-label">Gambar Preview</label><div class="col-sm-8"><img id="preview" src="#" alt="your image" width="100%" /></div>')
                             }
                            })
                            
                        </script>
                       
                        <!-- <div class="form-group">
                            <label class="col-sm-4 control-label">Bukti</label>
                            <div class="col-sm-8">
                                <input type="file" name="bukti" class="form-control">
                            </div>
                        </div> -->
                        <div class="form-group" id="files">
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4"></div>
                            <div class="col-sm-8">
                                <button class="btn btn-success btn-flat btn-block"
                                    style="margin-left: auto;margin-right: auto; width: 400px; margin-bottom: 10px"
                                    id="btn-submit" type="submit">Submit Form</button>
                                <button class="btn btn-warning btn-flat btn-block"
                                    style="margin-left: auto;margin-right: auto; width: 400px; margin-bottom: 10px"
                                    id="btn-reset" type="reset">Reset Form</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-4">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Info</h3>
                    </div>
                    <div class="box-body">
                        <p id="infoJenis">

                        </p>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>


        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->

</section>
<!-- /.content -->

<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>assets/jquery/dist/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
      $("#single").select2({
          placeholder: "Pilih Pelapor yang sudah terdaftar",
          allowClear: true
      });



      Filevalidation = (input) => {
        const fi = document.getElementById('buktiUpload');
        // Check if any file is selected.
        if (fi.files.length > 0) {
            for (const i = 0; i <= fi.files.length - 1; i++) {
 
                const fsize = fi.files.item(i).size;
                const file = Math.round((fsize / 1024));
                // The size of the file.
               
                    document.getElementById('filesize').innerHTML = '<b>Ukuran File : '
                    + file + '</b> KB';
                
            }
        }

        if(event.target.files.length > 0){
    var src = URL.createObjectURL(event.target.files[0]);
    var preview = document.getElementById("image-pr");
    preview.src = src;
    preview.style.display = "block";
  }
        
    }

      Filevalidation1 = () => {
        const fi = document.getElementById('buktiUpload1');
        // Check if any file is selected.
        if (fi.files.length > 0) {
            for (const i = 0; i <= fi.files.length - 1; i++) {
 
                const fsize = fi.files.item(i).size;
                const file = Math.round((fsize / 1024));
                // The size of the file.
               
                    document.getElementById('filesize1').innerHTML = '<b>Ukuran File : '
                    + file + '</b> KB';
                
            }
        }
    }

    Filevalidation = (input) => {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#preview')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>