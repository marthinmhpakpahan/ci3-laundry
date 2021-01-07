<?php

class DashboardModel extends CI_Model {

    public function getTotalKaryawan() {
        $query = "SELECT count(*) as total FROM laundry.account WHERE role_id = 2";
        return $this->db->query($query)->row();
    }

    public function getTotalOrder() {
        $query = "SELECT count(*) as total FROM laundry.order";
        return $this->db->query($query)->row();
    }

    public function getTotalFinishedOrder() {
        $query = "SELECT count(ord.id) as total FROM laundry.order ord "
            . " INNER JOIN laundry.order_status ords ON ords.order_id = ord.id AND ords.status_id = 7 "
            . " GROUP BY ord.id ";
        $finished_total = $this->db->query($query)->row();
        return $finished_total ? $finished_total : array();
    }

    public function getTotalIncome() {
        $query = "SELECT sum(ord.total_price) as total FROM laundry.order ord "
            . " INNER JOIN laundry.order_status ords ON ords.order_id = ord.id AND ords.status_id = 7 "
            . " GROUP BY ord.id ";
        $income_total = $this->db->query($query)->row();
        return $income_total ? $income_total : array();
    }
}

?>
