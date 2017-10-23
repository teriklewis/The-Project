<?php

class api extends CI_Controller {

    public function members() {
        $this->load->model('HomeModel'); 
        $members = $this->HomeModel->getMembers();
        echo json_encode($members);
    
    }
    
    public function member($id = NULL) {
        $this->load->model('HomeModel'); 
        $member = $this->HomeModel->getMember($id);
        echo json_encode($member);
    }

    public function add(){

        $poop = false;
        //getting member info 
        if ($this->input->post('church') != NULL) { //Required
            $member['church'] = $this->input->post('church');
        } else {
            $poop = true;
        }
        if ($this->input->post('district') != NULL) { //Required
            $member['district'] = $this->input->post('district');
        } else {
            $poop = true;
        }
        if ($this->input->post('country') != NULL) { //Required
            $member['country'] = $this->input->post('country');
        } else {
            $poop = true;
        }
        if ($this->input->post('firstname') != NULL) { //Required
            $member['firstname'] = $this->input->post('firstname');
        } else {
            $poop = true;
        }
        if ($this->input->post('lastname') != NULL) { //Required
            $member['lastname'] = $this->input->post('lastname');
        } else {
            $poop = true;
        }
        if ($this->input->post('email') != NULL) { //Required
            $member['email'] = $this->input->post('email');
        } else {
            $poop = true;
        }
        if ($this->input->post('status') != NULL) {
            $member['status'] = $this->input->post('status');
        }
        if ($this->input->post('mail') != NULL) {
            $member['mail'] = $this->input->post('mail');
        }
        if ($this->input->post('homeno') != NULL) {
            $member['homeno'] = $this->input->post('homeno');
        }
        if ($this->input->post('cellno') != NULL) {
            $member['cellno'] = $this->input->post('cellno');
        }
        if ($this->input->post('employment') != NULL) { //Required
            $member['employment'] = $this->input->post('employment');
        } else {
            $poop = true;
        }
        if ($this->input->post('position') != NULL) {
            $member['position'] = $this->input->post('position');
        }
        if ($this->input->post('dob') != NULL) { //Required
            $member['dob'] = $this->input->post('dob');
        } else {
            $poop = true;
        }

        //getting login info 
        if ($this->input->post('email') != NULL) { //Required
            $login['email'] = $this->input->post('email');
        } else {
            $poop = true;
        }
        if ($this->input->post('password') != NULL) { //Required
            $login['password'] = sha1($this->input->post('password'));
        } else {
            $poop = true;
        }

        //adding the member info, skills and logininfo 

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
 
        $login['id'] = $skill['id'];  
        $this->HomeModel->addUser($login);
        
        if($poop == true) {
            echo "Required fields have been left empty.";
        }
    
    }

    public function update($id = NULL) {
        $m = false; 
        $l = false;
        if ($this->input->post('church') != NULL) { 
            $member['church'] = $this->input->post('church');
            $m = true; 
        } 
        if ($this->input->post('district') != NULL) {
            $member['district'] = $this->input->post('district');
            $m = true; 
        } 
        if ($this->input->post('country') != NULL) { 
            $member['country'] = $this->input->post('country');
            $m = true; 
        } 
        if ($this->input->post('firstname') != NULL) { 
            $member['firstname'] = $this->input->post('firstname');
            $m = true; 
        } 
        if ($this->input->post('lastname') != NULL) { 
            $member['lastname'] = $this->input->post('lastname');
            $m = true; 
        }
        if ($this->input->post('status') != NULL) {
            $member['status'] = $this->input->post('status');
            $m = true; 
        }
        if ($this->input->post('mail') != NULL) {
            $member['mail'] = $this->input->post('mail');
            $m = true; 
        }
        if ($this->input->post('email') != NULL) { 
            $member['email'] = $this->input->post('email');
            $m = true; 
        }
        if ($this->input->post('homeno') != NULL) {
            $member['homeno'] = $this->input->post('homeno');
            $m = true; 
        }
        if ($this->input->post('cellno') != NULL) {
            $member['cellno'] = $this->input->post('cellno');
            $m = true; 
        }
        if ($this->input->post('employment') != NULL) {
            $member['employment'] = $this->input->post('employment');
            $m = true; 
        }
        if ($this->input->post('position') != NULL) {
            $member['position'] = $this->input->post('position');
            $m = true; 
        }
        if ($this->input->post('dob') != NULL) { 
            $member['dob'] = $this->input->post('dob');
            $m = true; 
        }

        $this->load->model('HomeModel');
        if ($m == true) {
            $this->HomeModel->updateMember($member, $id);
        }
        
        if ($this->input->post('email') != NULL) { 
            $login['email'] = $this->input->post('email');
            $l = true; 
        }
        if ($this->input->post('password') != NULL) { 
            $login['password'] = sha1($this->input->post('password'));
            $l = true; 
        }

        if ($l == true) {
            $this->HomeModel->updateLogin($login, $id);
        }

    }

    public function addSkills($id = NULL) {
        //add skills to a specific member, ignoring possible duplicates

    }

    public function delete($id = NULL) {
        $this->load->model('HomeModel'); 
        $this->HomeModel->deleteMember($id);
    }
}