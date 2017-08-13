<?php

class LoginController extends CI_Controller {

    public function index() {
        $this->load->view('Login');
    }

    public function checkLogin() {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|callback_verifyUser');
        if ($this->form_validation->run() == false) {
            $this->load->view('Login');
        } else {
            redirect('HomeController');
        }
    }

    public function verifyUser() {
        //assign the password from the form to $pass
        $password = $this->input->post('password');
        //assign the username from the form to $name
        $username = $this->input->post('username');
        //loading the Login Model
        $this->load->model('LoginModel');

        //if this returns true from the Model, the user exists in the database
        if ($this->LoginModel->login($username, $password)) {
            //set session
            $this->session->set_userdata('logged_in', $username);
            //give control back to the checkLogin function, in the else brackets where validation will be true
            return true;
        } else {
            //send a message to user, if the username or password dont match any row in the database
            $this->form_validation->set_message('verifyUser', 'Incorrect Username or Password. Please try again.');
            return false;
        }
    }
    
    public function logout() {
        if ($this->session->userdata('logged_in')) { //if logged in 
            $this->session->unset_userdata('logged_in'); // remove the login data, so nobody is logged in 
        session_destroy(); 
        redirect('HomeController');
        }else { // else go home
            redirect('HomeController');
        }
    }

}
