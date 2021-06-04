<?php

  defined('BASEPATH') OR exit('No direct script access allowed');

  class m_transaksi extends CI_Model{
    public function tampil_transaksi()
    {
        return $this->db->get('transaksi');
    }
  }