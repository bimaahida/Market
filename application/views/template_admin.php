<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>LapakApotek | </title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url() ?>/assets/admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url() ?>/assets/admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url() ?>/assets/admin/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo base_url() ?>/assets/admin/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="<?php echo base_url() ?>/assets/admin/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="<?php echo base_url() ?>/assets/admin/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo base_url() ?>/assets/admin/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url() ?>/assets/admin/build/css/custom.min.css" rel="stylesheet">
      <script type="text/javascript" src="<?php echo base_url() ?>assets/vendor/jquery/jquery-3.2.1.min.js"></script>
      <script type='text/javascript' src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>  
      <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
      <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
      <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
    <!--===============================================================================================-->
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <img src="<?php echo base_url() ?>assets/gambar/logo.png" class="img-responsive" style="height: 100%;">
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <!-- <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>John Doe</h2>
              </div>
            </div> -->
            <!-- /menu profile quick info -->
            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a href="<?php echo site_url(); ?>/produk"><i class="fa fa-home"></i> Home</a> 
                  </li>
                  <li><a><i class="fa fa-shopping-cart"></i> Penjualan <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo site_url(); ?>/transaksi">Transaksi</a></li>
                      <li><a href="<?php echo site_url(); ?>/bukti_pembayaran">Bukti Pembayaran</a></li>
                    </ul>
                  </li>
                  <?php if ($this->session->userdata('logged_in')['status'] == 0) { ?> 
                  <li><a><i class="fa fa-user"></i> User<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo site_url(); ?>/apotek">Apotek</a></li>
                      <li><a href="<?php echo site_url(); ?>/customer">Customer</a></li>
                    </ul>
                  </li>
                  <?php } ?>
                  <li><a><i class="fa fa-edit"></i> Produk <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo site_url(); ?>/produk">Produk</a></li>
                      <li><a href="<?php echo site_url(); ?>/jenis_obat">Jenis Produk</a></li>
                    </ul>
                  </li>
                  <li><a href="<?php echo site_url(); ?>/resep"><i class="fa fa-inbox"></i> Resep </a>
                  </li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <!-- <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div> -->
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-user"></i>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li><a href="<?php echo site_url(); ?>/login/logout" ><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <section class="bgwhite p-t-55 p-b-65">
        <div class="right_col" role="main">
          <!-- top tiles -->
            <?= $content ?>
        </div>
        </section>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    
    <!-- Bootstrap -->
    <script src="<?php echo base_url() ?>/assets/admin/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url() ?>/assets/admin/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url() ?>/assets/admin/vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="<?php echo base_url() ?>/assets/admin/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="<?php echo base_url() ?>/assets/admin/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?php echo base_url() ?>/assets/admin/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url() ?>/assets/admin/vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="<?php echo base_url() ?>/assets/admin/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="<?php echo base_url() ?>/assets/admin/vendors/Flot/jquery.flot.js"></script>
    <script src="<?php echo base_url() ?>/assets/admin/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="<?php echo base_url() ?>/assets/admin/vendors/Flot/jquery.flot.time.js"></script>
    <script src="<?php echo base_url() ?>/assets/admin/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="<?php echo base_url() ?>/assets/admin/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="<?php echo base_url() ?>/assets/admin/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="<?php echo base_url() ?>/assets/admin/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/admin/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="<?php echo base_url() ?>/assets/admin/vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="<?php echo base_url() ?>/assets/admin/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="<?php echo base_url() ?>/assets/admin/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="<?php echo base_url() ?>/assets/admin/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo base_url() ?>/assets/admin/vendors/moment/min/moment.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/admin/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url() ?>/assets/admin/build/js/custom.min.js"></script>
	
  </body>
</html>
