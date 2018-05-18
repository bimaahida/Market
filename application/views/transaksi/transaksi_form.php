<div class="">
  <div class="page-title">
  </div>
  <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2 style><?php echo $button ?> Transaksi</h2>
            <div class="clearfix">
            </div>
          </div>
          <div class="x_content">
            <br />
            <form  action="<?php echo $action; ?>" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal <?php echo form_error('tgl') ?><span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" class="form-control col-md-7 col-xs-12" name="tgl" id="tgl" value="<?php echo $tgl; ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Total <?php echo form_error('total') ?><span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" class="form-control col-md-7 col-xs-12" name="total" id="total" value="<?php echo $total; ?>" />
                </div>
            </div>
             <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Metode <?php echo form_error('metode') ?><span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" class="form-control col-md-7 col-xs-12" name="metode" id="metode" value="<?php echo $metode; ?>" />
                </div>
            </div>
             <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ongkir <?php echo form_error('ongkir') ?><span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" class="form-control col-md-7 col-xs-12" name="ongkir" id="ongkir" value="<?php echo $ongkir; ?>" />
                </div>
            </div>
             <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Status <?php echo form_error('tgl') ?><span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" class="form-control col-md-7 col-xs-12" name="status" id="status" value="<?php echo $status; ?>" />
                </div>
            </div>
             <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Id Customer <?php echo form_error('tgl') ?><span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" class="form-control col-md-7 col-xs-12" name="id_customer" id="id_customer" value="<?php echo $id_customer; ?>" />
                </div>
            </div>
            <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <input type="hidden" name="id" value="<?php echo $id; ?>" />
                  <button type="submit" class="btn btn-success"><?php echo $button ?></button> 
                  <a href="<?php echo site_url('transaksi') ?>" class="btn btn-warning">Cancel</a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>