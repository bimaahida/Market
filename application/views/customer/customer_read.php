<!doctype html>
<html>
    <head>
    </head>
    <body>
        <h2 style="margin-top:0px">Customer Read</h2>
        <table class="table">
	    <tr><td>Nama</td><td><?php echo $nama; ?></td></tr>
	    <tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
	    <tr><td>No Hp</td><td><?php echo $no_hp; ?></td></tr>
	    <tr><td>Id Login</td><td><?php echo $id_login; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('customer') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>