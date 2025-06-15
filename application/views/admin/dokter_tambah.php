<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Tambah Dokter</title>
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/') ?>plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/') ?>dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/sidebar'); ?>

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tambah Dokter</h1>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-body">
          <form action="<?= base_url('admin/dokter_simpan') ?>" method="post">
            <div class="form-group">
              <label>Nama Dokter</label>
              <input type="text" name="nama_dokter" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Spesialis</label>
              <input type="text" name="spesialis" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?= base_url('admin/dokter') ?>" class="btn btn-secondary ml-2">Kembali</a>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>

<?php $this->load->view('layout/footer'); ?>
</div>
</body>
</html>
