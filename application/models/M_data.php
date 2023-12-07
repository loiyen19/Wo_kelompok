<?php
defined('BASEPATH') or exit('No direct script access allowed');


class M_data extends CI_Model
{

    public function hitung_jasa()
    {
        $query = $this->db->query("SELECT COUNT(*) as jumlah_jasa FROM tbl_produk");
        return $query->row()->jumlah_jasa;
    }
    public function hitung_kategori()
    {
        $query = $this->db->query("SELECT COUNT(*) as jumlah_kategori FROM tbl_kategori");
        return $query->row()->jumlah_kategori;
    }
    public function rincian_order(){
        $query = $this->db->query("SELECT tbl_order_temp.ID_order_temp, tbl_order_temp.Jumlah,tbl_produk.Nama_produk,
        tbl_produk.Harga,tbl_order_temp.Jumlah * tbl_produk.harga AS total_harga
        FROM tbl_order_temp
        JOIN tbl_produk ON tbl_order_temp.ID_produk = tbl_produk.ID_produk");
         return $query->result();
    }
    public function getAllProducts() {
        $query = $this->db->query('SELECT ID_produk, Nama_produk, Harga FROM tbl_produk ORDER BY RAND() LIMIT 0,10');
        return $query->result();
    }

    public function get_total_paid_orders($customer_id) {
        $this->db->select('COUNT(*) as total_order');
        $this->db->from('tbl_order');
        $this->db->where('Status', 'Sudah Dibayar');
        $this->db->where('tbl_order.ID_customer', $customer_id);
        $query = $this->db->get();
        $result = $query->row();
        return $result->total_order;
    }

   
   
   
}
