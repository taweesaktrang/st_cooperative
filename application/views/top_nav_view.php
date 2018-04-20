<ul class="nav navbar-nav">
  <li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
      <img src="<?php echo base_url();?>/assets/AdminLTE/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
      <span class="hidden-xs"><?php echo $user_name;?></span>
    </a>
    <ul class="dropdown-menu">
      <!-- User image -->
      <li class="user-header">
        <img src="<?php echo base_url();?>/assets/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

        <p>
         <?php echo $user_name;?> 
        </p>
      </li>
      <li class="user-footer">
        <div class="pull-left">
          <a href="#" class="btn btn-default btn-flat">ข้อมูลส่วนตัว</a>
        </div>
        <div class="pull-right">
          <a href="<?php echo base_url().'index.php/main/do_logoff';?>" class="btn btn-default btn-flat">ออกจากระบบ</a>
        </div>
      </li>
    </ul>
  </li>
</ul>
