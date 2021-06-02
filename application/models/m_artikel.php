<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class m_artikel extends CI_Model{
    public function tampil_artikel()
    {
        return $this->db->get('artikel');
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
  }