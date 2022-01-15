<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Todo extends CI_Controller {

	function __construct()
    {
        parent::__construct();
		if($this->session->userdata('logged_in') !== TRUE){
			redirect('/');
		}
        $this->load->model('Todo_item_model');
    } 

	public function index(){
        $uid=$_SESSION['user_id'];
        if(isset($_POST) && count($_POST) > 0)     
        {  
           $filterdate=$this->input->post('filterdate');
           
            if($filterdate!=null){
                $data['todo_item'] = $this->Todo_item_model->get_date_todo_item($filterdate,$uid);
            }else{
                $data['todo_item'] = $this->Todo_item_model->get_all_todo_item();
            }
           
        }else
        {
            $data['todo_item'] = $this->Todo_item_model->get_all_todo_item($uid);
        }
        
		$data['_view'] = 'todo/dashboard';
        $this->load->view('templates/app',$data);
	}

	public function create(){
		$data['_view'] = 'todo/create';
        $this->load->view('templates/app',$data);
	}
	public function addnew(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('todo_date','Todo Date','required');
		$this->form_validation->set_rules('todo','Todo','required');
		
		if($this->form_validation->run())     
        {   
            $uid=$_SESSION['user_id'];
            $params = array(
				'todo_date' => $this->input->post('todo_date'),
				'status' => 0,
				'created_by' => $uid,
				'task' => $this->input->post('todo'),
            );
            
            $todo_item_id = $this->Todo_item_model->add_todo_item($params);
            redirect('todo/index');
        }
        else
        {            
            $data['_view'] = 'todo/create';
            $this->load->view('templates/app',$data);
        }
	}
	function edit($id)
    {   
        $data['todo_item'] = $this->Todo_item_model->get_todo_item($id);
        
        if(isset($data['todo_item']['id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('todo_date','Todo Date','required');
			$this->form_validation->set_rules('task','Todo','required');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'todo_date' => $this->input->post('todo_date'),
					'task' => $this->input->post('task'),
                );

                $this->Todo_item_model->update_todo_item($id,$params);            
                redirect('todo');
            }
            else
            {
                $data['_view'] = 'todo/edit';
                $this->load->view('templates/app',$data);
            }
        }
        else
            show_error('The todo_item you are trying to edit does not exist.');
    } 


	function remove($id)
    {
        $todo_item = $this->Todo_item_model->get_todo_item($id);
        if(isset($todo_item['id']))
        {
            $this->Todo_item_model->delete_todo_item($id);
            redirect('todo');
        }
        else
            show_error('The todo_item you are trying to delete does not exist.');
    }

    function updatestatus(){
        $id=$this->input->post('s_id');
        $data['todo_item'] = $this->Todo_item_model->get_todo_item($id);
        
        if(isset($data['todo_item']['id']))
        {
            if($data['todo_item']['status']==1){
                $newstatus=0;
            }else{
                $newstatus=1;
            }
            $params = array(
                'status' => $newstatus,
            );

            $this->Todo_item_model->update_todo_item($id,$params);           
        }else{

        }

    }
}
