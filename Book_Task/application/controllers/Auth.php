<?php
class Auth extends CI_Controller {

    public function index() {
        $this->load->view('registration_form');
    }
    public function register() {

        //set validation rules
        if($_SERVER['REQUEST_METHOD']=='POST')
		{
			$this->form_validation->set_rules('username','User Name','required');
            $this->form_validation->set_rules('email','Email','required');
			$this->form_validation->set_rules('password','Password','required');
        if($this->form_validation->run()==FALSE) {
			$this->load->view('registration_form');
		} else {
			$data=array(
				'username'=>$this->input->post('username'),
				'email'=>$this->input->post('email'),
				'password'=>$this->input->post('password'),
			);
			$this->load->model('user_model');
			$user_id=$this->user_model->register_user($data);

			$this->session->set_userdata('user_id',$user_id);
			redirect('auth/login');
		}
			
}
	}
	public function login() {
		$this->load->view('login');
	}
public function loginNow(){
	
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('password','Password','required');

		if($this->form_validation->run()==FALSE) {
			$this->load->view('login');
		} else {
			$email=$this->input->post('email');
			$password=$this->input->post('password');

			$this->load->model('user_model');
			$user=$this->user_model->login_user($email,$password);

			if($user) {
				$this->session->set_userdata('user_id',$user->id);
				redirect('dashboard');
			}else {
				$data['error']='Invalid email or password';
				$this->load->view('login',$data);
			}
		}
	}	
         
  public function dashboard()
	{   
		
	
		$this->load->view('dashboard');
	
	}

	function logout()
	{
		session_destroy();
		redirect(base_url('auth/login'));
	}
}

