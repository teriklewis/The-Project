<?php

class LoginModel extends CI_Model {

    public function login($username, $password) {
        $this->db->select('username', 'password'); 
        $this->db->from('logininfo');
        $this->db->where('username', $username); 
        $this->db->where('password', $password); 

        $query = $this->db->get(); 

        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }
    
    public function getLevel($username) {
        $query = $this->db->get('logininfo');
        $login = $query->result();
        foreach ($login as $l) {
            if ($l->username == $username) {
                //get the value of their level and store it in level
                $level = $l->level;
                return $level;
            }
        }
                
    }

}
