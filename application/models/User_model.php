<?php

class User_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function get_user($id)
    {
        return $this->db->get_where('user',array('id'=>$id))->row_array();
    }
            
    function add_user($params)
    {
        $this->db->insert('user',$params);
        return $this->db->insert_id();
    }
    
    function update_user($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('user',$params);
    }

    function validate($email,$password){
        $this->db->where('email',$email);
        $this->db->where('password',$password);
        $result = $this->db->get('user',1);
        return $result;
    }
  
}
