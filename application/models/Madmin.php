<?php

class Madmin extends CI_Model
{

    public function cek_login($u, $p)
    {
        $q = $this->db->get_where('tbl_admin', array('Username' => $u, 'Password' => $p));
        return $q;
    }
    public function get_all_data($tabel)
    {
        $q = $this->db->get($tabel);
        return $q;
    }

    public function insert($tabel, $data)
    {
        $this->db->insert($tabel, $data);
    }
    public function get_by_id($tabel, $id)
    {
        return $this->db->get_where($tabel, $id);
    }
    public function update($tabel, $data, $pk, $id)
    {
        $this->db->where($pk, $id);
        $this->db->update($tabel, $data);
    }
    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function delete($tabel, $id, $val)
    {
        $this->db->delete($tabel, array($id => $val));
    }
    public function detail_data($id = null)
    {
        $query = $this->db->get_where('tbl_produk', array('ID_produk' => $id))->row();
        return $query;
    }
    public function detail_order($id = null)
    {
        $query = $this->db->get_where('tbl_order_detail', array('ID_orders' => $id))->row();
        return $query;
    }
    public function detail_orders($id = null)
    {
        $query = $this->db->get_where('tbl_orders', array('ID_orders' => $id))->row();
        return $query;
    }
    public function detail_nota($id = null)
    {
        $query = $this->db->get_where('tbl_order_temp', array('ID_order_temp' => $id))->row();
        return $query;
    }
    public function detail_kategori($id = null)
    {
        $query = $this->db->get_where('tbl_kategori', array('ID_kategori' => $id))->row();
        return $query;
    }
    public function detail_jasa($id = null)
    {
        $query = $this->db->get_where('tbl_produk', array('ID_produk' => $id))->row();
        return $query;
    }
    public function detail_order_pembayaran ($id = null)
    {
        $query = $this->db->get_where('tbl_order', array('ID_order' => $id))->row();
        return $query;
    }
    public function insertImages($data)
    {
        $this->db->insert_batch('tbl_image', $data);
    }
    public function detail_datacart($id)
    {
        $query = $this->db->select('ID_produk, Nama_produk, Harga, Diskon, Harga - (Harga * Diskon / 100) AS harga_Ds')
            ->from('tbl_produk')
            ->where('ID_produk', $id)
            ->get();

        return $query->row();
    }

    public function insert_gambar($data)
    {
        $this->db->insert('tbl_image', $data);
    }
}
