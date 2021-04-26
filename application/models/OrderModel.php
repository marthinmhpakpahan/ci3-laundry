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
}

?>
