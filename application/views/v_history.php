<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">

<section class="content-header">
    <h1>
        Beranda
        <small>E-Lapor</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">History</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="box box-success" id="box-laporan">
        <div class="box-header with-border">
            <h3 class="box-title">History E-Lapor</h3>
        </div>
        <div class="box-body" style="font-size: 1.0em">
        <table id="example2" class="display nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Waktu Laporan</th>
                        <th>Jenis Laporan</th>
                        <th>Action</th>
                        <th>Status</th>
                        <th>Comment</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
          foreach ($history as $data) {
            $status = 'Belum Di Verifikasi';
            $btn = 'btn-warning';
            if ($data->status_verif == 1) {
              $status = 'Terverifikasi';
              $btn = 'btn-success';
            }else if ($data->status_verif == 2) {
              $status = 'Laporan Ditolak';
              $btn = 'btn-danger';
            }
            echo '
              <tr>
                <td>' . $no. '</td>
                <td>' . $data->waktu_laporan . '</td>
                <td>' . $data->jenis_klasifikasi . '</td>';
            echo '
            <td>
            <button class="btn btn-success btn-flat btn-sm" data-toggle="modal" data-target="#myModalDetail'.$data->id_aduan.'"><i class="glyphicon glyphicon-list-alt"></i> Detail</button>
            </td>
                <td>
                <a href="#" style="cursor: default" class="btn ' . $btn . ' btn-flat btn-sm">' . $status . '</a>
                </td>
                <td>' . $data->alasan . '</td>
              </tr>
              ';
              $no++;
          }
          ?>
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->

</section>
<!-- /.content -->

<?php
foreach ($laporan as $data) {
  echo '
    <div id="myModalDetail'.$data->id_aduan.'" class="modal fade" role="dialog">
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
            echo '
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
}?>

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
<script src="<?php echo base_url('assets/app/history.js') ?>"></script>