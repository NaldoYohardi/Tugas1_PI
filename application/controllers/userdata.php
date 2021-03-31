<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userdata extends CI_Controller {
  public function index() {
      $this->load->view("auth/page");
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
      $user['result'] = $this->user_model->get_users();
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
        $this->load->view('auth/page',$user);
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

public function edit_user($id){
    $data = array(
      'id' => $id,
      'email' 	=> $this->input->post('email'),
      'username' 	=> $this->input->post('username'),
      'password' 	=> $this->input->post('password'),
      'jenkel' 	=> $this->input->post('jenkel'),
    );
    $where = array('id' => $id);;
  	$this->user_model->update_data($where, $data, 'user');
  $user['result'] = $this->user_model->get_users();
  $this->load->view('auth/page',$user);
}



public function delete_user($id){
  $this->user_model->delete_user($id);
  $user['result'] = $this->user_model->get_users();
  $this->load->view('auth/page',$user);
}

}
