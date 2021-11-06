<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Excel_import_model extends CI_Model
{
    public function select()
    {
        $this->db->order_by("SerialNumber");
        // $this->db->limit(10);
        $query = $this->db->get("graduating_students");
        return $query;

    }

    public function insert($data)
    {
        $this->db->insert_batch('graduating_students', $data);
    }
}