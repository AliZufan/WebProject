<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_admin');
  }
  public function index()
  {
    redirect('admin/login');
  }
  public function login()
  {
    if ($this->session->userdata('logged_in') == FALSE) {
      $this->load->view('login');
    } else {
      redirect('dashboard');
    }
  }

  public function do_login()
  {
    if ($this->input->post('Submit')) {
      $this->form_validation->set_rules('username', 'Username', 'trim|required');
      $this->form_validation->set_rules('password', 'Password', 'trim|required');

      if ($this->form_validation->run() == TRUE) {
        if ($this->M_admin->check_member() == TRUE) {
          redirect('dashboard');
        } else {
          $this->session->set_flashdata('login_notif', 'Username atau Password Salah');
          redirect('admin/login');
        }
      } else {
        $this->session->set_flashdata('login_notif', 'Isikan Username dan Password');
        redirect('admin/login');
      }
    } else {
      redirect('admin/login');
    }
  }
  public function logout()
  {
    $data = array(
      'id_member' => "",
      'nama' => "",
      'logged_in' => FALSE
    );
    $this->session->unset_userdata($data);
    $this->session->sess_destroy();
    redirect('admin/login');
  }
}
/* End of file ${TM_FILENAME:admin.php} */
/* Location: ./${TM_FILEPATH/.+((?:application).+)/Admin/:application/controllers/admin.php} */
