<!DOCTYPE html>
<html>

<head>
  <title>Laporan Pendaftaran</title>
  <style>
  body {
    font-family: sans-serif;
    font-size: 12px;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
  }

  th,
  td {
    border: 1px solid #000;
    padding: 4px;
    text-align: left;
  }
  </style>
</head>

<body>
  <h3>Laporan Pendaftaran Pasien</h3>
  <table>
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Pasien</th>
        <th>Tanggal Daftar</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1; foreach ($pendaftaran as $row): ?>
      <tr>
        <td><?= $no++ ?></td>
        <td><?= $row->nama_pasien ?></td>
        <td><?= $row->tanggal_daftar ?></td>
        <td><?= $row->status ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</body>

</html>