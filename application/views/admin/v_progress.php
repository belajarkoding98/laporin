<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

      <!-- Main content -->
      <section class="content container-fluid">

        <div class="box box-solid">
          <div class="box-body">

            <ul class="nav nav-pills nav-justified" style="margin-bottom: 10px">
              <li><a href="<?php echo base_url(); ?>admin">Dashboard</a></li>
              <?php if ($this->session->userdata('admin') == 1): ?>
                <li><a href="<?php echo base_url(); ?>admin/laporan">Laporan</a></li>
              <?php endif ?>
              <li class="active"><a href="<?php echo base_url(); ?>admin/progress">Proses Laporan</a></li>
              <?php if ($this->session->userdata('admin') == 1): ?>
                <li><a href="<?php echo base_url(); ?>admin/pelapor">Manajemen User</a></li>
              <?php endif ?>
            </ul>
            <?php if ($this->session->userdata('admin') == 1): ?>
            <ul class="nav nav-pills nav-justified" style="margin-bottom: 10px">
              <li class="active"><a style="background-color: #00a65a; border-color: #00a65a;" href="<?php echo base_url(); ?>admin/progress">Sedang Ditangani</a></li>
                <li><a href="<?php echo base_url(); ?>admin/progress_ditolak">Ditolak</a></li>
              </ul>
              <?php endif ?>

            <table id="pelapor" class="table table-bordered table-striped table-hover">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Ticket</th>
                  <th>Waktu Laporan</th>
                  <th>Jenis Laporan</th>
                  <th>Action</th>
                  <th>Nama</th>
                  <th>Perkiraan Waktu Kejadian</th>
                  <th>Kategori Laporan</th>
                  <th>Judul Laporan</th>
                  <th>Deskripsi Umum</th>
                  <th>Lokasi</th>
                  <th>Status</th>
                  <th>Comment</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i=1;
                foreach ($laporan as $data) {

                if ($this->session->userdata('admin') == 1) {
                  echo '
                  <tr>
                  <td>'.$i++.'</td>
                  <td>'.$data->ticket.'</td>
                  <td>'.$data->waktu_laporan.'</td>
                  <td>'.$data->jenis_klasifikasi.'</td>
                  <td>
                  <button class="btn btn-success btn-flat" data-toggle="modal" data-target="#myModalDetail'.$data->id_aduan.'"><i class="glyphicon glyphicon-list-alt"></i> Detail</button>
                  </td>
                  <td>'.$data->nama_pelapor.'</td>
                  <td>'.$data->waktu_kejadian.'</td>
                  <td>'.$data->kategori_laporan.'</td>
                  <td>'.$data->judul_laporan.'</td>
                  <td>'.$data->deskripsi_umum.'</td>
                  <td>'.$data->lokasi_aset.'</td>
                  <td style="text-align: center">';
                if ($this->session->userdata('tipe') == null) {
                  if ($data->status == 1) {
                    echo '
                    <select class="form-control" onchange="updateStatus('.$data->id_aduan.',this.value)">
                      <option value="1">Sedang Diproses</option>
                      <option value="2">Selesai Diproses</option>
                      <option value="3">Batal Diproses</option>
                    </select>
                    ';
                  } elseif ($data->status == 2) {
                    echo '
                    <select class="form-control" onchange="updateStatus('.$data->id_aduan.',this.value)">
                    <option value="1">Sedang Diproses</option>
                    <option value="2">Selesai Diproses</option>
                    <option value="3">Batal Diproses</option>
                    </select>
                    ';
                  } elseif($data->status == 3) {
                    echo '
                    <select class="form-control" onchange="updateStatus('.$data->id_aduan.',this.value)">
                    <option value="1">Sedang Diproses</option>
                    <option value="2">Selesai Diproses</option>
                    <option value="3">Batal Diproses</option>
                    </select>
                    ';
                  } elseif($data->status == 4){
                    echo '
                    <select class="form-control" onchange="updateStatus('.$data->id_aduan.',this.value)">
                    <option value="1">Sedang Diproses</option>
                    <option value="2">Selesai Diproses</option>
                    <option value="3">Batal Diproses</option>
                    </select>
                    ';
                  }                   
                  } else {
                    if ($data->status == 1) {
                      echo '<h4>Sedang Diproses</h4>';
                    } elseif ($data->status == 2) {
                      echo '<h4>Selesai Diproses</h4>';
                    }elseif ($data->status == 3) {
                      echo '<h4>Batal Diproses</h4>';
                    }
                  }
                  echo '</td>
                  <td>'.$data->alasan.'</td>
                  </tr>
                  ';
                  }  

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
}?>

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
<!-- <script src="<php echo base_url('assets/app/history.js') ?>"></script> -->

    <script type="text/javascript">
      function updateStatus(id,a) {
        $.ajax({
          url: '<?php echo base_url(); ?>admin/updateStatusAduan/'+id+'/'+a,
          type: 'POST',
          dataType: 'json',
          data: '',
          success: function(r){

          }
        })
      }

      $('#pelapor').DataTable({
        'paging': true,
    'lengthChange': true,
    'info': true,
    'autoWidth': true,
    "order": [
        [0, 'asc']
    ],
    "columnDefs": [
      {
        targets: [5,6,7,8,9,10],
        visible: false,
        searchable: false,
      },
    ],
    dom: 'Bfrtip',
    buttons: [
      {
                extend: 'copyHtml5',
                title: 'Data Transaksi ',
                exportOptions: {
                  columns: [0, 2, 3, 5, 6, 7, 8, 9, 10],
                },
            },
            {
                extend: 'excelHtml5',
                title: 'Data Transaksi ',
                exportOptions: {
                    columns: [0, 2, 3, 5, 6, 7, 8, 9, 10],
                },
            },
            {
                extend: 'pdfHtml5',
                title: 'Data Transaksi ' ,
                orientation: 'landscape',
                pageSize: 'A4',
                download: 'open',
                exportOptions: {
                    columns: [0, 2, 3, 5, 6, 7, 8, 9, 10],
                },
                customize: function(doc) {
                    doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                    doc.styles.tableBodyEven.alignment = 'center';
                    doc.styles.tableBodyOdd.alignment = 'center';
                },
            },
          ],
})
    </script>