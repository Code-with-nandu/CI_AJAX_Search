<?php
class Ajaxsearch_model extends CI_Model
{
    function fetch_data($query)
    {
        $this->db->select('*');
        $this->db->from('m_visitor');
        if($query != '')
        {
            $this->db->like('id',$query);
            $this->db->like('first_name',$query);
            $this->db->like('last_name',$query);
            $this->db->like('mobile',$query);
            $this->db->like('email',$query);
            $this->db->like('notes',$query);
            $this->db->like('token',$query);
            $this->db->like('password',$query);
         
        }
        $this->db->order_by('id','DESC');
        $this->db->limit(10); // Limiting the results to 5
        return $this->db->get();
    }
}


?>