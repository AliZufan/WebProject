<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_admin extends CI_Model {
  public function check_member()
  {
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    $query = $this->db->where('username', $username)
                      ->where('password', $password)
                      ->get('member');
    if($query->num_rows() > 0){
      $data_login = $query->row();
      $data = array(
        'id_member' => $data_login->id_member,
        'nama' => $data_login->nama_member,
        'logged_in' => TRUE,
        'job' => $data_login->job_member,
        'year' => $data_login->tgl_daftar_member,
        'img' => $data_login->foto_profile
      );
      $this->session->set_userdata($data);
      return TRUE;
    } else {
      return FALSE;
    }
  }
}
/* End of file ${TM_FILENAME:admin_model.php} */
/* Location: ./${TM_FILEPATH/.+((?:application).+)/Admin_model/:application/models/admin_model.php} */
