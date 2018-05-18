<div class="">
<div class="page-title">
  <div class="title_left">
    <h3>Jenis Obat</h3>
  </div>
</div>
<div class="clearfix"></div>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2><?php echo $button ?></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br />
        <form  action="<?php echo $action; ?>" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama <?php echo form_error('nama') ?><span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" class="form-control col-md-7 col-xs-12" name="nama" id="nama" value="<?php echo $nama; ?>" />
            </div>
          </div>
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <input type="hidden" name="id" value="<?php echo $id; ?>" />

              <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
              <a href="<?php echo site_url('jenis_obat') ?>" class="btn btn-success">Cancel</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
