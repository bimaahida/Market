<!doctype html>
<html>
    <head>
    </head>
    <body>
        <h2 style="margin-top:0px">Detail_transaksi Read</h2>
        <table class="table">
	    <tr><td>Id Transaksi</td><td><?php echo $id_transaksi; ?></td></tr>
	    <tr><td>Id Produk</td><td><?php echo $id_produk; ?></td></tr>
	    <tr><td>Jumlah</td><td><?php echo $jumlah; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $status; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('detail_transaksi') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>