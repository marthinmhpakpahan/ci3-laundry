<?php

class KategoriModel extends CI_Model {
    private $table = "category";

    public function save($data) {
        return $this->db->insert($this->table, $data);
    }

    public function index() {
        return $this->db->get($this->table)->result();
    }
}

?>
