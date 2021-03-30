<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userdata extends CI_Controller {
  public function index() {
    $remember = $this->user_model->remember();
    if($remember == false){
      $login = $this->user_model->rem_login();
      foreach ($login as $key){
        $id = $key->id;
        $email = $key->email;
        $username = $key->username;
        $password = $key->password;
        $jenkel = $key->jenkel;
      }
      $data = array (
        'id' => $id,
        'email' => $email,
        'password' => $password,
        'username' => $username,
        'jenkel' => $jenkel,
        'logged-in' => true
      );

      $this->load->view("home", $data);
    } else{
      $this->load->view("auth/login");
    }
  }

  public function register() {
    $this->load->view("auth/regist");
  }

	public function do_login()
	{
    $this->form_validation->set_rules('username','Username','trim|required');
    $this->form_validation->set_rules('password','Password','trim|required');

    if($this->form_validation->run()==FALSE) {
      $data = array (
        'errors' => validation_errors()
      );
      $this->session->set_flashdata($data);
      redirect('userdata/index');
    } else {
      $username = $this->input->post('username');
      $password = $this->input->post('password');
		  $remember = $this->input->post('remember');
      $datas = $this->user_model->login_user($username,$password);

      if($remember == 1){
        $this->user_model->add_remember('1',$username);
      }
      if($datas == false){
        $data = array(
          'errors' => "Username or Password error occured."
        );
        $this->session->set_flashdata($data);
        redirect();

      } else {
        foreach ($datas as $key){
          $id = $key->id;
          $email = $key->email;
          $username = $key->username;
          $password = $key->password;
          $jenkel = $key->jenkel;
        }
        $data = array (
          'id' => $id,
          'email' => $email,
          'password' => $password,
          'username' => $username,
          'jenkel' => $jenkel,
          'logged-in' => true
        );

        $this->session->set_userdata($data);
        $this->session->set_flashdata('login_success','anda berhasil login');
      $this->load->view('home',$datas);
    }
    }
	}

  public function regist()
  {
    $this->form_validation->set_rules('username','Username','trim|required');
    $this->form_validation->set_rules('email','Email','trim|required');
    $this->form_validation->set_rules('password','Password','trim|required');
    $this->form_validation->set_rules('jenkel','jenkel','trim|required');

    $username = $this->input->post('username');
    $check = $this->user_model->check_user($username);
    if($this->form_validation->run()==FALSE){
      $data = array(
        'errors' => validation_errors()
      );
      $this->session->set_flashdata($data);

      redirect("userdata/register");
    } else {
    if($check = true) {
      $data = array(
        'email' 	=> $this->input->post('email'),
        'username' 	=> $this->input->post('username'),
        'password' 	=> $this->input->post('password'),
        'jenkel' 	=> $this->input->post('jenkel'),
      );
      if($this->user_model->create_user($data)) {
        redirect("userdata/index");
      } else {
        $data = array(
          'errors' => "Username or Password error occured."
        );
        $this->session->set_flashdata($data);

        redirect("userdata/register");
    }
  } else {
        $data = array(
          'errors' => "Username Not Found."
        );
        $this->session->set_flashdata($data);

        redirect("userdata/register");
  }
      }
}

public function logout() {
  $this->user_model->truncate_tb();
  redirect("userdata/index",$remember);
}

}
