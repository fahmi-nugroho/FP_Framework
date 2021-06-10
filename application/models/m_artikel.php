<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class m_artikel extends CI_Model{
    public function tampil_artikel()
    {
        return $this->db->get('artikel');
    }

    public function tampil_artikellain($id)
    {
      $this->db->where('id_artikel !=', $id);
      return $this->db->get('artikel', 4);
    }

    public function pagiArtikel($limit, $start)
    {
      $query = $this->db->get('artikel', $limit, $start);
      return $query -> result();
    }

    public function countArtikel()
    {
      return $this->db->get('artikel')->num_rows();
    }

    public function input_data($data)
    {
        $this->db->insert('artikel', $data);
    }

    public function hapus_data($where, $table)
    {
      $this->db->where($where);
      $this->db->delete($table);
    }

    public function edit_data($where, $table){
      return $this->db->get_where($table, $where);
    }

    public function edit_artikel($where,$data,$table)
    {
      $this->db->where($where);
      $this->db->update($table, $data);
    }
  }