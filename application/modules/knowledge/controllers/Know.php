<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Know extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model('know_model');
    $this->load->model('login/login_model');
  }


  public function index()
  {
$this->login_model->call_login();
$data['title_h1'] = $this->know_model->label('title_h1');
$data['cat_name_id1'] = $this->know_model->label('cat_name_id1');

$data['getCategory'] = $this->know_model->getCategory();

$this->load->view('headcode');
$this->load->view('main_knowledge',$data);
  }


  public function view($catid){
$this->login_model->call_login();
$data['selectcat'] = $this->know_model->selectcat($catid);
$data['getlabel'] = $this->know_model->getlabel($catid);

$this->load->view('headcode');
$this->load->view('list_detail', $data);
  }


public function edit($detailid){
$this->login_model->call_login();
$data['getusers'] = $this->login_model->getuser();
$data['viewfull_detail'] = $this->know_model->viewfull_detail($detailid);


$this->load->view('headcode');
$this->load->view('edit',$data);
  }


  public function save_edit_detail($detailid){
    $this->know_model->save_edit_detail($detailid);
  }


  public function delete($detailid){
  $this->know_model->delete($detailid);
    }



  public function add_detail($catid){
    $this->login_model->call_login();
    $data['getusers'] = $this->login_model->getuser();
    $data['selectcat'] = $this->know_model->selectcat($catid);
    $data['getlabel'] = $this->know_model->getlabel($catid);

    $this->load->view('headcode');
    $this->load->view('add',$data);
  }

  public function save_add_detail(){
    $this->know_model->save_add_detail();
    redirect("knowledge/know");

  }

  public function viewfull_detail($catid){
    $this->login_model->call_login();
    $data['viewfull_detail'] = $this->know_model->viewfull_detail($catid);

    $this->load->view('headcode');
    $this->load->view('viewfull_detail',$data);
  }





}
