<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/sidebar'); ?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Data Pendaftaran Pasien</title>
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/') ?>plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/') ?>dist/css/adminlte.min.css">
</head>

<div class="wrapper">
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Pendaftaran Pasien</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Home</a></li>
              <li class="breadcrumb-item active">Pendaftaran</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header">
            <div class="mb-3">
              <a href="<?= base_url('admin/export_csv') ?>" class="btn btn-success btn-sm mr-2">
                <i class="fas fa-file-csv"></i> Download CSV
              </a>
              <a href="<?= base_url('admin/export_pdf') ?>" class="btn btn-danger btn-sm mr-2">
                <i class="fas fa-file-pdf"></i> Download PDF
              </a>
            </div>

          </div>
          <div class="card-body">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Nama Pasien</th>
                  <th>Dokter</th>
                  <th>Keluhan</th>
                  <th>Jadwal</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($pendaftaran as $p): ?>
                <tr>
                  <td><?= isset($p['nama_pasien']) ? $p['nama_pasien'] : 'N/A' ?></td>
                  <td>Dr. <?= isset($p['nama_dokter']) ? $p['nama_dokter'] : 'N/A' ?>
                    (<?= isset($p['spesialis']) ? $p['spesialis'] : '-' ?>)</td>
                  <td><?= $p['keluhan'] ?></td>
                  <td><?= date('d-m-Y H:i', strtotime($p['jadwal_kunjungan'])) ?></td>
                  <td><span
                      class="badge badge-<?= $p['status'] == 'diterima' ? 'success' : ($p['status'] == 'ditolak' ? 'danger' : 'warning') ?>">
                      <?= ucfirst($p['status']) ?></span></td>
                  <td>
                    <a href="<?= base_url('admin/set_status/'.$p['id_pendaftaran'].'/diterima') ?>"
                      class="btn btn-sm btn-success">Setujui</a>
                    <a href="<?= base_url('admin/set_status/'.$p['id_pendaftaran'].'/ditolak') ?>"
                      class="btn btn-sm btn-danger">Tolak</a>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>

<?php $this->load->view('layout/footer'); ?>

</html>