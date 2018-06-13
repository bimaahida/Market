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
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email<?php echo form_error('email') ?><span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" class="form-control col-md-7 col-xs-12" name="email" id="email" value="<?php echo $email; ?>" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Password<?php echo form_error('password') ?><span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" class="form-control col-md-7 col-xs-12" name="password" id="password" value="<?php echo $password; ?>" />
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
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jalan <?php echo form_error('alamat') ?><span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" class="form-control col-md-7 col-xs-12" name="alamat" id="alamat" value="<?php echo $alamat; ?>" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Provinsi <?php echo form_error('alamat') ?><span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select name="profinsi" class="form-control col-md-7 col-xs-12" onchange="getCity(this)">
                  <?php
                    foreach ($provinsi as $key) {
                    ?>
                    <option value="<?= $key->province_id?>"><?= $key->province?></option>
                    <?php
                    }
                  ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kota <?php echo form_error('alamat') ?><span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select id="kota" name="kota" class="form-control col-md-7 col-xs-12" onchange="setCity(this)" >
                </select> 
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
            <input type="hidden" id="name_prov" name="name_prov">
              <input type="hidden" id="name_city" name="name_city">
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
<script>
    function getCity(params){
      var respon = null;
      var sel = $('#kota');
      var name_prov = $('#name_prov');
      var xhr = new XMLHttpRequest();
      xhr.addEventListener("readystatechange", function () {
        if (this.readyState === 4) {
          var objRespon = JSON.parse(this.responseText);
          // console.log(objRespon.rajaongkir.results);
          name_prov.val(params.options[params.selectedIndex].text);
          sel.html("");
          $(objRespon.rajaongkir.results).each(function() {
            sel.append($("<option>").attr('value',this.city_id).text(this.city_name));
          });
          

        }
      });
      xhr.open("GET", "https://api.rajaongkir.com/starter/city?province="+params.value+"&key=6837122f92ac9ed5da97b37b5c75ee9e");
      xhr.setRequestHeader("content-type", "application/json");
      xhr.send();
    }
    function setCity(params){
      var name_city = $('#name_city');
      name_city.val(params.options[params.selectedIndex].text);
    }
  </script>




