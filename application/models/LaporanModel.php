<?php

class LaporanModel extends CI_Model {

    public function indexKaryawanReport($start_date="", $end_date="") {
        $where = "";
        if($start_date != "") {
            $where .= " AND o.created_date >= '{$start_date}' ";
        }
        if($end_date != "") {
            $where .= " AND o.created_date <= '{$end_date}' ";
        }

        $query = "SELECT a.id as 'karyawan_id', a.full_name as 'karyawan_full_name',
            (SELECT COUNT(*) FROM (SELECT o.id FROM laundry.order o INNER JOIN (SELECT order_id, MAX(status_id) as status_id FROM order_status GROUP BY order_id) os ON os.order_id = o.id WHERE o.user_id = a.id AND (os.status_id >=1 AND os.status_id < 7) $where GROUP BY o.id) total_in_progress) as total_in_progress,
            (SELECT COUNT(*) FROM (SELECT o.id FROM laundry.order o INNER JOIN (SELECT order_id, MAX(status_id) as status_id FROM order_status GROUP BY order_id) os ON os.order_id = o.id WHERE o.user_id = a.id AND os.status_id = 7 $where GROUP BY o.id) total_in_done) as total_in_done,
            (SELECT COUNT(*) FROM (SELECT o.id FROM laundry.order o INNER JOIN (SELECT order_id, MAX(status_id) as status_id FROM order_status GROUP BY order_id) os ON os.order_id = o.id WHERE o.user_id = a.id AND os.status_id = 8 $where GROUP BY o.id) total_in_cancel) as total_in_cancel,
            (SELECT SUM(price_in_cancel.total_price) FROM (
                SELECT o.id, o.total_price FROM laundry.order o INNER JOIN (SELECT order_id, MAX(status_id) as status_id FROM order_status GROUP BY order_id) os ON os.order_id = o.id WHERE o.user_id = a.id AND os.status_id = 8 $where GROUP BY o.id
            ) price_in_cancel) as price_in_cancel,
            (SELECT SUM(price_in_progress.total_price) FROM (
                SELECT o.id, o.total_price FROM laundry.order o INNER JOIN (SELECT order_id, MAX(status_id) as status_id FROM order_status GROUP BY order_id) os ON os.order_id = o.id WHERE o.user_id = a.id AND (os.status_id >=1 AND os.status_id < 7) $where GROUP BY o.id
            ) price_in_progress) as price_in_progress,
            (SELECT SUM(price_in_done.total_price) FROM (
                SELECT o.id, o.total_price FROM laundry.order o INNER JOIN (SELECT order_id, MAX(status_id) as status_id FROM order_status GROUP BY order_id) os ON os.order_id = o.id WHERE o.user_id = a.id AND os.status_id = 7 $where GROUP BY o.id
            ) price_in_done) as price_in_done
            FROM laundry.account a
            WHERE a.status = 1 AND a.role_id = 2";
        return $this->db->query($query)->result();
    }

    public function indexPesananReport($type="harian", $start_date="", $end_date="") {
        $where_date = "";
        if($start_date != "") {
            $where_date .= " AND sqo.created_date >= '{$start_date}' ";
        }
        if($end_date != "") {
            $where_date .= " AND sqo.created_date <= '{$end_date}' ";
        }

        $formatted_date = "DATE_FORMAT(created_date, '%Y-%m-%d')";
        $where_formatted_date = "DATE_FORMAT(sqo.created_date, '%Y-%m-%d')";
        if($type == "bulanan") {
            $formatted_date = "DATE_FORMAT(created_date, '%Y-%m')";
            $where_formatted_date = "DATE_FORMAT(sqo.created_date, '%Y-%m')";
        } else if($type == "tahunan") {
            $formatted_date = "DATE_FORMAT(created_date, '%Y')";
            $where_formatted_date = "DATE_FORMAT(sqo.created_date, '%Y')";
        }

        $query = "SELECT formatted_date as tanggal,
            (SELECT COUNT(*) FROM laundry.order sqo
                INNER JOIN (SELECT order_id, MAX(status_id) as status_id FROM order_status GROUP BY order_id) os ON os.order_id = sqo.id WHERE $where_formatted_date = o.formatted_date AND (os.status_id >=1 AND os.status_id < 7)) total_in_progress,
            (SELECT COUNT(*) FROM laundry.order sqo
                INNER JOIN (SELECT order_id, MAX(status_id) as status_id FROM order_status GROUP BY order_id) os ON os.order_id = sqo.id WHERE $where_formatted_date = o.formatted_date AND (os.status_id = 7)) total_in_done,
            (SELECT COUNT(*) FROM laundry.order sqo
                INNER JOIN (SELECT order_id, MAX(status_id) as status_id FROM order_status GROUP BY order_id) os ON os.order_id = sqo.id WHERE $where_formatted_date = o.formatted_date AND (os.status_id = 8)) total_in_cancel,
            (SELECT SUM(sqo.total_price) FROM laundry.order sqo
                INNER JOIN (SELECT order_id, MAX(status_id) as status_id FROM order_status GROUP BY order_id) os ON os.order_id = sqo.id WHERE $where_formatted_date = o.formatted_date AND (os.status_id >=1 AND os.status_id < 7)) price_in_progress,
            (SELECT SUM(sqo.total_price) FROM laundry.order sqo
                INNER JOIN (SELECT order_id, MAX(status_id) as status_id FROM order_status GROUP BY order_id) os ON os.order_id = sqo.id WHERE $where_formatted_date = o.formatted_date AND (os.status_id = 7)) price_in_done,
            (SELECT SUM(sqo.total_price) FROM laundry.order sqo
                INNER JOIN (SELECT order_id, MAX(status_id) as status_id FROM order_status GROUP BY order_id) os ON os.order_id = sqo.id WHERE $where_formatted_date = o.formatted_date AND (os.status_id = 8)) price_in_cancel
            FROM (SELECT $formatted_date AS formatted_date FROM laundry.order sqo WHERE 1=1 $where_date GROUP BY formatted_date) o";
        return $this->db->query($query)->result();
    }
}

?>
