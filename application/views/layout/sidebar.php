<!-- Sidebar -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="<?= base_url('admin') ?>" class="brand-link">
    <i class="nav-icon fas fa-user"></i>
    <span class="brand-text font-weight-light"> Admin RS</span>
  </a>
  <div class="sidebar">
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" role="menu">
        <li class="nav-item">
          <a href="<?= base_url('admin') ?>" class="nav-link">
            <i class="nav-icon fas fa-home"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('admin/pendaftaran') ?>" class="nav-link">
            <i class="nav-icon fas fa-file-medical"></i>
            <p>Data Pendaftaran</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('admin/pasien') ?>" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>Data Pasien</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('admin/dokter') ?>" class="nav-link">
            <i class="nav-icon fas fa-user-md"></i>
            <p>Data Dokter</p>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>