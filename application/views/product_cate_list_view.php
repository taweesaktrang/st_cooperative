


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
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/AdminLTE/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/AdminLTE/dist/css/skins/_all-skins.min.css">

  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

	   <style type="text/css">
    html,body {
        padding: 0;
        margin: 0;
        width: 100%;
        height: 100%;
    }
    #overlay {
        position: absolute;
        top: 0px;
        left: 0px;
        background: #ccc;
        width: 100%;
        height: 100%;
        opacity: .75;
        filter: alpha(opacity=75);
        -moz-opacity: .75;
        z-index: 999;
        background: #fff url(../../assets/AdminLTE/dist/img/loading.gif) 50% 50% no-repeat;
    }
    .main-contain{
        position: absolute;
        top: 0px;
        left: 0px;
        width: 100%;
        height: 100%;
        overflow: hidden;
    }
    </style>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div id="overlay"></div>
<div class="main-contain">
<div class="wrapper">
  <header class="main-header">
    <a href="<?php echo base_url();?>index.php/main/admin" class="logo">
      <span class="logo-mini"><b>F</b>CCM</span>
      <span class="logo-lg"><b>FC</b>&CMS</span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
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
      <h1>ข้อมูลหมวดหมู่สินค้า</h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>index.php/main/admin"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
        <li class="active">ข้อมูลหมวดหมู่สินค้า</a></li>

      </ol>
    </section>
	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body">
              <a href="<?php echo base_url()?>index.php/product_cate/add_product_cate">
					<button class="btn btn-success" ><i class="glyphicon glyphicon-plus"></i> เพิ่มหมวดหมู่สินค้า</button>
			   </a>
            </div>
		   <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="10%">รหัสหมวดหมู่</th>
                  <th>ชื่อหมวดหมู่</th>
                  <th width="12%">Action</th>
                </tr>
                </thead>
                <tbody>
				<?php foreach($result as $row){?>
				<tr>
                  <td><?php echo $row->prd_cat_id;?></td>
                  <td><?php echo  $row->prd_cat_name;?></td>
                  <td>
					<a href="<?php echo base_url()?>index.php/product_cate/edit_product_cate/<?php echo $row->prd_cat_id?>">
					<button class="btn  btn-default btn-sm" ><i class="glyphicon glyphicon-pencil"></i></button>
				</a>
                <a href="<?php echo base_url()?>index.php/product_cate/delete_product_cate/<?php echo $row->prd_cat_id?>"  onclick='return confirm("ยืนยันการลบข้อมูลรายการนี้ ?")'>
					<button class="btn  btn-warning btn-sm" ><i class="glyphicon glyphicon glyphicon-trash"></i></button>
				</a>
                  </td>
                </tr>
				<?php } ?>
                </tbody>

              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <footer class="main-footer">
      <?php $this->view('footer_view'); ?>
  </footer>

 
  <div class="control-sidebar-bg"></div>
</div>
</div>
<script src="<?php echo base_url();?>/assets/AdminLTE/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url();?>/assets/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>/assets/AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>/assets/AdminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url();?>/assets/AdminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url();?>/assets/AdminLTE/bower_components/fastclick/lib/fastclick.js"></script>
<script src="<?php echo base_url();?>/assets/AdminLTE/dist/js/adminlte.min.js"></script>
<script src="<?php echo base_url();?>/assets/AdminLTE/dist/js/demo.js"></script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

<script type="text/javascript">
$(function(){
    $("#overlay").fadeOut();
    $(".main-contain").removeClass("main-contain");
});
</script>

</body>
</html>
