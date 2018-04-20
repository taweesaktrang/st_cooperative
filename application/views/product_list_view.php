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
      <h1>ข้อมูลสินค้า</h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>index.php/main/admin"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
        <li class="active">ข้อมูลสินค้า</a></li>

      </ol>
    </section>

	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
		   <div class="box-body">
              <a href="<?php echo base_url()?>index.php/product/add_product">
					<button class="btn btn-success" ><i class="glyphicon glyphicon-plus"></i> เพิ่มสินค้า</button>
			   </a>
			</div>

		   <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="10%">รหัสสินค้า</th>
                  <th width="10%">barcode</th>
                  <th>ชื่อสินค้า</th>
                  <th width="8%">ราคา</th>
                  <th width="8%">คงเหลือ</th>
				  <th width="8%">หน่วยนับ</th>
				  <th width="12%">สถานะ</th>
                  <th width="15%">Action</th>
                </tr>
                </thead>
                <tbody>
				<?php foreach($result as $row){?>
				<tr>
                  <td><?php echo $row->prd_id;?></td>
                  <td><?php echo  $row->prd_barcode;?></td>
                  <td><?php echo $row->prd_name;?></td>
                  <td><?php echo $row->prd_sale_price;?></td>
                  <td><?php echo $row->prd_qt;?></td>
                  <td><?php echo $row->prd_unit;?></td>
                  <td><?php if($row->prd_status==0) echo " <font color='red'><b> สินค้าหมด </b></font>"; elseif($row->prd_status==1) echo "<font color='blue'><b>สินค้ามีจำหน่าย</b></font>";?></td>

                  <td>
					<a href="<?php echo base_url()?>index.php/product/edit_product/<?php echo $row->prd_id?>">
							<button class="btn  btn-default btn-sm" ><i class="glyphicon glyphicon-pencil"></i></button>
					</a>
					<a href="<?php echo base_url()?>index.php/product/delete_product/<?php echo $row->prd_id?>"  onclick='return confirm("ยืนยันการลบข้อมูลรายการนี้ ?")'>
							<button class="btn  btn-warning btn-sm" ><i class="glyphicon glyphicon glyphicon-trash"></i></button>
					</a>
					<a href="<?php echo base_url()?>index.php/product/stock_product/<?php echo $row->prd_id?>">
							<button class="btn  btn-info btn-sm" ><i class="glyphicon glyphicon-cog"></i></button>
					</a>
							<button class="btn  btn-success btn-sm" ><i class="glyphicon glyphicon-barcode"></i></button>

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
