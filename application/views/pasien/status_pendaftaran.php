<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Status Pendaftaran</title>
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
          <li class="nav-item">
            <a href="<?= base_url('pasien/status') ?>" class="btn btn-success">Cek Status</a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('logout') ?>" class="btn btn-danger ml-3 logout">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Content Wrapper -->
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container">
        <h3 class="text-center mb-3">Status Pendaftaran Anda</h3>
      </div>
    </div>

    <div class="content">
      <div class="container">
        <div class="card">
          <div class="card-body">
            <?php if (empty($pendaftaran)): ?>
              <p>Anda belum melakukan pendaftaran.</p>
            <?php else: ?>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Dokter</th>
                    <th>Keluhan</th>
                    <th>Jadwal Kunjungan</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($pendaftaran as $p): ?>
                    <tr>
                      <td><?= isset($p['nama_dokter']) ? $p['nama_dokter'] : 'Tidak diketahui' ?></td>
                      <td><?= $p['keluhan'] ?></td>
                      <td><?= date('d-m-Y H:i', strtotime($p['jadwal_kunjungan'])) ?></td>
                      <td><span class="badge badge-<?= $p['status'] == 'diterima' ? 'success' : ($p['status'] == 'ditolak' ? 'danger' : 'warning') ?>"><?= ucfirst($p['status']) ?></span></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<?php $this->load->view('layout/footer'); ?>

</body>
</html>