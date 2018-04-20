<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title;?></title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/AdminLTE/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/AdminLTE/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/AdminLTE/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/AdminLTE/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/AdminLTE/bower_components/morris.js/morris.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/AdminLTE/bower_components/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/AdminLTE/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/AdminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <header class="main-header">
    <a href="<?php echo base_url();?>index.php/main/admin" class="logo">
      <span class="logo-mini"><b>F</b>CCM</span>
      <span class="logo-lg"><b>FC</b>&CMS</span>
    </a>

    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <?php $this->view('top_nav_view');?>
      </div>
    </nav>
  </header>
  <aside class="main-sidebar">
    <?php $this->view('side_menu_view'); ?>
  </aside>

  <div class="content-wrapper">
    <section class="content-header">
      <h1>Dashboard</h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>150</h3>
              <p>จำนวนรายการสินค้าในสหการ</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">รายละเอียด <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-green">
            <div class="inner">
              <h3>53</h3>
              <p>จำนวนรายการอาหาร</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">รายละเอียด <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

		<div class="col-lg-3 col-xs-6">
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>44</h3>
              <p>จำนวนนักเรียน</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">รายละเอียด <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

		<div class="col-lg-3 col-xs-6">
          <div class="small-box bg-red">
            <div class="inner">
              <h3>65</h3>
              <p>จำนวนบุคลากร</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">รายละเอียด <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>

	  <div class="row">
        <section class="col-lg-7 connectedSortable">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs pull-right">
              <li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>
              <li><a href="#sales-chart" data-toggle="tab">Donut</a></li>
              <li class="pull-left header"><i class="fa fa-inbox"></i>ยอดขายของร้านสหการ</li>
            </ul>
            <div class="tab-content no-padding">
              <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
              <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
            </div>
          </div>
        </section>

		<section class="col-lg-5 connectedSortable">
          <div class="box box-solid bg-light-blue-gradient">
           <div class="box-header">
              <i class="fa fa-th"></i>
              <h3 class="box-title">ยอดขายร้านค้า</h3>
            </div>
            <div class="box-body border-radius-none">
              <div class="chart" id="line-chart" style="height: 250px;"></div>
            </div>
            <div class="box-footer no-border">
              <div class="row">
                <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                  <input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60"
                         data-fgColor="#39CCCC">
                  <div class="knob-label">Mail-Orders</div>
                </div>
                <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                  <input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60"
                         data-fgColor="#39CCCC">
                  <div class="knob-label">Online</div>
                </div>
                <div class="col-xs-4 text-center">
                  <input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60"
                         data-fgColor="#39CCCC">
                  <div class="knob-label">In-Store</div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </section>
  </div>
  <footer class="main-footer">
		<?php $this->view('footer_view'); ?>
  </footer>

</div>

<script src="<?php echo base_url();?>/assets/AdminLTE/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url();?>/assets/AdminLTE/bower_components/jquery-ui/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="<?php echo base_url();?>/assets/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>/assets/AdminLTE/bower_components/raphael/raphael.min.js"></script>
<script src="<?php echo base_url();?>/assets/AdminLTE/bower_components/morris.js/morris.min.js"></script>
<script src="<?php echo base_url();?>/assets/AdminLTE/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url();?>/assets/AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url();?>/assets/AdminLTE/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="<?php echo base_url();?>/assets/AdminLTE/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<script src="<?php echo base_url();?>/assets/AdminLTE/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url();?>/assets/AdminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="<?php echo base_url();?>/assets/AdminLTE/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url();?>/assets/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="<?php echo base_url();?>/assets/AdminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url();?>/assets/AdminLTE/bower_components/fastclick/lib/fastclick.js"></script>
<script src="<?php echo base_url();?>/assets/AdminLTE/dist/js/adminlte.min.js"></script>
<script src="<?php echo base_url();?>/assets/AdminLTE/dist/js/pages/dashboard.js"></script>
<script src="<?php echo base_url();?>/assets/AdminLTE/dist/js/demo.js"></script>
</body>
</html>
