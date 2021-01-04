<?php

class AccountModel extends CI_Model {
    private $table = "account";

    public function save($data) {
        return $this->db->insert($this->table, $data);
    }

    public function validUser($username, $password) {
        $query = $this->db->get_where('account',array('username'=>$username));
        if($query->num_rows() > 0)
        {
            $data = $query->row();
            if (password_verify($password, $data->password)) {
                $this->session->set_userdata('username', $username);
				$this->session->set_userdata('id', $data->id);
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
