<?php

class Todo_item_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function get_todo_item($id)
    {
        return $this->db->get_where('todo_item',array('id'=>$id))->row_array();
    }

    function get_date_todo_item($date,$uid)
    {
       
        return $this->db->get_where('todo_item',array('todo_date'=>$date,'created_by'=>$uid))->result_array();
      
    }

    function get_all_todo_item($uid)
    {
        $this->db->where('created_by',$uid);
        $this->db->order_by('id', 'desc');
        return $this->db->get('todo_item')->result_array();
    }

    function add_todo_item($params)
    {
        $this->db->insert('todo_item',$params);
        return $this->db->insert_id();
    }

    function update_todo_item($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('todo_item',$params);
    }
    
    function delete_todo_item($id)
    {
        return $this->db->delete('todo_item',array('id'=>$id));
    }
}
