<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>View Full Detail</title>

    <style media="screen">
      .dataTables_filter, .dataTables_length , .dataTables_paginate , .dataTables_info{
      display: none;
      }
    </style>
  </head>
  <body>
<?php $this->load->view("nav"); ?>

<div class="container-fluid">

<?php
  $viewfull_details = $viewfull_detail->row();
?>

<div class="col-md-12" style="margin-top:15px;margin-bottom:20px;">
    <button class="btn btn-second btn-sm" type="button" name="back" onclick="javascript: history.back()">ย้อนกลับ</button>
</div>
<span><h1>Title : <?php echo $viewfull_details->k_detail_topic; ?></h1></span>
<table id="view_cp" class="table table-striped table-bordered dt-responsive" style="width:100%">
            <thead>
                <tr>
                    <th style="width:150px;">Owner</th>
                    <th>รายละเอียด</th>
                </tr>
            </thead>
            <tbody>


                <tr>
                    <td style="text-align:center;">
                      <i class="fas fa-user-tie fa-2x"></i><br>
                    <span>ผู้โพสต์ : </span><?php echo $viewfull_details->k_user; ?><br>
                    <span>วันที่โพสต์ : </span><?php echo $viewfull_details->k_datetime; ?><br><br>
                    <a href="<?php echo base_url('knowledge/know/edit/'); ?><?php echo $viewfull_details->k_detail_id; ?>"><i class="fas fa-edit fa-2x"></i></a>&nbsp;&nbsp;
                    <a href="<?php echo base_url('knowledge/know/delete/'); ?><?php echo $viewfull_details->k_detail_id; ?>"><i class="fas fa-trash-alt fa-2x"></i></a>



                    </td>
                    <td><?php echo $viewfull_details->k_detail; ?></td>
                </tr>

            </tbody>

        </table>

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
