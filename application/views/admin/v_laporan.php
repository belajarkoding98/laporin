<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content container-fluid">

            <div class="box box-solid">

                <div class="box-body">

                    <ul class="nav nav-pills nav-justified" style="margin-bottom: 10px">
                        <li><a href="<?php echo base_url(); ?>admin">Dashboard</a></li>
                        <?php if ($this->session->userdata('admin') == 1) : ?>
                        <li class="active"><a href="<?php echo base_url(); ?>admin/laporan">Laporan</a></li>
                        <?php endif ?>
                        <li><a href="<?php echo base_url(); ?>admin/progress">Sedang Ditangani</a></li>
                        <?php if ($this->session->userdata('admin') == 1) : ?>
                        <li><a href="<?php echo base_url(); ?>admin/pelapor">Manajemen User</a></li>
                        <?php endif ?>
                    </ul>
                        <div class="row">
                          <div class="col-md-6" style="margin-top: 5px;     margin-bottom: 15px;">
                        <a href="<?= base_url('admin/createLaporan') ?>" class="btn btn-warning btn-flat pt-4"><i class="glyphicon glyphicon-plus"></i> Tambah Laporan</a>
                          </div>
                        </div>
                    <table id="example1" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Ticket</th>
                                <th>Waktu Laporan</th>
                                <th>Jenis Laporan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                $i = 1;
                foreach ($laporan as $data) {
                  echo '
                  <tr>
                  <td>' . $i++ . '</td>
                  <td>' . $data->ticket . '</td>
                  <td>' . $data->waktu_laporan . '</td>
                  <td>' . $data->jenis_klasifikasi . '</td>
                  <td>
                  <button class="btn btn-success btn-flat" data-toggle="modal" data-target="#myModalDetail' . $data->id_aduan . '"><i class="glyphicon glyphicon-list-alt"></i> Detail</button>

                  <button class="btn btn-warning btn-flat" data-toggle="modal" data-target="#myModal' . $data->id_aduan . '"><i class="glyphicon glyphicon-check"></i> Verifikasi</button>
                  </td>
                  </tr>
                  ';
                }
                ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php
    foreach ($laporan as $data) {
      echo '
    <div id="myModal' . $data->id_aduan . '" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Action</h4>
          </div>
          <div class="modal-body">
            <p>
            <form method="post" action="' . base_url('index.php/admin/verif_lapor/') . '' . $data->id_aduan . '">
            <div class="form-group row">
            <label for="inputEmail3" class="col-sm-12 col-form-label">Jenis Aksi</label>
            <div class="col-sm-12">
            <select class="form-control" name="jenis" id="jenisAduan">
            <option value="">Pilih Action</option>
            <option value="1">Verifikasi</option>
            <option value="2">Tolak</option>
            </select>
            </div>
            </div>
            <div class="form-group row">
            <label for="inputEmail3" class="col-sm-12 col-form-label">Alasan</label>
            <div class="col-sm-12">
            <textarea class="form-control" name="alasan" id="" cols="30" rows="10"  placeholder="Masukan Alasan"></textarea>
            </div>
            </div>

            </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Submit</button>
          </div>
        </div>
        </form>
      </div>
    </div>
  ';
    } ?>


    <?php
    foreach ($laporan as $data) {
      echo '
    <div id="myModalDetail' . $data->id_aduan . '" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Detail</h4>
          </div>
          <div class="modal-body">
            <p>
            <form method="post" action="#">

            <div class="form-group row">
            <label for="inputEmail3" class="col-sm-12 col-form-label">Nama Pelapor</label>
            <div class="col-sm-12">
              <input type="text" class="form-control" disabled value="' . $data->nama_pelapor . '">
            </div>
            </div>

            <div class="form-group row">
            <label for="inputEmail3" class="col-sm-12 col-form-label">Waktu Laporan</label>
            <div class="col-sm-12">
              <input type="text" class="form-control" disabled value="' . $data->waktu_laporan . '">
            </div>
            </div>

            <div class="form-group row">
            <label for="inputEmail3" class="col-sm-12 col-form-label">Jenis Klasifikasi</label>
            <div class="col-sm-12">
              <input type="text" class="form-control" disabled value="' . $data->jenis_klasifikasi . '">
            </div>
            </div>

            <div class="form-group row">
            <label for="inputEmail3" class="col-sm-12 col-form-label">Perkiraan Waktu Kejadian</label>
            <div class="col-sm-12">
              <input type="text" class="form-control" disabled value="' . $data->waktu_kejadian . '">
            </div>
            </div>

            <div class="form-group row">
            <label for="inputEmail3" class="col-sm-12 col-form-label">Kategori Laporan</label>
            <div class="col-sm-12">
            <input type="text" class="form-control" disabled value="' . $data->kategori_laporan . '">
            </div>
            </div>

            <div class="form-group row">
            <label for="inputEmail3" class="col-sm-12 col-form-label">Judul Laporan</label>
            <div class="col-sm-12">
            <input type="text" class="form-control" disabled value="' . $data->judul_laporan . '">
            </div>
            </div>

            <div class="form-group row">
            <label for="inputEmail3" class="col-sm-12 col-form-label">Deskripsi Umum</label>
            <div class="col-sm-12">
              <textarea class="form-control" disabled>' . $data->deskripsi_umum . '</textarea>
            </div>
            </div>

            <div class="form-group row">
            <label for="inputEmail3" class="col-sm-12 col-form-label">Lokasi</label>
            <div class="col-sm-12">
              <input type="text" class="form-control" disabled value="' . $data->lokasi_aset . '">
            </div>
            </div>';
            if($data->jenis_klasifikasi == "Aduan"){
              echo '<img src="'.base_url().'uploads/'.$data->bukti.'" width="100%">';
            }
            $filesizes = filesize('uploads/'.$data->bukti);
            echo '
            <p>Ukuran File : '.round($filesizes / 1024, 0).' KB </p>
            <div class="form-group row">
            <label for="inputEmail3" class="col-sm-12 col-form-label">Bukti</label>
            <div class="col-sm-12">
              <a href="' . base_url() . 'uploads/' . $data->bukti . '" target="blank" class="btn btn-block btn-md btn-primary">Download</a>
            </div>
            </div>

            </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
        </form>
      </div>
    </div>
  ';
    } ?>

    <script>
$('#example1').DataTable({
    'paging': true,
    'lengthChange': true,
    'info': true,
    'autoWidth': true,
    "order": [
        [0, 'asc']
    ],
})
    </script>