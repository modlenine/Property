<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Know_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function label($labeltype){
    $result = $this->db->query("select * from knowledge_label where k_label_type='$labeltype' ");
    return $result->row();
  }

  public function getCategory(){
    $result = $this->db->query("SELECT
knowledge_label.k_label,
knowledge_label.k_label_img,
knowledge_label.k_label_type
FROM
knowledge_category
INNER JOIN knowledge_label ON knowledge_category.k_cat_label = knowledge_label.k_label_type");
    return $result->result_array();
  }


  public function selectcat($catid){
$result = $this->db->query("SELECT
knowledge_label.k_label,
knowledge_label.k_label_type,
knowledge_detail.k_detail_topic,
knowledge_detail.k_detail,
knowledge_detail.k_detail_id,
knowledge_detail.k_user,
knowledge_detail.k_detail_catid
FROM
knowledge_category
INNER JOIN knowledge_label ON knowledge_label.k_label_type = knowledge_category.k_cat_label
INNER JOIN knowledge_detail ON knowledge_detail.k_detail_catid = knowledge_category.k_cat_label WHERE k_detail_catid='$catid' ");

return $result;
  }



// ดึงข้อความต่างๆมาลงหน้า App
  public function getlabel($catid){
$result = $this->db->query("SELECT
knowledge_label.k_label_id,
knowledge_label.k_label,
knowledge_label.k_label_url,
knowledge_label.k_label_img,
knowledge_label.k_label_type
FROM
knowledge_label WHERE k_label_type='$catid' ");

return $result->row();
  }






// บันทึกข้อมูลสำหรับโพสต์ใหม่
  public function save_add_detail(){
    $data = array(
      "k_detail_catid" => $this->input->post("k_detail_catid"),
      "k_detail_topic" => $this->input->post("k_detail_topic"),
      "k_detail" => $this->input->post("k_detail"),
      "k_user" => $this->input->post("k_user"),
      "k_datetime" => date("Y-m-d H:m:s")
    );

    $this->db->insert("knowledge_detail",$data);
  }



// ดึงข้อมูลมาแสดงแบบ Full
  public function viewfull_detail($catid){
    $result = $this->db->query("SELECT
knowledge_detail.k_detail_id,
knowledge_detail.k_detail_catid,
knowledge_detail.k_detail_topic,
knowledge_detail.k_detail,
knowledge_detail.k_user,
knowledge_detail.k_datetime,
knowledge_detail.k_user_modify,
knowledge_detail.k_datetime_modify,
knowledge_label.k_label,
knowledge_label.k_label_url,
knowledge_label.k_label_type,
knowledge_label.k_label_img
FROM
knowledge_detail
INNER JOIN knowledge_category ON knowledge_detail.k_detail_catid = knowledge_category.k_cat_label
INNER JOIN knowledge_label ON knowledge_category.k_cat_label = knowledge_label.k_label_type WHERE k_detail_id ='$catid' ");

return $result;
  }



// ลบโพสต์
  public function delete($detailid){
    $result = $this->db->delete('knowledge_detail', array('k_detail_id' => $detailid));
    if(!$result){
      echo "<script>";
      echo "alert('ลบข้อมูลไม่สำเร็จ')";
      echo "</script>";
      header("refresh:1 url=http://localhost/it_system/knowledge/know/viewfull_detail/$detailid");
    }else{
      echo "<script>";
      echo "alert('ลบข้อมูลสำเร็จ')";
      echo "</script>";
      header("refresh:1 url=http://localhost/it_system/knowledge/know/");
    }

  }


// บันทึกการแก้ไข
  public function save_edit_detail($detailid){
    $data = array(
      "k_detail_catid" => $this->input->post("k_detail_catid"),
      "k_detail_topic" => $this->input->post("k_detail_topic"),
      "k_detail" => $this->input->post("k_detail"),
      "k_user_modify" => $this->input->post("k_user"),
      "k_datetime_modify" => date("Y-m-d H:m:s")
    );

    $this->db->where("k_detail_id",$detailid);
    $result = $this->db->update("knowledge_detail",$data);

    if(!$result){
      echo "<script>";
      echo "alert('การบันทึกข้อมูลล้มเหลว')";
      echo "</script>";
      header("refresh:1 url=http://localhost/it_system/knowledge/know/viewfull_detail/$detailid");
    }else{
      echo "<script>";
      echo "alert('การบันทึกข้อมูลเสร็จสมบูรณ์')";
      echo "</script>";
      header("refresh:1 url=http://localhost/it_system/knowledge/know/viewfull_detail/$detailid");
    }

  }




}
