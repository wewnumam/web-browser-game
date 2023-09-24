<?php

class Record_model extends CI_Model {
    private $table = 'record';

    public function getRecord() {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->order_by('time');
        $this->db->limit(5);
        return $this->db->get()->result();
    }

    public function addRecord($data) {
        $this->db->insert($this->table, $data);
    }
}