<!doctype html>
<html>
    <head>
    </head>
    <body>
        <h2 style="margin-top:0px">Bukti Pembayaran Read</h2>
        <table class="table">
	    <tr><td>Pengirim</td><td><?php echo $pengirim; ?></td></tr>
	    <tr><td>Penerima</td><td><?php echo $penerima; ?></td></tr>
	    <tr><td>Foto</td><td><?php echo $foto; ?></td></tr>
	    <tr><td>Tgl Upload</td><td><?php echo $tgl_upload; ?></td></tr>
	    <tr><td>Id Transaksi</td><td><?php echo $id_transaksi; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('bukti_pembayaran') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>