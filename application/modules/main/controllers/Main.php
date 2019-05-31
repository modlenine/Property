<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends MX_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model('main_model');
    $this->load->model('login/login_model');
  }

public function index()
  {
    $this->login_model->call_login();
    $data['test'] = $this->main_model->test();

  $this->load->view('headcode');
  $this->load->view('main',$data);
  }

}
