<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>LapakApotek! | </title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url() ?>assets/admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url() ?>assets/admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url() ?>assets/admin/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo base_url() ?>assets/admin/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url() ?>assets/admin/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="<?php echo $action_login; ?>" method="post">
              <h1>Login</h1>
              <div>
                <input type="email" name="email_input" id="email_input" class="form-control" placeholder="Email" required>
              </div>
              <div>
                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
              </div>
              <div>
                <input class="btn btn-primary submit" type="submit" value="Login" style="margin-left: 38%;">
              </div>

              <div class="clearfix"></div>

              <div class="separator">
              <p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p>
                <div class="clearfix"></div>
                <div>
                  <img src="<?php echo base_url() ?>assets/gambar/logo.png" style="width: 250px">
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
          <?= $action_register;?>
            <form action="<?php echo $action_register; ?>" method="post">
              <h1>Create Account</h1>
              <div>
                <input type="text" name="nama" class="form-control" placeholder="Nama" required="" />
              </div>
              <div>
                <input type="text" name="tlp" class="form-control" placeholder="No Telepon" required="" />
              </div>
              <div>
                <input type="email" name="email_register" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" name="password_register" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <input type="text" name="jalan" class="form-control" placeholder="Jalan" required="" />
              </div>
              <div>
                <select name="profinsi" class="form-control" onchange="getCity(this)">
                  <?php
                    foreach ($provinsi as $key) {
                    ?>
                    <option value="<?= $key->province_id?>"><?= $key->province?></option>
                    <?php
                    }
                  ?>
                </select>
              </div>
              <br>
              <div>
                <select id="kota" name="kota" class="form-control" onchange="setCity(this)" >
                </select>
              </div>
              <input type="hidden" id="name_prov" name="name_prov">
              <input type="hidden" id="name_city" name="name_city">
              <div>
                <input class="btn btn-default submit" type="submit" value="Submit" style="margin-top: 5%;margin-left: 38%;">
                <!-- <a class="btn btn-default submit" href="index.html">Submit</a> -->
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <img src="<?php echo base_url() ?>assets/gambar/logo.png" style="width: 250px">
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
  <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
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
</html>