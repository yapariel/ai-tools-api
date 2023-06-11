<?php

namespace App\Controllers;
class Login extends CI_Controller
{
    
    public function index()
    {
        $this->load->model('User_model');

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->User_model->get_user($username);

        if ($user && $this->User_model->verify_password($password, $user->password)) {
            $this->session->set_userdata('user_id', $user->id);
            redirect('dashboard');
        } else {
            $data['error_message'] = 'Invalid username or password.';
            $this->load->view('login', $data);
        }
    }
}
?>
