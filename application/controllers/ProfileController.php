<?php

class ProfileController extends CI_Controller {

    public function index() {
        
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['email'] = $session_data;
            
            $this->load->model('LoginModel');      
          $data['level'] = $this->LoginModel->getLevel($data['email']);
        } else {
            redirect('HomeController');
        }

        $this->load->model('HomeModel');
        
        $data['id'] = $this->HomeModel->getID($data['email']);
        $data['profile'] = $this->HomeModel->getProfile($data['id']);
        $data['skills'] = $this->HomeModel->getSkill($data['id']);
        $this->load->view('Profile', $data);
    }



    
}
