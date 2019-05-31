<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Detail of Knowledge</title>
  </head>
  <body>
<?php $this->load->view('nav'); ?>

<div class="container-fluid">
  <h1>บทความเกี่ยวกับ &nbsp;<?php echo $getlabel->k_label; ?></h1><hr>

  <div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Panel heading &nbsp; <a href='<?php echo base_url("knowledge/know/add_detail/"); ?><?php echo $getlabel->k_label_type; ?>'> <button class="btn btn-primary btn-sm">เพิ่มหัวข้อใหม่</button></a></div>
  <table id="view_cp" class="table table-striped table-bordered dt-responsive nowrap" style="width:99%;margin:0px auto;">
              <thead>
                  <tr>
                      <th style="width:150px;">Owner</th>
                      <th>หัวข้อ</th>
                  </tr>
              </thead>
              <tbody>

<?php foreach ($selectcat->result_array() as $selectcats){ ?>
                  <tr>
                      <td style="text-align:center;">
                        <i class="fas fa-user-tie fa-2x"></i><br>
                        <?php echo $selectcats['k_user']; ?><br>



                      </td>
                      <td><a href="<?php echo base_url('knowledge/know/viewfull_detail/'); ?><?php echo $selectcats['k_detail_id']; ?>"><?php echo $selectcats['k_detail_topic']; ?></a></td>

                  </tr>
<?php }; ?>
              </tbody>

              <!-- Start code popup -->
              <script type="text/javascript">
              function popup(url, name, windowWidth, windowHeight) {
                  myleft = (screen.width) ? (screen.width - windowWidth) / 2 : 100;
                  mytop = (screen.height) ? (screen.height - windowHeight) / 2 : 100;
                  properties = "width=" + windowWidth + ",height=" + windowHeight;
                  properties += ",scrollbars=yes, top=" + mytop + ",left=" + myleft;
                  window.open(url, name, properties);
              }
              </script>

          </table>
</div>
          <script type="text/javascript" >
  $(document).ready(function () {
              $('#view_cp').DataTable({
                  "order": [[0, "desc"]]
              });
          });
  </script>
</div>
  </body>
</html>
