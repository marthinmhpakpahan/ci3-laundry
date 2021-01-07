<?php

class AccountModel extends CI_Model {
    private $table = "account";

    public function save($data) {
        return $this->db->insert($this->table, $data);
    }

    public function getKaryawan() {
        $query = "SELECT * FROM laundry.account WHERE role_id = 2";
        return $this->db->query($query)->result();
    }

    public function enableAccount($account_id) {
        $query = "UPDATE laundry.account SET status = 1 WHERE id = $account_id";
        return $this->db->query($query);
    }

    public function disableAccount($account_id) {
        $query = "UPDATE laundry.account SET status = 0 WHERE id = $account_id";
        return $this->db->query($query);
    }

    public function validUser($username, $password) {
        $query = $this->db->get_where('account',array('username'=>$username, 'status' => 1));
        if($query->num_rows() > 0)
        {
            $data = $query->row();
            if (password_verify($password, $data->password)) {
                $this->session->set_userdata('login_username', $username);
				$this->session->set_userdata('login_id', $data->id);
				$this->session->set_userdata('is_login', TRUE);
                return TRUE;
            } else {
                return FALSE;
            }
        }
        else
        {
            return FALSE;
        }
    }
}

?>
