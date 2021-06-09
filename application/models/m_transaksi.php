<?php

  defined('BASEPATH') OR exit('No direct script access allowed');

  class m_transaksi extends CI_Model{
    public function tampil_transaksi()
    {
        return $this->db->get('transaksi');
    }

    public function get_data($where, $table){
      return $this->db->get_where($table, $where);
    }

    public function edit_transaksi($where,$data,$table)
    {
      $this->db->where($where);
      $this->db->update($table, $data);
    }
  }