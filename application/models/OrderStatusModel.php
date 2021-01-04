<?php

class OrderStatusModel extends CI_Model {
    private $table = "order_status";

    public function save($data) {
        return $this->db->insert($this->table, $data);
    }

    public function index() {
        return $this->db->get($this->table)->result();
    }

    public function get($order_id) {
        $this->db->select('order_status.*, order_status_list.name');
        $this->db->from('order_status');
        $this->db->join('order_status_list', 'order_status.status_id = order_status_list.id', 'inner');
        $query = $this->db->get();
        return $query->result();
    }
}

?>
