<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>แก้ไข</title>
</head>

<body>
  <?php $this->load->view("nav"); ?>

  <div class="container-fulid">

    <?php
      $viewfull_details = $viewfull_detail->row();
    ?>

    <form action="<?php echo base_url("knowledge/know/save_edit_detail/"); ?><?php echo $viewfull_details->k_detail_id; ?>" method="post" name="form-detail">
      <section>

        <div class="col-md-12 form-inline">
          <h3><u>แก้ไข</u></h3>
          <span>หมวดหมู่ : </span><input readonly class="form-control input-sm" type="text" name="add_cat" id="add_cat" value="<?php echo $viewfull_details->k_label; ?>" />&nbsp;&nbsp;
          <span>ชื่อผู้แจ้ง</span>&nbsp;<input readonly class="form-control input-sm" type="text" name="k_user" id="k_user" value="<?php  echo $getusers->Fname; ?>">

          <input hidden type="text" name="k_detail_catid" id="k_detail_catid" value="<?php echo $viewfull_details->k_label_type; ?>">
        </div>

        <div class="col-md-12 form-group">
          <div class="col-md-6">
            <span>หัวข้อ</span>
            <input class="form-control" type="text" name="k_detail_topic" id="k_detail_topic" value="<?php echo $viewfull_details->k_detail_topic; ?>">
          </div>
          <div class="col-md-6">
            <!-- ว่าง -->
          </div>
        </div>

        <div class="col-md-12 form-group">
          <div class="col-md-8">
            <span>รายละเอียด</span>
            <textarea class="form-control" name="k_detail" id="k_detail" rows="8" cols="80"><?php echo $viewfull_details->k_detail; ?></textarea>
          </div>
          <div class="col-md-4">
            <!-- ว่าง -->
          </div>
        </div>

        <div class="col-md-6 form-inline">
          <input class="btn btn-info btn-sm" type="submit" name="submit" value="อัพเดต">&nbsp;&nbsp;<input class="btn btn-warning btn-sm" type="reset" name="reset" value="ล้างข้อมูล">
        </div>

      </section>
    </form>

  </div>
</body>

<script src="http://localhost/it_system/asset/m/tinymce/tinymce.min.js"></script>
<script>
  tinymce.init({
    selector: "textarea",
    theme: "modern",
    width: 800,
    height: 300,
    plugins: [
      "advlist autolink link image lists charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
      "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
    ],
    toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
    toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
    image_advtab: true,

    external_filemanager_path: "http://localhost/it_system/asset/m/filemanager/",
    filemanager_title: "Responsive Filemanager",
    external_plugins: {
      "filemanager": "http://localhost/it_system/asset/m/filemanager/plugin.min.js"
    },
    relative_urls: false,
    remove_script_host: false,
    document_base_url: ""
  });
</script>

</html>
