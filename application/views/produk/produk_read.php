<!doctype html>
<html>
    <head>
    </head>
    <body>
        <h2 style="margin-top:0px">Produk Read</h2>
        <table class="table">
	    <tr><td>Nama</td><td><?php echo $nama; ?></td></tr>
	    <tr><td>Komposisi</td><td><?php echo $komposisi; ?></td></tr>
	    <tr><td>Indikasi</td><td><?php echo $indikasi; ?></td></tr>
	    <tr><td>Isi</td><td><?php echo $isi; ?></td></tr>
	    <tr><td>Harga</td><td><?php echo $harga; ?></td></tr>
	    <tr><td>Gambar</td><td><?php echo $gambar; ?></td></tr>
	    <tr><td>Stok</td><td><?php echo $stok; ?></td></tr>
	    <tr><td>Berat</td><td><?php echo $berat; ?></td></tr>
	    <tr><td>Id Jenis</td><td><?php echo $id_jenis; ?></td></tr>
	    <tr><td>Id Apotek</td><td><?php echo $id_apotek; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('produk') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>