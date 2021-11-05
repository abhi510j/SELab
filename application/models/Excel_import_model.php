<?php

class Excel_import_model extends CI_Model{
    function select(){
        $this->db->order_by('SerialNumber', 'DESC');
        $query = $this->db->get('graduating_students');
        return $query;
    }

    function insert($data){
        $this->db->insert_batch('graduating_students', $data);
    }
}

?>