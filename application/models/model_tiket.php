<?php
class Model_tiket extends CI_Model {
    public function tampil_data() {
        $this->db->get('tb_tiket');
        return $this->db->get('tb_tiket');
        
    }
    public function tambah_tiket($data,$table){
        $this->db->insert($table,$data);
    }
    public function edit_tiket($where,$table){
        return $this->db->get_where($table,$where);
    }
    public function update_data($where,$data,$table)
    {
        $this->db->where($where);
        $this->db->update($table,$data);

    }
    public function hapus_data($where,$table){
       $this->db->where($where);
        $this->db->delete($table);

    }
}
?>