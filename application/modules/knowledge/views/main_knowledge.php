<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Main Knowledge Page</title>
  </head>
  <body>
<?php $this->load->view('nav'); ?>


<div class="container-fluid">
  <h3><?php echo $title_h1->k_label; ?></h3>
</div>

<div class="col-md-12">

<!-- Query ข้อมูลมาจาก Database ทั้งหมด  -->
<?php foreach ($getCategory as $getCategorys) { ?>
  <a href="<?php echo base_url('knowledge/know/view/'); ?><?php echo $getCategorys['k_label_type']; ?>">
    <div class="col-md-3">
      <div class="panel panel-success">
        <div class="panel-heading kmain"><?php echo $getCategorys['k_label']; ?></div>
        <div class="panel-body kmain">
            <?php echo $getCategorys['k_label_img']; ?>
        </div>
      </div>
    </div>
  </a>
<?php } ?>
<!-- Query ข้อมูลมาจาก Database ทั้งหมด  -->


</div>

  </body>
</html>
