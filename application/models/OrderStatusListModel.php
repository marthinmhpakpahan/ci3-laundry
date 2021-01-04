<?php

class OrderStatusListModel extends CI_Model {
    private $table = "order_status_list";

    public function save($data) {
        return $this->db->insert($this->table, $data);
    }

    public function index() {
        return $this->db->get($this->table)->result();
    }
}

?>
