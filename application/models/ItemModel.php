<?php

class ItemModel extends CI_Model {
    private $table = "item";

    public function save($data) {
        return $this->db->insert($this->table, $data);
    }

    public function index() {
        // return $this->db->get($this->table)->result();
        $this->db->select('category.name, item.id, item.price, item.description');
        $this->db->from('item');
        $this->db->join('category', 'category.id = item.category_id', 'inner');
        $query = $this->db->get();
        return $query->result();
    }
}

?>
