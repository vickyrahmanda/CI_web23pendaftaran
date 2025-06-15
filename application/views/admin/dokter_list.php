<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/sidebar'); ?>

<div class="wrapper">
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Dokter</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Home</a></li>
              <li class="breadcrumb-item active">Dokter</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header">
            <a href="<?= base_url('admin/dokter_tambah') ?>" class="btn btn-sm btn-primary">
              <i class="fas fa-plus"></i> Tambah Dokter
            </a>
          </div>
          <div class="card-body">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Nama Dokter</th>
                  <th>Spesialis</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($dokter as $d): ?>
                <tr>
                  <td>Dr. <?= $d['nama_dokter'] ?></td>
                  <td><?= $d['spesialis'] ?></td>
                  <td>
                    <a href="<?= base_url('admin/dokter_edit/' . $d['id_dokter']) ?>" class="btn btn-sm btn-warning">
                      <i class="fas fa-edit"></i> Edit
                    </a>
                    <a href="<?= base_url('admin/dokter_hapus/' . $d['id_dokter']) ?>" class="btn btn-sm btn-danger"
                      onclick="return confirm('Yakin ingin menghapus dokter ini?')">
                      <i class="fas fa-trash"></i> Hapus
                    </a>
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