<div class="">
  <div class="page-title">
  </div>
  <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2><?php echo $button ?> Produk</h2>
            <div class="clearfix">
            </div>
          </div>
          <div class="x_content">
            <br />
            <form  action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Produk<?php echo form_error('nama') ?><span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" class="form-control col-md-7 col-xs-12" name="nama" id="nama" value="<?php echo $nama; ?>" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Komposisi<?php echo form_error('komposisi') ?><span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" class="form-control col-md-7 col-xs-12" name="komposisi" id="komposisi" value="<?php echo $komposisi; ?>" />
              </div>
            </div>
             <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Indikasi<?php echo form_error('indikasi') ?><span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" class="form-control col-md-7 col-xs-12" name="indikasi" id="indikasi" value="<?php echo $indikasi; ?>" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Efek Samping<?php echo form_error('efeksamping') ?><span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" class="form-control col-md-7 col-xs-12" name="efeksamping" id="efeksamping" value="<?php echo $efeksamping; ?>" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Isi<?php echo form_error('isi') ?><span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" class="form-control col-md-7 col-xs-12" name="isi" id="isi" value="<?php echo $isi; ?>" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Harga<?php echo form_error('harga') ?><span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" class="form-control col-md-7 col-xs-12" name="harga" id="harga" value="<?php echo $harga; ?>" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Gambar<?php echo form_error('gambar') ?><span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="file" class="form-control  col-md-7 col-xs-12" name="gambar_form" id="gambar_form" value="<?php echo $gambar; ?>" />
              </div>
            </div> 
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Stok<?php echo form_error('stok') ?><span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" class="form-control col-md-7 col-xs-12" name="stok" id="stok" value="<?php echo $stok; ?>" />
              </div>
            </div> 
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Berat<?php echo form_error('berat') ?><span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" class="form-control col-md-7 col-xs-12" name="berat" id="berat" value="<?php echo $berat; ?>" />
              </div>
            </div> 
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Id Jenis<?php echo form_error('id_jenis') ?><span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" class="form-control col-md-7 col-xs-12" name="id_jenis" id="id_jenis" value="<?php echo $id_jenis; ?>" />
              </div>
            </div> 
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Id Apotek<?php echo form_error('id_apotek') ?><span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" class="form-control col-md-7 col-xs-12" name="id_apotek" id="id_apotek" value="<?php echo $id_apotek; ?>" />
              </div>
            </div> 
	        <div class="ln_solid">   
            </div>
            <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <input type="hidden" name="id" value="<?php echo $id; ?>" />
                  <input type="hidden" name="gambar" value="<?php echo $gambar; ?>" /> 
                  <button type="submit" class="btn btn-success"><?php echo $button ?></button> 
                  <a href="<?php echo site_url('produk') ?>" class="btn btn-warning">Cancel</a>
                </div>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
