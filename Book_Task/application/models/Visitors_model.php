<?php
class Visitors_model extends CI_model {
    public function __construct() {
        $this->load->database();
    }

    public function get_all_visitors() {
        $query=$this->db->get('visitors');
        return $query->result();
    }

    public function get_visitor($visitor_id) {
        $query=$this->db->get_where('visitors',array('visitor_id'=>$visitor_id));
        return $query->result();
   }
   
    public function add_visitors($data) {
        $this->db->insert('visitors',$data);
        return $this->db->insert_id();
    }

    public function update_visitor() {
        $visitor_id = url_title($this->input->post('visitor_id')); 
        $visitors=array(
            'visitor_id'=>$visitor_id,
            'name'=>$this->input->post('name'),
        );
        $this->db->where('visitor_id',$this->input->post('visitor_id'));
        return $this->db->update('visitors',$visitors);
       
     }
    
     public function delete_visitor($visitor_id) {
        $this->db->where('visitor_id',$visitor_id);
        $this->db->delete("visitors");
        return true;
    }

   public function searchVisitor($searchText) {
    $this->db->like('name',$searchText);
    return $this->db->get('visitors')->result();
   }
   
}





