<?php

class OrderModel extends CI_Model {
    private $table = "order";

    public function save($data) {
        return $this->db->insert($this->table, $data);
    }

    public function index() {
        $this->db->select('order.*, account.full_name, item.description');
        $this->db->from('order');
        $this->db->join('account', 'account.id = order.user_id', 'left');
        $this->db->join('item', 'item.id = order.item_id', 'inner');
        $query = $this->db->get();
        return $query->result();
    }

    public function generateRandomString($length = 10) {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}

?>
