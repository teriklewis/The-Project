<?php

class SignupController extends CI_Controller {

    public function index() {
        $this->load->view('Signup');
    }

    public function Signup() {
        $this->form_validation->set_rules('firstname', 'First Name', 'required');
        $this->form_validation->set_rules('lastname', 'Last Name', 'required');
        $this->form_validation->set_rules('status', 'Church Status', 'required');
        $this->form_validation->set_rules('employment', 'Employment Status', 'required');
        $this->form_validation->set_rules('position', 'Position in Church', 'required');
        $this->form_validation->set_rules('dob', 'Date of Birth', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('Signup');
        } else {

            //member 
            $member['firstname'] = $this->input->post('firstname');
            $member['lastname'] = $this->input->post('lastname');
            $member['status'] = $this->input->post('status');
            
            if ($this->input->post('mail') != NULL) {
                $member['mail'] = $this->input->post('mail');
            }
            
            if ($this->input->post('email') != NULL) {
                $member['email'] = $this->input->post('email');
            }
            
            if ($this->input->post('homeno') != NULL) {
                $member['homeno'] = $this->input->post('homeno');
            }
            
            if ($this->input->post('cellno') != NULL) {
                $member['cellno'] = $this->input->post('cellno');
            }
            
            $member['employment'] = $this->input->post('employment');
            $member['position'] = $this->input->post('position');
            $member['dob'] = $this->input->post('dob');
            
       
            $this->load->model('HomeModel'); 
            $skill['id'] = $this->HomeModel->addMember($member);
            
            if ($this->input->post('skill1') != NULL) {
                $skill['skill'] = $this->input->post('skill1');
                $this->HomeModel->addSkill($skill);
            }
            
            if ($this->input->post('skill2') != NULL) {
                $skill['skill'] = $this->input->post('skill2');
                $this->HomeModel->addSkill($skill);
            }
            
            if ($this->input->post('skill3') != NULL) {
                $skill['skill'] = $this->input->post('skill3');
                $this->HomeModel->addSkill($skill);
            }
            
            $login['username'] = $this->input->post('username');
            $login['password'] = $this->input->post('password');
            $login['id'] = $skill['id'];
            
            $this->HomeModel->addUser($login);
            
            redirect('HomeController');
        }
    }

}
