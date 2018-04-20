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

    .example-modal .modal {
      position: relative;
      top: auto;
      bottom: auto;
      right: auto;
      left: auto;
      display: block;
      z-index: 1;
    }

    .example-modal .modal {
      background: transparent !important;
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
      <h1>จัดการจำนวนสินค้า</h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>index.php/main/admin"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
        <li ><a href="<?php echo base_url();?>index.php/product/index">ข้อมูลสินค้า</a></li>
        <li class="active">จัดการจำนวนสินค้า</li>

      </ol>
    </section>

	<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
	

			<form class="form-horizontal" >
              <div class="box-body">
			                  <div class="form-group">

                  <label for="prd_id" class="col-sm-2 control-label">รหัสสินค้า</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" value="<?php echo $prd[0]->prd_id?>" readonly>
                  </div>
                  <label for="prd_barcode" class="col-sm-2 control-label">barcode</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" value="<?php echo $prd[0]->prd_barcode?>" readonly >
                  </div>
                </div>


                <div class="form-group">
                  <label for="prd_cat_name" class="col-sm-2 control-label">ชื่อสินค้า</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $prd[0]->prd_name?>" readonly>
                  </div>
                </div>

                <div class="form-group">
              </div>
              </div>
            </form>

	   <div class="box-body">
					<button class="btn btn-success" data-toggle="modal" data-target="#modal-default"><i class="glyphicon glyphicon-plus"></i> เพิ่มจำนวนสินค้า</button>
			</div>

		   <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="10%">ลำดับที่</th>
                  <th >วันที่จัดการจำนวนสินค้า</th>
                  <th>จำนวนที่เพิ่มสินค้า</th>
                  <th width="15%">Action</th>
                </tr>
                </thead>
                <tbody>
				<?php $i=1;?>
				<?php foreach($stck as $row){?>
				<tr>
                  <td><?php echo $i++;?></td>
                  <td><?php echo  $row->prd_stock_add_date;?></td>
                  <td><?php echo $row->prd_stock_add_qt;?></td>

                  <td>
				  <?php if($row->prd_stock_status=='1'){?>
					<a href="<?php echo base_url()?>index.php/product/delete_stock_product/<?php echo $row->prd_id?>/<?php echo $row->prd_stock_id?>"  onclick='return confirm("ยืนยันการลบข้อมูลรายการนี้ ?")'>
							<button class="btn  btn-warning btn-sm" ><i class="glyphicon glyphicon glyphicon-trash"></i> ลบรายการ</button>
					</a>
					<a href="<?php echo base_url()?>index.php/product/update_stock_product/<?php echo $row->prd_id?>/<?php echo $row->prd_stock_id?>"  onclick='return confirm("ยืนยันการปรับปรุงข้อมูลรายการนี้ ?")'>
							<button class="btn  btn-info btn-sm" ><i class="glyphicon glyphicon-cog"></i> ปรับปรุง</button>
					</a>
					<?php }else{?>
						<font color="blue">ปรับปรุงข้อมูล</font>
					<?php }?>
                  </td>
                </tr>
				<?php } ?>
                </tbody>

              </table>
            </div>

      <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">เพิ่มจำนวนสินค้า</h4>
              </div>
					<form id="defaultForm" class="form-horizontal" method="post" action="<?php echo base_url().'product/save_stock_product'?>">

              <div class="modal-body">
						<div class="box-body">
							<div class="form-group">
								<label for="prd_stock_add_qt" class="col-sm-3 control-label">จำนวนสินค้า</label>
								 <div class="col-sm-9">
										<input type="hidden" id="prd_id"  name="prd_id" value="<?php echo   $prd[0]->prd_id?>">
										<input type="text" class="form-control" id="prd_stock_add_qt"  name="prd_stock_add_qt" placeholder="จำนวนสินค้า" maxlength="3" required>
								</div>
							</div>
						</div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
            </form>

            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

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
