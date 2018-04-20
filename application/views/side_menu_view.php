<section class="sidebar">
  <div class="user-panel">
    <div class="pull-left image">
      <img src="<?php echo base_url();?>/assets/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
      <p><?php echo $user_name;?></p>
      <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
  </div>
  <ul class="sidebar-menu" data-widget="tree">
    <li class="header">เมนูหลัก</li>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-dashboard"></i> <span>บทสรุป</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="index.html"><i class="fa fa-play"></i>ยอดขายของสหการ</a></li>
	    <li ><a href="index2.html"><i class="fa  fa-play"></i>สินค้าขายดีของสหการ</a></li>
		<li ><a href="index2.html"><i class="fa  fa-play"></i>ยอดขายของร้านค้า</a></li>
		<li ><a href="index2.html"><i class="fa  fa-play"></i>รายการอาหารขายดี</a></li>
	    <li ><a href="index3.html"><i class="fa  fa-play"></i>สรุปยอดการเติมเงิน</a></li>
	    <li ><a href="index3.html"><i class="fa  fa-play"></i>สรุปผู้ใช้งานระบบ</a></li>
      </ul>
    </li>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-database"></i>
        <span>สินค้า(ในสหการ)</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="<?php echo base_url();?>index.php/product_cate/index"><i class="fa fa-play"></i> หมวดหมู่สินค้า</a></li>
        <li><a href="<?php echo base_url();?>index.php/product/index"><i class="fa fa-play"></i> รายการสินค้า</a></li>
      </ul>
    </li>

    <li class="treeview">
      <a href="#">
        <i class="fa fa-database"></i>
        <span>รายการอาหาร</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="pages/charts/chartjs.html"><i class="fa fa-play"></i> หมวดหมู่อาหาร</a></li>
        <li><a href="pages/charts/morris.html"><i class="fa fa-play"></i> รายการอาหาร</a></li>
      </ul>
    </li>

    <li class="treeview">
      <a href="#">
        <i class="fa fa-user"></i> <span>ข้อมูลบุคลากร</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="<?php echo base_url();?>person/"><i class="fa fa-play"></i> รายชื่อบุคลากร</a></li>
        <li><a href="<?php echo base_url();?>person/add"><i class="fa fa-play"></i>เพิ่มบุคลากร</a></li>
        <li><a href="<?php echo base_url();?>person/import"><i class="fa fa-play"></i>นำเข้าข้อมูลบุคลากร</a></li>

      </ul>
    </li>

	 <li class="treeview">
      <a href="#">
        <i class="fa fa-users"></i> <span>ข้อมูลนักเรียน</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="<?php echo base_url();?>student/"><i class="fa fa-play"></i> รายชื่อนักเรียน</a></li>
        <li><a href="<?php echo base_url();?>student/add"><i class="fa fa-play"></i>เพิ่มนักเรียน</a></li>
        <li><a href="<?php echo base_url();?>student/import"><i class="fa fa-play"></i>นำเข้าข้อมูลนักเรียน</a></li>
      </ul>
    </li>

	 <li >
      <a href="<?php echo base_url();?>coop/"">
        <i class="fa fa-barcode"></i> <span>จุดขายหน้าร้าน(สหการ)</span>
      </a>
    </li>

	 <li >
      <a href="<?php echo base_url();?>fc/"">
        <i class="fa fa-credit-card"></i> <span>จุดขายหน้าร้าน(ร้านค้า)</span>
      </a>
    </li>

 <li >
      <a href="<?php echo base_url();?>fc/"">
        <i class="fa fa-money"></i> <span>จุดเติมเงินในบัตร (Top Up)</span>
      </a>
    </li>

		 <li class="treeview">
      <a href="#">
        <i class="fa fa-cog"></i> <span>ตั้งค่าระบบ</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="<?php echo base_url();?>student/"><i class="fa fa-play"></i> ผู้ใช้งานระบบ</a></li>
        <li><a href="<?php echo base_url();?>student/add"><i class="fa fa-play"></i>เครื่องจุดขายหน้าร้าน (สหการ)</a></li>
        <li><a href="<?php echo base_url();?>student/import"><i class="fa fa-play"></i>เครื่องจุดขายหน้าร้าน (ร้านค้า)</a></li>
        <li><a href="<?php echo base_url();?>student/import"><i class="fa fa-play"></i>เครื่องจุดเติมเงินในบัตร (Top Up)</a></li>
        <li><a href="<?php echo base_url();?>student/import"><i class="fa fa-play"></i>เครื่องจุดตรวจสอบเงินในบัตร</a></li>
        <li><a href="<?php echo base_url();?>student/import"><i class="fa fa-play"></i>ตั้งค่าระบบ</a></li>


      </ul>
    </li>
</section>
