<div class="">
  <div class="page-title">
  </div>
  <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2><?php echo $button ?> Apotek</h2>
            <div class="clearfix">
            </div>
          </div>
          <div class="x_content">
            <br />
            <form  action="<?php echo $action; ?>" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Apotek<?php echo form_error('nama') ?><span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" class="form-control col-md-7 col-xs-12" name="nama" id="nama" value="<?php echo $nama; ?>" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No HP <?php echo form_error('no_hp') ?><span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" class="form-control col-md-7 col-xs-12" name="no_hp" id="no_hp" value="<?php echo $no_hp; ?>" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Alamat Lengkap <?php echo form_error('alamat') ?><span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" class="form-control col-md-7 col-xs-12" name="alamat" id="alamat" value="<?php echo $alamat; ?>" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Bank & No Rekening <?php echo form_error('no_rek') ?><span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" class="form-control col-md-7 col-xs-12" name="no_rek" id="no_rek" value="<?php echo $no_rek; ?>" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No Izin Apotek <?php echo form_error('no_izin') ?><span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" class="form-control col-md-7 col-xs-12" name="no_izin" id="no_izin" value="<?php echo $no_izin; ?>" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Apoteker <?php echo form_error('apoteker') ?><span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" class="form-control col-md-7 col-xs-12" name="apoteker" id="apoteker" value="<?php echo $apoteker; ?>" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Id Login <?php echo form_error('id_login') ?><span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" class="form-control col-md-7 col-xs-12" name="id_login" id="id_login" value="<?php echo $id_login; ?>" />
              </div>
            </div>
	        <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <input type="hidden" name="id" value="<?php echo $id; ?>" />
                  <button type="submit" class="btn btn-success"><?php echo $button ?></button> 
                  <a href="<?php echo site_url('apotek') ?>" class="btn btn-warning">Cancel</a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>




