<?php

class ProfileController extends CI_Controller {

    public function index() {
        
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data;
            
            $this->load->model('LoginModel');      
          $data['level'] = $this->LoginModel->getLevel($data['username']);
        } else {
            redirect('HomeController');
        }

        $this->load->model('HomeModel');
        
        $data['id'] = $this->HomeModel->getID($data['username']);
        $data['profile'] = $this->HomeModel->getProfile($data['id']);
        $data['skills'] = $this->HomeModel->getSkill($data['id']);
        $this->load->view('Profile', $data);
    }



    
}
