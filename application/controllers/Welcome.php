<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    } 

	public function index(){
		$data['_view'] = 'welcome_message';
        $this->load->view('templates/layout',$data);
	}

	public function signup(){
		$data['_view'] = 'signup';
        $this->load->view('templates/layout',$data);
	}
	public function register(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('name','Full Name','required');
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_rules('confirm','Confirm Password','required|matches[password]');
		
		if($this->form_validation->run())     
        {   
            $hashpassword = hash("sha256", $this->input->post('password'));
            $params = array(
				'password' => $hashpassword,
				'username' => $this->input->post('name'),
				'email' => $this->input->post('email'),
            );
            
            $user_id = $this->User_model->add_user($params);
            redirect('welcome/login');
        }
        else
        {            
            $data['_view'] = 'signup';
            $this->load->view('templates/layout',$data);
        }
	}
	public function login(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('password','Password','required');		
		if($this->form_validation->run())     
        {   
            	$email    = $this->input->post('email');	
				$password = hash("sha256",$this->input->post('password'));
				$validate = $this->User_model->validate($email,$password);
				$validate->num_rows();
				if($validate->num_rows() > 0){
				$data  = $validate->row_array();
				$id=$data['id'];
				$name  = $data['username'];
				$email = $data['email'];
				$sesdata = array(
					'user_id'=>$id,
					'user_name'  => $name,
					'email'     => $email,
					'logged_in' => TRUE
				);
				$this->session->set_userdata($sesdata);   
 
				redirect('todo');
				
				}else{
					echo $this->session->set_flashdata('msg','Invalid Crediential');
					redirect('Welcome/login');
				}
        }
        else
        {            
            $data['_view'] = 'login';
            $this->load->view('templates/layout',$data);
        }
	}

	function logout(){
        $this->session->sess_destroy();
        redirect('/');
    }
}
