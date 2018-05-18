<html>
    <head>
        <title>Master Barang</title>
        <link href='<?php echo base_url(); ?>resources/css/style.css' rel='stylesheet' type='text/css' />
        <script>
            function jsTambah() {
                document.location = 'barang/tambah';
            }
        </script>
    </head>
    <body>
        <h1>Master Barang (View List)</h1>
        <a href='<?php echo site_url(); ?>/satuan'>SATUAN</a>
        <br /><br />
        <input type='button' name='btnTambah' value='Tambah' onClick='javascript: jsTambah();' />
        <br /><br />
        <table width='100%' align='center' cellspacing='0' cellpadding='0'>
            <tr>
                <th width='1%'>Kode</th>
                <th width='15%'>Satuan</th>
                <th>Nama Barang</th>
                <th width='10%'>Harga Jual</th>
                <th width='100'><i>perintah</i></th>
            </tr>
            <?php foreach($data as $row) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['nama_satuan']; ?></td>
                    <td><?php echo $row['nama_barang']; ?></td>
                    <td><?php echo $row['harga_jual']; ?></td>
                    <td align='center'>
                        <a href='<?php echo site_url(); ?>/barang/edit/<?php echo $row['id']; ?>'>Edit</a> |
                        <a href='<?php echo site_url(); ?>/barang/hapus/<?php echo $row['id']; ?>'>Hapus</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </body>
</html>
