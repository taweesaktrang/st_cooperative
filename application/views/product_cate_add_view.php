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

  <link rel="stylesheet" href="<?php echo base_url();?>/assets/AdminLTE/bower_components/bootstrap-validator/vendor/bootstrap/css/bootstrap.css"/>
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/AdminLTE/bower_components/bootstrap-validator/dist/css/bootstrapValidator.css"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url();?>index.php/main/admin" class="logo">
      <span class="logo-mini"><b>F</b>CCM</span>
      <span class="logo-lg"><b>FC</b>&CMS</span>
    </a>
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
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
      <h1>
        เพิ่มหมวดหมู่สินค้า
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>index.php/main/admin"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
        <li><a href="<?php echo base_url();?>index.php/product_cate/index"> ข้อมูลหมวดหมู่สินค้า</a></li>
        <li class="active">เพิ่มหมวดหมู่สินค้า</a></li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
            </div>
            <form id="defaultForm" class="form-horizontal" method="post" action="save_product_cate">
              <div class="box-body">
                <div class="form-group">
                  <label for="prd_cat_id" class="col-sm-2 control-label">รหัสหมวดหมู่</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="prd_cat_id"  name="prd_cat_id" placeholder="รหัสหมวดหมู่สินค้า" maxlength="2" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="prd_cat_name" class="col-sm-2 control-label">ชื่อหมวดหมู่สินค้า</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="prd_cat_name"  name="prd_cat_name" placeholder="ชื่อหมวดหมู่สินค้า" maxlength="50" required>
                  </div>
                </div>

                <div class="form-group">
              </div>
              </div>
              <div class="box-footer">
                <button type="reset" class="btn btn-default">ยกเลิก</button>
                <button type="submit" class="btn btn-info pull-right">บันทึกข้อมูล</button>
              </div>
            </form>
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
<script src="<?php echo base_url();?>/assets/AdminLTE/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url();?>/assets/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>/assets/AdminLTE/bower_components/fastclick/lib/fastclick.js"></script>
<script src="<?php echo base_url();?>/assets/AdminLTE/dist/js/adminlte.min.js"></script>
<script src="<?php echo base_url();?>/assets/AdminLTE/dist/js/demo.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>/assets/AdminLTE/bower_components/bootstrap-validator/vendor/jquery/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>/assets/AdminLTE/bower_components/bootstrap-validator/vendor/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>/assets/AdminLTE/bower_components/bootstrap-validator/dist/js/bootstrapValidator.js"></script>

<!-- <script type="text/javascript">
$(document).ready(function() {
    $('#defaultForm')
        .bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                prd_cat_id: {
                    message: 'The prd_cat_id is not valid',
                    validators: {
                        notEmpty: {
                            message: 'รหัสหมวดหมู่สินค้าเป็นค่าว่างไม่ได้'
                        },
                        stringLength: {
                            min: 2,
                            max: 2,
                            message: 'รหัสหมวดหมู่สินค้าจะต้องเป็นตัวเลขมีความยาว 2 หลัก'
                        },

                        regexp: {
                            regexp: /^[0-9]+$/,
                            message: 'รหัสสมาชิกจะต้องเป็นตัวเลขเท่านั้น'
                        }

                    }
                },
			    prd_cat_name: {
                    message: 'The prd_cat_name is not valid',
                    validators: {
                        notEmpty: {
                            message: 'หมวดหมู่สินค้าเป็นค่าว่างไม่ได้'
                        },
                        stringLength: {
                            max: 50,
                            message: 'หมวดหมู่สินค้าจะต้องมีความยาว 50 ตัวอักษร'
                        }

                    }
                }

            }
        })
        .on('success.form.bv', function(e) {
            e.preventDefault();

            // Get the form instance
            var $form = $(e.target);

            // Get the BootstrapValidator instance
            var bv = $form.data('bootstrapValidator');

            // Use Ajax to submit form data
            $.post($form.attr('action'),
            $form.serialize(),
            function(result) {
                console.log(result);
            },
            'json');
            $form.reset();
        });
});
</script>
 -->
</body>
</html>
