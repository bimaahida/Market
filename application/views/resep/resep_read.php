<!doctype html>
<html>
    <head>
    </head>
    <body>
        <h2 style="margin-top:0px">Resep Read</h2>
        <table class="table">
	    <tr><td>Foto</td><td><?php echo $foto; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $status; ?></td></tr>
	    <tr><td>Id Transaksi</td><td><?php echo $id_transaksi; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('resep') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>