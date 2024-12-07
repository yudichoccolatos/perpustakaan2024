<!DOCTYPE html>
<html>
<head>
<title></title>
</head>
<body>
<style type="text/css">
.table-data{
    width: 100%;
    border-collapse: collapse;
}

.table-data tr th,
.table-data tr td{
    border:1px solid black;
    font-size: 11pt;
    padding: 10px 10px 10px 10px;
}
</style>

<h3><center>Laporan Data Buku Perpustakaan Online</center></h3>
<br/>
<table class="table-data">
  <thead>
    <tr>
      <th>No</th>
      <th>Judul Buku</th>
      <th>Pengarang</th>
      <th>Penerbit</th>
      <th>Tahun Penerbit</th>
      <th>ISBN</th>
      <th>Stok</th>
    </tr>
  </thead>
  <tbody>
        <?php
        $no = 1;
        foreach($buku as $b){
        ?>
        <tr>
        <th scope="row"><?php echo $no++; ?></th>
        <td><?php echo $b['judul_buku']; ?></td>
        <td><?php echo $b['pengarang']; ?></td>
        <td><?php echo $b['penerbit']; ?></td>
        <td><?php echo $b['tahun_terbit']; ?></td>
        <td><?php echo $b['isbn']; ?></td>
        <td><?php echo $b['stok']; ?></td>
        </tr>
        <?php
        }
        ?>
  </tbody>
  </table>
  </table>
  </html>