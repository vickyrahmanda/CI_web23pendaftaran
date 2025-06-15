<!-- Main Footer -->
<footer class="main-footer text-center">
  Vicky Rahmanda (SI 23 SH SIM) <strong>&copy; <?= date('Y') ?> Sistem Pendaftaran RS. </strong> All rights reserved.
</footer>

</div> <!-- /.wrapper -->

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
