<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class m_produk extends CI_Model{
    public function tampil_produk()
    {
        return $this->db->get('produk');
    }

    public function input_data($data)
    {
        $this->db->insert('produk', $data);
    }

    public function hapus_data($where, $table)
    {
      $this->db->where($where);
      $this->db->delete($table);
    }

    public function edit_data($where, $table){
      return $this->db->get_where($table, $where);
    }

    public function edit_produk($where,$data,$table)
    {
      $this->db->where($where);
      $this->db->update($table, $data);
    }
  }