<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{
    public function index()
    {
        $data['title'] = 'Halaman Admin';
        $data['tiket'] = $this->model_tiket->tampil_data()->result();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

         $this->load->view('templates/header', $data);
           $this->load->view('templates/sidebar', $data);
           $this->load->view('templates/j', $data);
           $this->load->view('admin/index', $data);
           $this->load->view('templates/footer');  
    }
    public function tambah_aksi()
{
    $nama_tkt = $this->input->post('nama_tkt');
    $harga = $this->input->post('harga');
    $stok = $this->input->post('stok');
    $gambar = $_FILES['gambar']['name'];
    if ($gambar = ''){}else{
        $config ['upload_path'] = './Wahana1/imgs/';
        $config ['allowed_type'] = 'jpg|jpeg|png|gif';

        $this->load->library('upload', $config);
        if(!$this->upload->do_upload('gambar')){
            echo "Gambar Gagal Diupload!";
        }else {
            $gambar = $this->upload->data('file_name');
        }
    }
    $data = array (
        'nama_tkt'         => $nama_tkt,
        'harga'         => $harga,
        'stok'         => $stok,
        'gambar'         => $gambar
    );
    $this->model_tiket->tambah_tiket($data, 'tb_tiket');
    redirect('admin/index');
}
public function edit($no)
{
    $where = array('no' =>$no);
    $data['tiket'] = $this->model_tiket->edit_tiket($where, 'tb_tiket')->result();
    
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/j', $data);
    $this->load->view('admin/edit_tiket', $data);
    $this->load->view('templates/footer');  
}
public function update(){
    $no          = $this->input->post('no');
    $nama_tkt    = $this->input->post('nama_tkt');
    $harga       = $this->input->post('harga');
    $stok        = $this->input->post('stok');

    //array
    $data = array(      
        'nama_tkt' => $nama_tkt,
        'harga' => $harga,
        'stok' => $stok

    );

    $where = array(
        'no' => $no
    );
    $this->model_tiket->update_data($where,$data,'tb_tiket');
    redirect('Admin/index');
}
public function hapus($no)
{
    $where = array('no' => $no);
    $this->model_tiket->hapus_data($where, 'tb_tiket');
    redirect('Admin/index');
}
}

