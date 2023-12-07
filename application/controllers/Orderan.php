<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Orderan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Madmin');
        $this->load->model('M_join_tabel');
        $this->load->model('M_data');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if (empty($this->session->userdata('userName'))) {
            redirect('adminpanel');
        }

        $data['user'] = $this->db->get_where('tbl_admin', ['userName' =>
        $this->session->userdata('userName')])->row_array();

        $data['orderan'] = $this->M_join_tabel->join_customer('tbl_orders');


        $data['title'] = 'Orderan';
        $this->load->view('Admin/layout/header', $data);
        $this->load->view('Admin/layout/menu');
        $this->load->view('Admin/Orderan/Tampil_orderan_admin', $data);
        $this->load->view('Admin/layout/footer');
    }

    public function detail_orderan($id)
    {
        if (empty($this->session->userdata('userName'))) {
            redirect('adminpanel');
        }

        $data['user'] = $this->db->get_where('tbl_admin', ['userName' =>
        $this->session->userdata('userName')])->row_array();


        $detail = $this->Madmin->detail_orders($id);
        $data['detail'] = $detail;


        //$data['order_temp'] = $this->M_join_tabel->join_order_temp('tbl_order_temp');
        $data['rincian'] = $this->M_join_tabel->nota_pembelian();
       

        $data['title'] = 'Detail Orderan';
        $this->load->view('Admin/layout/header', $data);
        $this->load->view('Admin/layout/menu');
        $this->load->view('Admin/Orderan/Detail_Orderan', $data);
        $this->load->view('Admin/layout/footer');
    }

    public function produk_admin(){
        if (empty($this->session->userdata('userName'))) {
            redirect('adminpanel');
        }

        $data['user'] = $this->db->get_where('tbl_admin', ['userName' =>
        $this->session->userdata('userName')])->row_array();

        $data['order_temp'] = $this->M_join_tabel->join_order_temp('tbl_order_temp');

        $data['title'] = 'Cek Out';
        $this->load->view('Admin/layout/header', $data);
        $this->load->view('Admin/layout/menu');
        $this->load->view('Admin/Orderan/Tampil_produk_pembelian', $data);
        $this->load->view('Admin/layout/footer');


    }

    public function nota_pembelian($id){
        if (empty($this->session->userdata('userName'))) {
            redirect('adminpanel');
        }

        $data['user'] = $this->db->get_where('tbl_admin', ['userName' =>
        $this->session->userdata('userName')])->row_array();

        $detail = $this->Madmin->detail_nota($id);
        $data['detail'] = $detail;

        $data['order'] = $this->M_join_tabel->join_order('tbl_orders');
        $data['total_order'] = $this->M_data->rincian_order();


        $data['title'] = 'Nota Check Out';
        $this->load->view('Admin/layout/header', $data);
        $this->load->view('Admin/layout/menu');
        $this->load->view('Admin/Orderan/Detail_nota_pembelian', $data);
        $this->load->view('Admin/layout/footer');
    }

    

    

    public function ubah_status($id)
    {
        if (empty($this->session->userdata('userName'))) {
            redirect('adminpanel');
        }

        $dataWhere = array('ID_orders' => $id);
        $result = $this->Madmin->get_by_id('tbl_orders', $dataWhere)->row_object();
        $status = $result->Status_order;
        if ($status == "Sedang diproses") {
            $dataUpdate = array('Status_order' => "Dibatalkan");
        } else {
            $dataUpdate = array('Status_order' => "Sedang diproses");
        }
        $this->Madmin->update('tbl_orders', $dataUpdate, 'ID_orders', $id);

        $this->session->set_flashdata('not', ' <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h6><i class="fa fa-check"></i><b> Berhasil!</b></h6>
                Status Orderan Berhasil Diubah !!
              </div>');
        redirect('Orderan');
    }
}
