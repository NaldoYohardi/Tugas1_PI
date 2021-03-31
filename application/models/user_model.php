<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

  public function remember() {
    $check = $this->db->query("SELECT username FROM remember WHERE id='1'");
    if($check) {
			return true;
		} else {
			return false;
		}
  }

  public function add_remember($id,$username) {
    $insert_data = $this->db->query("INSERT INTO remember VALUES ('$id','$username')");
		return $insert_data;
  }
  public function login_user($username,$password)
    {
    	$query = $this->db->query("SELECT * FROM user WHERE username = '$username' AND password='$password'");
    	return $query->result();
    }

    public function rem_login()
      {
        $data = $this->db->query("SELECT username FROM remember WHERE id = '1'");
      	$query = $this->db->query("SELECT * FROM user WHERE username = 'asd'");
      	return $query->result();
      }

    public function tampil_data()
  	{
  		$query = $this->db->get('user');
  		return $query->result();
  	}

    public function check_user($username)
    {
      $query = $this->db->query("SELECT id FROM user WHERE username = '$username'");
    }

    public function create_user($data) {
		$insert_data = $this->db->insert('user',$data);
		return $insert_data;
	}

  public function truncate_tb() {
    $this->db->empty_table('remember');
  }

  public function get_users(){
    $query = $this->db->query("SELECT * FROM user");
    return $query->result();
  }

  public function update_data($where, $data, $tabel)
  	{
  		$this->db->where($where);
  		$this->db->update($tabel, $data);
  	}

  public function delete_user($id){
    return $this->db->query("DELETE FROM user WHERE id = '$id'");
  }
}
