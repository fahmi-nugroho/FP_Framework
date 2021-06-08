<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Model_olshop extends CI_Model{
    public function views_batik() {
      $query = $this -> db -> get('batik');
      return $query -> result();
    }

    public function views_kurir() {
      $this -> db -> order_by('nama_kurir', 'ASC');
      $query = $this -> db -> get('kurir');
      return $query -> result();
    }

    public function view_batik($id)
    {
      $this -> db -> where('id_batik', $id);
      $query = $this -> db -> get('batik');
      return $query -> result();
    }

    public function pagiBatik($limit, $start)
    {
      $query = $this->db->get('batik', $limit, $start);
      return $query -> result();
    }

    public function countBatik()
    {
      return $this->db->get('batik')->num_rows();
    }
  }
