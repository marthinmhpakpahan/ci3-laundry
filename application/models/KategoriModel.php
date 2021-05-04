<?php

class KategoriModel extends CI_Model {
    private $table = "category";

    public function save($data) {
        return $this->db->insert($this->table, $data);
    }

    public function index() {
        $query = "SELECT * FROM $this->table WHERE status = 1";
        return $this->db->query($query)->result();
    }

    public function update($data, $id) {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    public function detail($id) {
        $query = "SELECT * FROM $this->table WHERE id = $id LIMIT 1";
        return $this->db->query($query)->row();
    }

    public function delete($id) {
        $query = "UPDATE $this->table SET status = 0 WHERE id = $id";
        return $this->db->query($query);
    }
}

?>
