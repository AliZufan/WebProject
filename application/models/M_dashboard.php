<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_dashboard extends CI_Model {
  public function get_siswa()
  {
    return $this->db->get('siswa')->result();
  }
  public function get_siswa_kelamin($kelamin)
  {
    return $this->db->where('jenis_kelamin', $kelamin)->get('siswa')->result();
  }
  public function insert_siswa($data)
  {
    $this->db->insert('siswa', $data);
    if($this->db->affected_rows()>0){
      return TRUE;
    } else {
      return FALSE;
    }
  }
  public function edit_siswa($data,$id)
  {
    $this->db->where('id_siswa',$id)
    ->update('siswa', $data);
    if($this->db->affected_rows()>0){
      return TRUE;
    } else {
      return FALSE;
    }
  }
  public function get_siswa_id($id_siswa)
  {
    return $this->db->where('id_siswa', $id_siswa)->get('siswa')->row();
  }
  public function get_jml_siswa()
  {
    $query = $this->db->get('siswa');
    if($query->num_rows() > 0){
      return $query->num_rows();
    } else {
      return 0;
    }
  }
  public function get_jml_laki()
  {
    $query = $this->db->where('jenis_kelamin','L')
    ->get('siswa');
    if($query->num_rows() > 0){
      return $query->num_rows();
    } else {
      return 0;
    }
  }
  public function get_jml_perempuan()
  {
    $query = $this->db->where('jenis_kelamin','P')
    ->get('siswa');
    if($query->num_rows() > 0){
      return $query->num_rows();
    } else {
      return 0;
    }
  }
  public function delete_siswa($id_siswa)
  {
    $this->db->where('id_siswa',$id_siswa)
    ->delete('siswa');
    if($this->db->affected_rows()>0){
      return TRUE;
    } else {
      return FALSE;
    }
  }
  public function get_tahun()
  {
    $query = $this->db->query("SELECT YEAR(tgl_lahir) as tahun,COUNT(YEAR(tgl_lahir)) as jumlah FROM siswa GROUP BY YEAR(tgl_lahir) ORDER BY YEAR(tgl_lahir) ASC");
    return $query->result();    
  }
}
/* End of file ${TM_FILENAME:dashboard_model.php} */
/* Location: ./${TM_FILEPATH/.+((?:application).+)/Dashboard_model/:application/models/dashboard_model.php} */
