<?php
class User_model extends CI_Model
{
    public function get_user($username)
    {
        $query = $this->db->get_where('users', array('username' => $username));
        return $query->row();
    }

    public function verify_password($password, $hashed_password)
    {
        return password_verify($password, $hashed_password);
    }
}
?>
