<?php

  defined('BASEPATH') OR exit('No direct script access allowed');

  class m_kurir extends CI_Model{
    public function tampil_kurir()
    {
        return $this->db->get('kurir');
    }

    public function input_data($data)
    {
        $this->db->insert('kurir', $data);
    }

    public function hapus_data($where, $table)
    {
      $this->db->where($where);
      $this->db->delete($table);
    }

    public function edit_data($where, $table){
      return $this->db->get_where($table, $where);
    }

    public function edit_kurir($where,$data,$table)
    {
      $this->db->where($where);
      $this->db->update($table, $data);
    }
  }