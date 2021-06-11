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

    public function updateBatik($id, $data)
    {
      $this -> db -> where('id_batik', $id);
      return $this -> db -> update('batik', $data);
    }

    public function totalPenjualan($id)
    {
      $this -> db -> where('id_batik', $id);
      $this -> db -> from('detail_order');
      $this -> db -> join('daftar_order', 'daftar_order.id_order = detail_order.id_order');
      $this -> db -> where('status', 'Pesanan Selesai');
      $this -> db -> select_sum('jumlah');
      $query = $this -> db -> get();
      return $query -> result();
    }

    public function rating($id)
    {
      $this -> db -> where('id_batik', $id);
      $this -> db -> from('rating');
      $this -> db -> join('daftar_order', 'daftar_order.id_order = rating.id_order');
      $this -> db -> where('status', 'Pesanan Selesai');
      $this -> db -> select_avg('rating');
      $query = $this -> db -> get();
      return $query -> result();
    }

    public function view_user($id)
    {
      $this -> db -> where('id_user', $id);
      $query = $this -> db -> get('user');
      return $query -> result_array();
    }

    public function updateUser($id, $data)
    {
      $this -> db -> where('id_user', $id);
      return $this -> db -> update('user', $data);
    }

    public function pagiBatik($limit, $start)
    {
      $query = $this -> db -> get('batik', $limit, $start);
      return $query -> result();
    }

    public function countBatik()
    {
      return $this -> db -> get('batik')->num_rows();
    }

    public function register($data)
    {
      return $this -> db -> insert('user', $data);
    }

    public function login($email)
    {
      $this -> db -> where('email', $email);
      $query = $this -> db -> get('user');
      return $query -> result_array();
    }

    public function checkout($data)
    {
      return $this -> db -> insert('daftar_order', $data);
    }

    public function detailCheckout($data)
    {
      return $this -> db -> insert('detail_order', $data);
    }

    public function pembelian($id)
    {
      $this -> db -> where('id_user', $id);
      $this -> db -> order_by('id_order', 'DESC');
      $query = $this -> db -> get('daftar_order');
      return $query -> result();
    }
  }
