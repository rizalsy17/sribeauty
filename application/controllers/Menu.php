<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller 
{
    public function index() 
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
     

 //Query data menunya,karena  banya jadi pakai result_array,kalau sebaris pakai row_array
 $data['menu'] = $this->db->get('user_menu')->result_array();

 //rules menu/ form validation
 $this->form_validation->set_rules('menu', 'Menu', 'required');



//masuk menu management,hasil false/error
if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
           $this->load->view('templates/sidebar', $data);
           $this->load->view('templates/topbar', $data);
           $this->load->view('menu/index', $data);
           $this->load->view('templates/footer');
// kalau berhasil/true(insert db ke tabel user menu,datanya menu =post menu)
} else {
    $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
    $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
    New menu added
         </div>');
        redirect('menu');
}   
    }
    
    public function submenu()
    {
        $data['title'] = ' Submenu Management';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        //load model
        $this->load->model('Menu_model','menu');
        //ambil loadnya
        $data['subMenu'] = $this->menu->getSubMenu();
        //kirim data menu
$data['menu'] = $this->db->get('user_menu')->result_array();

//form validation
$this->form_validation->set_rules('title', 'Title', 'required');
$this->form_validation->set_rules('menu_id', 'Menu', 'required');
$this->form_validation->set_rules('url', 'Url', 'required');
$this->form_validation->set_rules('icon', 'Icon', 'required');

if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/submenu', $data);
        $this->load->view('templates/footer');
} else {
    $data = [
        'title' => $this->input->post('title'),
        'menu_id' => $this->input->post('menu_id'),
        'url' => $this->input->post('url'),
        'is_active' => $this->input->post('is_active')
    ];
    $this->db->insert('user_sub_menu', $data);
    $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
    New Submenu added
         </div>');
        redirect('menu/submenu');
}
     
    }

}
