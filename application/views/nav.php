<?php
  $this->load->model('login/login_model');
  $getusers = $this->login_model->getuser();
 ?>

<nav class="navbar navbar-inverse navbar-fixed-left">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">ฐานข้อมูลด้านไอที</a><br>
      </div>
      <div id="navbar" class="navbar-collapse collapse">

        <ul class="nav navbar-nav">
          <li style="color:#fff;">
            &nbsp;&nbsp;<i class="fas fa-user"></i>&nbsp;Hi : <?php echo $getusers->Fname; ?>
            <a href="<?php echo base_url('login/logout'); ?>"><button class="btn btn-danger btn-sm" type="button" name="button" onclick="javascript:return confirm('คุณต้องการออกจากระบบใช่หรือไม่')">Logout</button></a>
          </li>
          <li><a href="<?php echo base_url(); ?>">หน้าหลัก</a></li>
          <li><a href="<?php echo base_url('knowledge/know'); ?>">คลังความรู้</a></li>
          <li><a href="#">Contact</a></li>

          <!-- <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Action</a></li>
              <li><a href="#">Another action</a></li>
              <li><a href="#">Something else here</a></li>
              <li role="separator" class="divider"></li>
              <li class="dropdown-header">Nav header</li>
              <li><a href="#">Separated link</a></li>
              <li><a href="#">One more separated link</a></li>
            </ul>
          </li> -->

        </ul>

      </div>
    </div>
  </nav>
