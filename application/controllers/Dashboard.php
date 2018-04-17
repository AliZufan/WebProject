<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_dashboard');
  }
  public function index()
  {
    redirect('dashboard/tabel_siswa');
  }
  public function getSiswaByID($id)
  {
    if($this->session->userdata('logged_in') == TRUE){
      $data_siswa = $this->M_dashboard->get_siswa_id($id);
      echo json_encode($data_siswa);
    } else {
      redirect('admin/login');
    }
  }
  public function tabel_siswa()
  {
    if ($this->session->userdata('logged_in') == TRUE) {
     $data['title'] = 'Dashboard';
     $data['index_view'] = 'table.php';
     $data['siswa'] = $this->M_dashboard->get_siswa();
     $data['jml_siswa'] = $this->M_dashboard->get_jml_siswa();
     $data['jml_laki'] = $this->M_dashboard->get_jml_laki();
     $data['jml_perempuan'] = $this->M_dashboard->get_jml_perempuan();
     $this->load->view('index',$data);
    } else {
      redirect('admin/login');
    }
  }
  public function table_laki()
  {
  	if ($this->session->userdata('logged_in') == TRUE) {
  		$data['title'] = 'Dashboard';
  		$data['index_view'] = 'table_laki.php';
  		$data['siswa_laki'] = $this->M_dashboard->get_siswa_kelamin('L');
  		$data['jml_siswa'] = $this->M_dashboard->get_jml_siswa();
  		$data['jml_laki'] = $this->M_dashboard->get_jml_laki();
  		$data['jml_perempuan'] = $this->M_dashboard->get_jml_perempuan();
  		$this->load->view('index', $data);
  	} else {
  		redirect('admin/login');
  	}
  }
  public function table_perempuan()
  {
  	if ($this->session->userdata('logged_in') == TRUE) {
  		$data['title'] = 'Dashboard';
  		$data['index_view'] = 'table_perempuan.php';
  		$data['siswa_perempuan'] = $this->M_dashboard->get_siswa_kelamin('P');
  		$data['jml_siswa'] = $this->M_dashboard->get_jml_siswa();
  		$data['jml_laki'] = $this->M_dashboard->get_jml_laki();
  		$data['jml_perempuan'] = $this->M_dashboard->get_jml_perempuan();
  		$this->load->view('index', $data);
  	} else {
  		redirect('admin/login');
  	}
  }
  public function chart_siswa()
  {
    if ($this->session->userdata('logged_in') == TRUE) {
     $data['title'] = 'Chart Siswa';
     $data['index_view'] = 'chart.php';
     $data['tahun'] = $this->M_dashboard->get_tahun();
     $data['jml_siswa'] = $this->M_dashboard->get_jml_siswa();
     $data['jml_laki'] = $this->M_dashboard->get_jml_laki();
     $data['jml_perempuan'] = $this->M_dashboard->get_jml_perempuan();
     $this->load->view('index',$data);
    } else {
      redirect('admin/login');
    }
  }
  public function delete_siswa()
  {
    if($this->session->userdata('logged_in') == TRUE){
      $id_siswa = $this->input->post('id');
      if ($this->M_dashboard->delete_siswa($id_siswa) == TRUE) {
        $this->session->set_flashdata('notif', 'Berhasil Hapus Data Siswa');
        redirect('dashboard');
      } else {
        $this->session->set_flashdata('notif1', 'Gagal Hapus Data Siswa');
        redirect('dashboard');
      }
    }else{
      redirect('admin/login');
    }
  }
  public function insert_siswa()
  {
    if($this->session->userdata('logged_in') == TRUE){
      $this->form_validation->set_rules('insert_nis', 'NIS', 'trim|required');
      $this->form_validation->set_rules('insert_nama', 'Nama', 'trim|required');
      $this->form_validation->set_rules('insert_tgl', 'Tanggal Lahir', 'required');
      $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
      $this->form_validation->set_rules('insert_alamat', 'Alamat', 'trim|required');

      if ($this->form_validation->run() == TRUE) {
        $date = strtotime($this->input->post('insert_tgl'));
        $data = array(
          'nis' => $this->input->post('insert_nis'),
          'nama_siswa' => $this->input->post('insert_nama'),
          'tgl_lahir' => date('Y-m-d',$date),
          'jenis_kelamin' => $this->input->post('jenis_kelamin'),
          'alamat' => $this->input->post('insert_alamat')
      );
        if ($this->M_dashboard->insert_siswa($data) == TRUE) {
          $this->session->set_flashdata('notif', 'Berhasil Insert Data Siswa');
          redirect('dashboard');
        } else {
          $this->session->set_flashdata('notif1', 'Gagal Insert Data Siswa');
          redirect('dashboard');
        }
      } else {
        $this->session->set_flashdata('notif1', validation_error());
        redirect('dashboard');
      }
    } else {
      redirect('admin/login');
    }
  }
  public function edit_siswa()
  {
    if($this->session->userdata('logged_in') == TRUE){
      $this->form_validation->set_rules('edit_nis', 'NIS', 'trim|required');
      $this->form_validation->set_rules('edit_nama', 'Nama', 'trim|required');
      $this->form_validation->set_rules('edit_tgl', 'Tanggal Lahir', 'required');
      $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
      $this->form_validation->set_rules('edit_alamat', 'Alamat', 'trim|required');

      if ($this->form_validation->run() == TRUE) {
        $date = strtotime($this->input->post('edit_tgl'));
        $data = array(
          'nis' => $this->input->post('edit_nis'),
          'nama_siswa' => $this->input->post('edit_nama'),
          'tgl_lahir' => date('Y-m-d',$date),
          'jenis_kelamin' => $this->input->post('jenis_kelamin'),
          'alamat' => $this->input->post('edit_alamat')
      );
        if ($this->M_dashboard->edit_siswa($data,$this->input->post('id_siswa')) == TRUE) {
          $this->session->set_flashdata('notif', 'Berhasil Insert Data Siswa');
          redirect('dashboard');
        } else {
          $this->session->set_flashdata('notif1', 'Gagal Insert Data Siswa');
          redirect('dashboard');
        }
      } else {
        $this->session->set_flashdata('notif1', validation_error());
        redirect('dashboard');
      }
    } else {
      redirect('admin/login');
    }
  }
}
/* End of file ${TM_FILENAME:dAshboard.php} */
/* Location: ./${TM_FILEPATH/.+((?:application).+)/DAshboard/:application/controllers/dAshboard.php} */
