<?php

class SignupController extends CI_Controller {

    public function index() {
        $this->load->view('Signup');
    }

    public function Signup() {
        $this->form_validation->set_rules('firstname', 'First Name', 'required');
        $this->form_validation->set_rules('lastname', 'Last Name', 'required');
        $this->form_validation->set_rules('employment', 'Employment Status', 'required');
        $this->form_validation->set_rules('dob', 'Date of Birth', 'required');
        $this->form_validation->set_rules('email', 'E-mail', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('church', 'Church', 'required');
        $this->form_validation->set_rules('district', 'District', 'required');
        $this->form_validation->set_rules('country', 'Country', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('Signup');
        } else {

            //member 
            $member['church'] = $this->input->post('church');
            $member['district'] = $this->input->post('district');
            $member['country'] = $this->input->post('country');
            $member['firstname'] = $this->input->post('firstname');
            $member['lastname'] = $this->input->post('lastname');
            
            if ($this->input->post('mail') != NULL) {
                $member['mail'] = $this->input->post('mail');
            }
            
            
            if ($this->input->post('homeno') != NULL) {
                $member['homeno'] = $this->input->post('homeno');
            }
            
            if ($this->input->post('cellno') != NULL) {
                $member['cellno'] = $this->input->post('cellno');
            }
            
            $member['employment'] = $this->input->post('employment');
            $member['dob'] = $this->input->post('dob');
            $member['email'] = $this->input->post('email');
       
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
            
            $login['email'] = $this->input->post('email');
            $login['password'] = sha1($this->input->post('password'));
            $login['id'] = $skill['id'];
            
            $this->HomeModel->addUser($login);
            
            redirect('HomeController');
        }
    }

}
