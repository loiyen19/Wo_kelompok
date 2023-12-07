<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order_beranda extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Madmin');
        $this->load->model('M_menu_pelanggan');
        $this->load->model('M_join_tabel');
        $this->load->model('M_data');
        $this->load->library('cart');
        $this->load->library('form_validation');
        $this->load->library('pagination');
    }

    public function index()
    {
        if (empty($this->session->userdata('emailCustomer'))) {
            redirect('Beranda_wed/login_pelanggan');
        }

        $data['user'] = $this->db->get_where('tbl_customer', ['Email' =>
        $this->session->userdata('emailCustomer')])->row_array();

        $data['cartItems'] = $this->cart->contents();


        $data['order'] = $this->M_menu_pelanggan->getOrdersByCustomerId();
        
        $customer_id = $this->session->userdata('ID_customer');
        $data['total_order'] = $this->M_data->get_total_paid_orders($customer_id);

        //WAKTU PEMBAYARAN
        $unpaid_orders = $this->M_menu_pelanggan->getUnpaidOrders();
        foreach ($unpaid_orders as $order) {
            // Periksa apakah telah lewat 24 jam dari waktu pembayaran
            $payment_time = strtotime($order->payment_time);
            $current_time = time();

            if ($current_time - $payment_time > 24 * 60 * 60) {
                // Tandai pesanan sebagai hangus
                $this->Order_model->markOrderAsExpired($order->order_id);
            } else {
                $this->session->set_flashdata('not', ' <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h6><i class="fa fa-check"></i><b> Gagal!</b></h6>
                Silahkan Cek Kembali Inputam Anda.
              </div>');
                redirect('order_beranda');
            }
        }

        $customer_id = $this->session->userdata('ID_customer');
        $data['order_item'] = $this->M_join_tabel->proses($customer_id);
        $data['isWeddingOrganizer'] = true;
        $data['active'] = 'order';
        $data['title'] = ' Pesanan';
        $this->load->view('Pelanggan/layout/header', $data);
        $this->load->view('Pelanggan/layout/menu', $data);
        $this->load->view('Pelanggan/Order/Tampil_order_cus', $data);
        $this->load->view('Pelanggan/layout/footer');
    }

    public function pembayaran($id)
    {
        if (empty($this->session->userdata('emailCustomer'))) {
            redirect('Beranda_wed/login_pelanggan');
        }

        $data['user'] = $this->db->get_where('tbl_customer', ['Email' =>
        $this->session->userdata('emailCustomer')])->row_array();

        $detail = $this->Madmin->detail_order_pembayaran($id);
        $data['detail'] = $detail;

        $payment_deadline = $this->M_menu_pelanggan->getPaymentDeadline($id);

        $data['payment_deadline'] = $payment_deadline;

        $time = $this->M_menu_pelanggan->deleteUnpaidOrders();

        $data['rekening'] = $this->Madmin->get_all_data('tbl_rekening')->result();

        $this->M_menu_pelanggan->ubahStatusPembayaran($id, 'Sudah Dibayar');

      

        $this->form_validation->set_rules('nama_bayar', 'Nama bayar', 'required', array(
            'required' => 'Masukan Nama anda!'
        ));
        $this->form_validation->set_rules('rekening', 'Rekening', 'required', array(
            'required' => 'Masukan Nomor Rekening anda!'
        ));
        $this->form_validation->set_rules('bank', 'bank', 'required', array(
            'required' => 'Masukan Bank anda!'
        ));

        if ($this->form_validation->run() === FALSE) {
            
            $data['isWeddingOrganizer'] = true;
            $data['active'] = 'order';
            $data['title'] = ' Pembayaran';
            $this->load->view('Pelanggan/layout/header', $data);
            $this->load->view('Pelanggan/layout/menu', $data,);
            $this->load->view('Pelanggan/Order/Pembayaran_order_customer', $data, $time);
            $this->load->view('Pelanggan/layout/footer');
        } else {
            $id_order = $this->input->post('id_order');
            $nama_bayar = $this->input->post('nama_bayar');
            $nominal = $this->input->post('nominal');
            $bank = $this->input->post('bank');
            $rekening = $this->input->post('rekening');


            $config['upload_path'] = './asset/gambar/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['ukuran_maks']              =  5000;
            $config['max_width']             =  2048;
            $config['max_height']            =  2048;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {
                $data_file = $this->upload->data();
                $dataInput = array(
                    'ID_order' => $id_order,
                    'Nama' => $nama_bayar,
                    'Nominal' => $nominal,
                    'Bank' => $bank,
                    'Rekening' => $rekening,
                    'Gambar' => $data_file['file_name'],
                    'Date_created' => date('Y-m-d H:i:s')
                );
              
                $this->Madmin->insert('tbl_bayar', $dataInput);

                $this->session->set_flashdata('not', ' <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h6><i class="fa fa-check"></i><b> Berhasil!</b></h6>
                Pembahayaran Berhasil.Selanjutnya Menunggu Verifikasi
              </div>');
                redirect('order_beranda');
            }
        }
    }
    public function proses(){
        if (empty($this->session->userdata('emailCustomer'))) {
            redirect('Beranda_wed/login_pelanggan');
        }

        $data['user'] = $this->db->get_where('tbl_customer', ['Email' =>
        $this->session->userdata('emailCustomer')])->row_array();


    }
   
}
