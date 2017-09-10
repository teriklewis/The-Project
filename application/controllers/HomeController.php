<?php

class HomeController extends CI_Controller {

    public function index() {
        
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data;
            
            $this->load->model('LoginModel');
          //  $data['name'] = $this->LoginModel->getName($data['id']);       
          $data['level'] = $this->LoginModel->getLevel($data['username']);
        } else {
            $data['level'] = 0;
        }
        $this->load->model('HomeModel');
        $data['members'] = $this->HomeModel->getMembers();
        $data['skills'] = $this->HomeModel->getSkills();
        $this->load->view('Home', $data);
    }

    public function Search() {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data;
            
            $this->load->model('LoginModel');
          //  $data['name'] = $this->LoginModel->getName($data['id']);       
          $data['level'] = $this->LoginModel->getLevel($data['username']);
        } else {
            $data['level'] = 0;
        }
        
        
        $search['filter'] = $this->input->post('filter');
        $search['value'] = $this->input->post('value');

        $this->load->model('HomeModel');
        $data['members'] = $this->HomeModel->Search($search);
        $data['skills'] = $this->HomeModel->getSkills();
        $this->load->view('Home', $data);
    }
    
    public function About() {
        $this->load->view('About');
    }

    
}
