<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Form Pendaftaran Pasien</title>
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/') ?>plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/') ?>dist/css/adminlte.min.css">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="#" class="navbar-brand">
        <span class="brand-text font-weight-light">Dashboard Pasien</span>
      </a>

      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a href="<?= base_url('pasien') ?>" class="btn btn-secondary mr-2">Dashboard</a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('pasien/daftar') ?>" class="btn btn-primary mr-2">Form Pendaftaran</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Content Wrapper -->
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container">
        <h3 class="text-center mb-3">Form Pendaftaran Pasien</h3>
      </div>
    </div>

    <div class="content">
      <div class="container">
        <div class="card">
          <div class="card-body">
            <?php if ($this->session->flashdata('success')): ?>
              <div class="alert alert-success"> <?= $this->session->flashdata('success') ?> </div>
            <?php endif; ?>
            <form action="<?= base_url('pasien/daftar') ?>" method="post">
              <div class="form-group">
                <label>Nama Pasien</label>
                <input type="text" name="nama_pasien" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Tanggal Lahir</label>
                <input type="date" name="tgl_lahir" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control" required></textarea>
              </div>
              <div class="form-group">
                <label>No Telepon</label>
                <input type="text" name="telepon" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Dokter Spesialis</label>
                <select name="id_dokter" class="form-control" required>
                  <option value="">-- Pilih Dokter --</option>
                  <?php foreach($dokter as $d): ?>
                    <option value="<?= $d['id_dokter'] ?>">Dr. <?= $d['nama_dokter'] ?> (<?= $d['spesialis'] ?>)</option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label>Keluhan</label>
                <textarea name="keluhan" class="form-control" required></textarea>
              </div>
              <div class="form-group">
                <label>Jadwal Kunjungan</label>
                <input type="datetime-local" name="jadwal_kunjungan" class="form-control" required>
              </div>
              <a href="<?= base_url('pasien/daftar') ?>" class="btn btn-primary mr-2"><button type="submit" class="btn btn-primary">Daftar</button></a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<script src="<?= base_url('assets/adminlte/') ?>plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/adminlte/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/adminlte/') ?>dist/js/adminlte.min.js"></script>
<script>
  document.querySelectorAll('a.logout').forEach(function(el) {
    el.addEventListener('click', function(e) {
      if (!confirm('Apakah Anda yakin ingin logout?')) {
        e.preventDefault();
      }
    });
  });
</script>

</body>
</html>