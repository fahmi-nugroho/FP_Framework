<?php

  defined('BASEPATH') OR exit('No direct script access allowed');

  class m_transaksi extends CI_Model{
    public function tampil_transaksi()
    {
        return $this->db->get('daftar_order');
    }

    public function get_data($where, $table){
      return $this->db->get_where($table, $where);
    }

    public function edit_transaksi($where,$data,$table)
    {
      $this->db->where($where);
      $this->db->update($table, $data);
    }

    public function detailPembelian($id)
    {
      $this -> db -> where('id_order', $id);
      $this -> db -> from('detail_order');
      $this -> db -> join('batik', 'batik.id_batik = detail_order.id_batik');
      $query = $this -> db -> get();
      return $query -> result();
    }

    public function updatePembelian($id, $data)
    {
      $this -> db -> where('id_order', $id);
      return $this -> db -> update('daftar_order', $data);
    }
  }
