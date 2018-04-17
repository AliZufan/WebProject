<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Data Siswa</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Info boxes -->
    <div class="row">
      <div class="col-md-4 col-sm-6 col-xs-12">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3><?= $jml_laki; ?></h3>

            <p>SISWA LAKI-LAKI</p>
          </div>
          <div class="icon">
            <i class="ion ion-man"></i>
          </div>
          <a href="<?= base_url('index.php/dashboard/table_laki');?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- /.col -->
      <div class="col-md-4 col-sm-6 col-xs-12">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3><?= $jml_perempuan; ?></h3>

            <p>SISWA PEREMPUAN</p>
          </div>
          <div class="icon">
            <i class="ion ion-woman"></i>
          </div>
          <a href="<?= base_url('index.php/dashboard/table_perempuan');?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- /.col -->

      <!-- fix for small devices only -->
      <div class="clearfix visible-sm-block"></div>

      <div class="col-md-4 col-sm-6 col-xs-12">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3><?= $jml_siswa; ?></h3>

            <p>TOTAL SISWA</p>
          </div>
          <div class="icon">
            <i class="ion ion-man"></i><i class="ion ion-woman"></i>
          </div>
          <a href="<?= base_url('index.php/dashboard/tabel_siswa');?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- /.col -->
      <div class="col-xs-12">
        <?php
        $notif = $this->session->flashdata('notif');
        $notif1 = $this->session->flashdata('notif1');
        if($notif != NULL){
          echo '
          <div class="alert alert-success">'.$notif.'
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          </div>
          ';
        } else if($notif1 != NULL){
          echo '
          <div class="alert alert-danger">'.$notif1.'
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          </div>
          ';
        }
        ?>
        <div class="box">
          <div class="box-header">
            <h3 class="box-title"><i class="ion ion-university"></i> Table Siswa Laki</h3>
            <a data-toggle="modal" data-target="#modal-insert" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Tambah Siswa</a>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="table1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>NIS</th>
                  <th>Nama</th>
                  <th>Tanggal Lahir</th>
                  <th>Jenis Kelamin</th>
                  <th>Alamat</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($siswa_laki as $sk) {
                  echo '
                  <tr>
                  <td>'.$sk->nis.'</td>
                  <td>'.$sk->nama_siswa.'</td>
                  <td>'.$sk->tgl_lahir.'</td>
                  <td>'.$sk->jenis_kelamin='Laki-Laki'.'</td>
                  <td>'.$sk->alamat.'</td>
                  <td>
                  <a data-toggle="modal" onclick="prepare_update('.$sk->id_siswa.')"
                  data-target="#modal-edit" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                  <a data-toggle="modal" onclick="prepare_update('.$sk->id_siswa.')"
                  data-target="#modal-delete" class="btn btn-danger"><i class="fa fa-times"></i></a>
                  </td>
                  </tr>
                  ';
                }
                ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>NIS</th>
                  <th>Nama</th>
                  <th>Tanggal Lahir</th>
                  <th>Jenis Kelamin</th>
                  <th>Alamat</th>
                  <th>Action</th>
                </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
    </div>
    <!-- /.row -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="modal fade" id="modal-edit">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" action="<?= base_url('index.php/dashboard/edit_siswa'); ?>" method="post">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"><i class="fa fa-pencil"></i> Edit Data Siswa</h4>
          </div>
          <div class="modal-body">
            <input type="hidden" name="id_siswa" id="id_siswa">
            <div class="form-group">
              <label>NIS :</label>
              <input type="text" class="form-control" name="edit_nis"  id="nis" required>
            </div>
            <div class="form-group">
              <label>Nama :</label>
              <input type="text" class="form-control" name="edit_nama"  id="nama" required>
            </div>
            <div class="form-group">
              <label>Jenis Kelamin :</label>
              <div class="radio">
                <label>
                  <input type="radio" name="jenis_kelamin" id="edit_laki" value="L">
                  Laki - Laki
                </label>
              </div>
              <div class="radio">
                <label>
                  <input type="radio" name="jenis_kelamin" id="edit_perempuan" value="P">
                  Perempuan
                </label>
              </div>
            </div>
            <div class="form-group">
              <label>Tanggal Lahir :</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right" name="edit_tgl" id="tgl_lahir">
              </div>
            </div>
            <div class="form-group">
              <label>Alamat :</label>
              <input type="text" class="form-control" name="edit_alamat"  id="alamat" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <input type="submit" name="Submit" class="btn btn-primary" value="Update">
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <div class="modal fade" id="modal-delete">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="<?php echo base_url('index.php/dashboard/delete_siswa/')?>" method="post">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Hapus Data Siswa</h4>
            </div>
            <div class="modal-body">
              <input type="hidden" name="id" id="id">
              Anda yakin akan menghapus data siswa [<b id="del_nis"></b>] <b id="del_nama"></b> ?
            </div>
            <div class="modal-footer">
              <input type="submit" name="Submit" value="Hapus Data"class="btn btn-primary">
            </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <script type="text/javascript">
      function prepare_update(id) {
        $('#id_siswa').val();
        $('#id').val();
        $('#nama').val();
        $('#tgl_lahir').val();
        $('#alamat').val();

        $.getJSON("<?php echo base_url('index.php/dashboard/getSiswaByID/') ?>"+id,
          function(data) {
            $('#id_siswa').val(data.id_siswa);
            $('#id').val(data.id_siswa);
            $('#nis').val(data.nis);
            $('#nama').val(data.nama_siswa);
            $('#tgl_lahir').val(data.tgl_lahir);
            $('#alamat').val(data.alamat);
            $('#del_nis').text(data.nis);
            $('#del_nama').text(data.nama_siswa);
            if(data.jenis_kelamin == "L"){
              $('#edit_laki').prop("checked","checked");
            } else {
              $('#edit_perempuan').prop("checked","checked");
            }
          });
      }
    </script>
