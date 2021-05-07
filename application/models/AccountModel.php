<?php

class AccountModel extends CI_Model {
    private $table = "account";

    public function save($data) {
        return $this->db->insert($this->table, $data);
    }

    public function update($data, $id) {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    public function detail($id) {
        $query = "SELECT * FROM $this->table WHERE id = $id LIMIT 1";
        return $this->db->query($query)->row();
    }

    public function delete($id) {
        $query = "UPDATE $this->table SET role_id = 0 WHERE id = $id";
        return $this->db->query($query);
    }

    public function getKaryawan() {
        $query = "SELECT * FROM $this->table WHERE role_id = 2";
        return $this->db->query($query)->result();
    }

    public function enableAccount($account_id) {
        $query = "UPDATE $this->table SET status = 1 WHERE id = $account_id";
        return $this->db->query($query);
    }

    public function disableAccount($account_id) {
        $query = "UPDATE $this->table SET status = 0 WHERE id = $account_id";
        return $this->db->query($query);
    }

    public function validUser($username, $password) {
        $query = $this->db->get_where($this->table,array('username'=>$username, 'status' => 1));
        if($query->num_rows() > 0)
        {
            $data = $query->row();
            if (password_verify($password, $data->password)) {
                $this->session->set_userdata('login_username', $username);
				$this->session->set_userdata('login_id', $data->id);
				$this->session->set_userdata('is_login', TRUE);
                $this->session->set_userdata('login_role', $data->role_id);
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

    public function uploadProfileImage($user_id) {
        $config['upload_path']          = './uploads/users/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $user_id;
        $config['overwrite']			= true;
        $config['max_size']             = 1024; // 1MB

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('image')) {
            return $this->upload->data("file_name");
        }

        return "default.jpg";
    }
}

?>
