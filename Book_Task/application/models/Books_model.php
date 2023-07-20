<?php
class Books_model extends CI_model {

    public function __construct() {
        $this->load->database();
    }

public function get_all_books() {
    $user_id=$this->session->userdata('user_id');
     $query=$this->db->get('books');
     return $query->result();
}

public function get_book($book_id) {
      $query=$this->db->get_where('books',array('book_id'=>$book_id));
      return $query->result();
}

public function add_book($data) {
    $this->db->insert('books',$data);
    return $this->db->insert_id();
}

public function delete_book($book_id) {
    $this->db->where('book_id',$book_id);
    $this->db->delete("books");
    return true;

 }

 public function update_book() {
    $book_id=url_title($this->input->post('book_id'));
    $books=array(
        'book_id'=>$book_id,
        'author'=> $this->input->post('author'),
        'title'=>$this->input->post('title'),
        'published_year'=>$this->input->post('published_year'),
        'quantity'=>$this->input->post('quantity'),
        'price'=>$this->input->post('price')
    );
    $this->db->where('book_id',$this->input->post('book_id'));
    return $this->db->update('books',$books);
   
 }

Public function get_book_by_id() {
    $id = url_title($this->input->post('book_id')); 
    $data=array(
        'book_id'=>$book_id
    );
    $this->db->where('book_id',$this->input->post('book_id'));
    return $this->db->update('books',$data);
}

public function updateBook($book_id,$data) {
    $this->db->where('book_id',$book_id);
    $this->db->update('books',$data);
}

public function fetch_visitors()
    {
     $this->db->order_by("name", "ASC");
     $query = $this->db->get("visitors");
     return $query->result();
    }
    public function search_names($search_term) {
        if (!empty($search_term)) {
            $this->db->select('name');
            $this->db->from('visitors');
            $this->db->like('name', $search_term, 'both');
            $query = $this->db->get();
    
            return $query->result_array();
        } else {
            return array();
        }
    }
    
public function get_records($name){
    if(!empty($name)){
        $this->db->select('name');
        $this->db->like('name',$name);
        $record_values=array();
        foreach($query->result() as $row){
            $record_values[]=$row->name;
    }
    
    }
}
public function fetch_books(){
    $this->db->order_by("title","ASC");
    $query=$this->db->get("books");
    return $query->result();
}
public function get_related_names() {
    //Fetch related names from the database based on the input
   $this->db->select('name');
   $query=$this->db->get('visitors');
    return $query->result();
   }
   
public function get_items() {
    // Fetch items from the database
    $this->db->select('*');
    $this->db->from('items');
    $query = $this->db->get();

    // Check if any items exist
    if ($query->num_rows() > 0) {
        // Return the items as an array of objects
        return $query->result();
    }

    // No items found, return an empty array
    return array();
}

public function return_item($itemId) {
    // Retrieve the item from the database
    $this->db->where('item_id', $itemId);
    $query = $this->db->get('items');
    $item = $query->row();

    if ($item) {
        // Update the book_returned status in the items table
        $this->db->set('book_returned', 1);
        $this->db->where('item_id', $itemId);
        $this->db->update('items');

        // Increment the quantity in the books table
        $this->db->set('quantity', 'quantity + ' . $item->quantity, false);
        $this->db->where('book_id', $item->book_id);
        $this->db->update('books');
    }
}

public function book_return() {

    $this->db->select('item_id, book_id, visitor_id, visitor_name, quantity, book_returned');
    $query = $this->db->get('items');
    return $query->result();

    // Check if any items exist
    if ($query->num_rows() > 0) {
        // Return the items as an array of objects
        return $query->result();
    }

    // No items found, return an empty array
    return array();
}
}






