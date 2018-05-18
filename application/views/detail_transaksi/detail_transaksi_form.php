<!doctype html>
<html>
    <head>
    </head>
    <body>
        <h2 style="margin-top:0px">Detail_transaksi <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id Transaksi <?php echo form_error('id_transaksi') ?></label>
            <input type="text" class="form-control" name="id_transaksi" id="id_transaksi" placeholder="Id Transaksi" value="<?php echo $id_transaksi; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Produk <?php echo form_error('id_produk') ?></label>
            <input type="text" class="form-control" name="id_produk" id="id_produk" placeholder="Id Produk" value="<?php echo $id_produk; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Jumlah <?php echo form_error('jumlah') ?></label>
            <input type="text" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah" value="<?php echo $jumlah; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Status <?php echo form_error('status') ?></label>
            <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('detail_transaksi') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>