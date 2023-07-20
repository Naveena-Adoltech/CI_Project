<?php
 class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Books_model');
        $this->load->model('Visitors_model');
    }
    function index(){
      $this->load->view('dashboard');
    }
    public function books() {
      $user_id=$this->session->userdata('user_id');
      $data['books']=$this->Books_model->get_all_books();
      $this->load->view('books',$data,$user_id);
    }

    public function visitors() {
      $data['visitors']=$this->Visitors_model->get_all_visitors();
      $this->load->view('visitors',$data);
    }

    public function add_books() {
      $this->load->view('add_book');
    }

    public function add_book() {
      //Form validation rules
      $this->form_validation->set_rules('author','Author','required');
      $this->form_validation->set_rules('title','Title','required');

      if($this->form_validation->run()==false) {
        //display the add book form
        $this->load->view('add_book');
      } else {
        //save the book to the database
      $data=array(
        'author'=>$this->input->post('author'),
        'title'=>$this->input->post('title'),
        'published_year'=>$this->input->post('published_year'),
        'quantity'=>$this->input->post('quantity'),
        'price'=>$this->input->post('price'),
      );
      $this->Books_model->add_book($data);
      redirect('dashboard/books');
    }
  }

  public function edit_book($book_id) {
    $books['books'] = $this->Books_model->get_book($book_id);
    if(empty($books['books'])) {
        show_404();
    }
    $this->load->view('edit_book',$books);
}

    public function update_book() {
      $this->load->model("Books_model");
      $this->Books_model->update_book();
      redirect('dashboard/books'); 
    } 
  
    public function delete_book($book_id) {
      $this->Books_model->delete_book($book_id);
      redirect('dashboard/books');
    }
    
    public function add_visitors() {
      $this->load->view('add_visitor');
    }

    public function add_visitor() {
      //Form validation rules
      $this->form_validation->set_rules('name','Name','required');
      if($this->form_validation->run()==false) {
        //display the add visitor form
        $this->load->view('add_visitor');
      } else {
        //save the visitor to the database
      $data=array(
        'name'=>$this->input->post('name'),
      );
      $this->Visitors_model->add_visitors($data);
      redirect('dashboard/visitors');
    }
  }

  public function edit_visitor($visitor_id) {
    $visitors['visitors'] = $this->Visitors_model->get_visitor($visitor_id);
    if(empty($visitors['visitors'])) {
        show_404();
    }
    $this->load->view('edit_visitor',$visitors);
}

    public function update_visitor() {
      $this->load->model("Visitors_model");
      $this->Visitors_model->update_visitor();
      redirect('dashboard/visitors'); 
    }

    public function delete_visitor($visitor_id) {
      $this->Visitors_model->delete_visitor($visitor_id);
      redirect('dashboard/visitors');
    }
    
    public function fetch_names(){
    $data['visitors'] = $this->Books_model->fetch_visitors();
    $this->load->view('check_out', $data);

    }

    public function search_names() {
      $search_term = $this->input->post('search_term');
    $results = $this->Books_model->search_names($search_term); 
    $data['results'] = $results;
    $html = $this->load->view('purchase_book', $data, true);

    echo $html; 
  }
    
    public function fetch_books(){
      $data['books']=$this->Books_model->fetch_books();
      $this->load->view('purchase_list',$data);
    }

    public function book() {
      $this->load->view('purchaseForm');
  }
  public function insert_items() {
    // Handle the AJAX request for inserting items into the database
    if ($this->input->server('REQUEST_METHOD') === 'POST') {
        // Retrieve the POST data
        $bookId = $this->input->post('bookId');
        $quantity = $this->input->post('quantity');
        $visitorName = $this->input->post('visitorName');

        // Retrieve the visitor ID based on the visitor name
        $this->db->select('visitor_id');
        $this->db->where('name', $visitorName);
        $query = $this->db->get('visitors');
        $visitor = $query->row();
        $visitorId = $visitor->visitor_id;

        // Retrieve the book details based on the book ID
        $this->db->where('book_id', $bookId);
        $query = $this->db->get('books');
        $book = $query->row();

        if ($book) {
            // Check if the quantity is available
            if ($book->quantity >= $quantity) {
                // Perform the database insertion
                $data = array(
                    'book_id' => $bookId,
                    'visitor_id' => $visitorId,
                    'visitor_name' => $visitorName,
                    'book_purchased' => $book->title,
                    'quantity' => $quantity
                );

                $this->db->insert('items', $data);

                // Update the quantity in the books table
                $newQuantity = $book->quantity - $quantity;
                $this->db->set('quantity', $newQuantity);
                $this->db->where('book_id', $bookId);
                $this->db->update('books');

                // Return a response
                echo "Item inserted successfully!";
            } else {
                echo "Insufficient quantity!";
            }
        } else {
            echo "Book not found!";
        }
    } else {
        // Invalid request method
        echo "Invalid request.";
    }
}
public function view_items() {

  $this->load->model('Books_model');
  $data['items'] = $this->Books_model->get_items();
  $this->load->view('view', $data);
}
public function check_in() {
  $this->load->model('Books_model');
  $data['items'] = $this->Books_model->get_items();
  $this->load->view('check_in', $data);
}

public function return_item() {
  $itemId = $this->input->post('item_id');

  // Update the item as returned in the database
  $this->load->model('Books_model');
  $this->Books_model->return_item($itemId);

  // Redirect to the same page (items table)
  redirect('dashboard/check_in');
}

public function book_return() {
  $this->load->model('Books_model');
  $data['items'] = $this->Books_model->book_return();
  $this->load->view('book_returned', $data);
}
 }

  
 