<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->db2 = $this->load->database('saleecolour',TRUE);
  }

  public function escape_string() {
      return mysqli_connect("localhost", "root", "1234", "saleecolour");
  }


  public function check_login() {
// เข้ารหัส input
      $username = mysqli_escape_string($this->escape_string(), isset($_POST['username']) ? ($_POST['username']) : '');
      $password = mysqli_escape_string($this->escape_string(), isset($_POST['password']) ? ($_POST['password']) : '');

      $user = mysqli_real_escape_string($this->escape_string() , $_POST['username']);
      $pass = mysqli_real_escape_string($this->escape_string() , $_POST['password']);


      $checkuser = $this->db2->query(sprintf("SELECT * FROM member WHERE username = '%s' and password = '%s' ", $user, $pass
      ));

      $checkdata = $checkuser->num_rows();

      if ($checkdata == 0) {
          echo '<script language="javascript">';
          echo 'alert("Username หรือ Password ไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง")';
          echo '</script>';

          header("refresh:1; url=http://localhost/it_system/login");
          die();
      } else {
          echo "<h2 style='text-align:center;color:green;margin-top:30px;'>เข้าสู่ระบบสำเร็จ กรุณารอสักครู่ระบบกำลังพาท่านเข้าสู่หน้าโปรแกรม</h2>";

          foreach ($checkuser->result_array() as $r) {
              $_SESSION['username'] = $r['username'];
              $_SESSION['password'] = $r['password'];
              $_SESSION['Fname'] = $r['Fname'];
              $_SESSION['Lname'] = $r['Lname'];


              session_write_close();

              if($r['posi']==75){
                   echo "<h3 style='color:green;text-align:center;'>" . "Welcome &nbsp;" . $r['Fname'] . "&nbsp;Permission : Admin" . "</h3>";
                   $uri = isset($_SESSION['RedirectKe']) ? $_SESSION['RedirectKe']: '/it_system/knowledge/know/';
                   // กำหนดค่าให้กรณีที่ไม่ได้มีการกดเข้าไปหน้าใดๆก่อน
                   header('location:'.$uri);
              }

              if($r['posi']==15){
                  echo "<h3 style='color:green;text-align:center;'>" . "Welcome &nbsp;" . $r['Fname'] . "&nbsp;Permission : User" . "</h3>";
                  $uri = isset($_SESSION['RedirectKe']) ? $_SESSION['RedirectKe']: '/it_system/knowledge/know/';
                  header('location:'.$uri);
              }


          }


      }
  }



  public function call_login() {//*****Check Session******//
      if (isset($_SESSION['username']) == "") {

          $_SESSION['RedirectKe'] = $_SERVER['REQUEST_URI'];

          echo "<h1 style='text-align:center;margin-top:50px;'>กรุณา Login เข้าสู่ระบบ</h1>";
          header("refresh:1; url=http://localhost/it_system/login");
          die();
      }
  }



  public function logout(){
      session_destroy();
      $this->session->unset_userdata('referrer_url');
header("location:http://localhost/it_system/login");
  }

  public function getuser(){
    $result = $this->db2->query("SELECT * FROM member WHERE username = '".$_SESSION['username']."' ");
    return $result->row();
  }





}
