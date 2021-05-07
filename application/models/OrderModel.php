<?php

class OrderModel extends CI_Model {
    private $table = "order";

    public function save($data) {
        return $this->db->insert($this->table, $data);
    }

    public function index() {
        $query = " SELECT o.*, a.full_name, i.description, (SELECT osl.name FROM order_status os INNER JOIN order_status_list osl ON osl.id = os.status_id WHERE os.order_id = o.id ORDER BY os.id DESC LIMIT 1) as status "
            . " FROM `order` o "
            . " INNER JOIN `account` a ON a.id = o.user_id "
            . " INNER JOIN `item` i ON i.id = o.item_id ";
        return $this->db->query($query)->result();
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

    public function detail($booking_code) {
        $order = [];
        $query = "SELECT o.*, a.full_name as pic FROM laundry.order o INNER JOIN `account` a ON a.id = o.user_id WHERE o.booking_code = '{$booking_code}' LIMIT 1";
        $order = $this->db->query($query)->row();
        if($order) {
            $query_order_status = "SELECT osl.name as status, os.created FROM `order_status` os INNER JOIN order_status_list osl ON osl.id = os.status_id WHERE os.order_id = " . $order->id . " ORDER BY os.created ASC";
            $order->status_order = $this->db->query($query_order_status)->result();
            $query_detail_order = "SELECT i.category_id, i.description as item, i.price, c.name as category FROM `item` i INNER JOIN category c ON c.id = i.category_id WHERE i.id = " . $order->item_id;
            $order->item = $this->db->query($query_detail_order)->row();
        }
        return $order;
    }
}

?>
