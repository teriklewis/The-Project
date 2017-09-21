<?php

class LoginModel extends CI_Model {

    public function login($email, $password) {
        $this->db->select('email', 'password'); 
        $this->db->from('logininfo');
        $this->db->where('email', $email); 
        $this->db->where('password', sha1($password)); 

        $query = $this->db->get(); 

        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }
    
    public function getLevel($email) {
        $query = $this->db->get('logininfo');
        $login = $query->result();
        foreach ($login as $l) {
            if ($l->email == $email) {
                //get the value of their level and store it in level
                $level = $l->level;
                return $level;
            }
        }
                
    }

}
