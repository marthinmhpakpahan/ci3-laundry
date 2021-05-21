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

    public function getKaryawanPerformance() {
        $query = "SELECT o.user_id, a.full_name, COUNT(*) as count_order, FOUND_ROWS() as total_order FROM laundry.order o "
            . " INNER JOIN laundry.account a ON a.id = o.user_id "
            . " GROUP BY o.user_id ";
        $data = $this->db->query($query)->result();
        return $data ?: array();
    }

    public function getKategoriPerformance() {
        $query = "SELECT o.item_id, i.description, COUNT(*) as count_order FROM laundry.order o "
            . " INNER JOIN laundry.item i ON i.id = o.item_id "
            . " GROUP BY o.item_id ";
        $data = $this->db->query($query)->result();
        return $data ?: array();
    }
}

?>
