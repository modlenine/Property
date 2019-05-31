<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MX_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model('knowledge/know_model');
    $this->load->model('login_model');
  }

  public function index()
  {
    $data['getlabel'] = $this->know_model->getlabel('loginfrm1');

    $this->load->view('login_page',$data);
  }


  public function check_login(){
    $this->login_model->check_login();
  }

  public function logout(){
    $this->login_model->logout();
  }


}
