<!doctype html>
<html>
    <head>
    </head>
    <body>
        <h2 style="margin-top:0px">Transaksi Read</h2>
        <table class="table">
	    <tr><td>Tgl</td><td><?php echo $tgl; ?></td></tr>
	    <tr><td>Total</td><td><?php echo $total; ?></td></tr>
	    <tr><td>Metode</td><td><?php echo $metode; ?></td></tr>
	    <tr><td>Ongkir</td><td><?php echo $ongkir; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $status; ?></td></tr>
	    <tr><td>Id Customer</td><td><?php echo $id_customer; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('transaksi') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>