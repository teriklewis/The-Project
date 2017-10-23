<?php

class HomeModel extends CI_Model {

    public function getMembers() {
        $this->db->from('members');
        $this->db->order_by("lastname", "asc");
        $query = $this->db->get();
        return $query->result();
    }

    public function getMember($id) {
        $this->db->select('*');
        $this->db->from('members');
        $this->db->where('id', $id);
        $query = $this->db->get();

        return $query->result();
    }

    public function deleteMember($id) {
        $this->db->where('id', $id);
        $member = $this->db->count_all_results('members');
        if($member == 0) {
            echo "Id does not exist.";
        } else {
            $this->db->where('id', $id);
            $this->db->from('members');
            $this->db->delete();
            
            $this->db->where('id', $id);
            $this->db->from('skills');
            $this->db->delete();

            $this->db->where('id', $id);
            $this->db->from('logininfo');
            $this->db->delete();
            echo " Member Deleted";
        }
        
    }

    public function getSkills() {
        $query = $this->db->get('skills');
        return $query->result();
    }

    public function addMember($member) {

        $member['id'] = 1;
        $this->db->select('id');
        $this->db->from('members');
        $this->db->where('id', $member['id']);
        $query = $this->db->get();
        while ($query->num_rows() > 0) {
            $member['id'] = $member['id'] + 1;
            $this->db->select('id');
            $this->db->from('members');
            $this->db->where('id', $member['id']);
            $query = $this->db->get();
        }

        $this->db->set($member);
        $this->db->insert('members');

        return $member['id'];
    }

    public function addSkill($skill) { //check for duplicate skills, they should have the same id 
        $skill['skillid'] = 1;
        $this->db->select('skillid');
        $this->db->from('skills');
        $this->db->where('skillid', $skill['skillid']);
        $query = $this->db->get();
        while ($query->num_rows() > 0) {
            $skill['skillid'] = $skill['skillid'] + 1;
            $this->db->select('skillid');
            $this->db->from('skills');
            $this->db->where('skillid', $skill['skillid']);
            $query = $this->db->get();
        }

        $this->db->set($skill);
        $this->db->insert('skills');
    }

    public function addUser($login) {
        $this->db->set($login);
        $this->db->insert('logininfo');
        echo '<script>alert("Member Added!");</script>';
    }

    public function Search($search) {
        if ($search['filter'] == "skill") {
            $this->db->select('*');
            $this->db->from('members');
            $this->db->join('skills', 'skills.id = members.id');
            $this->db->where('skills.skill', $search['value']);
            $query = $this->db->get();
        } elseif ($search['filter'] == "firstname") {
            $this->db->from('members');
            $this->db->where('firstname', $search['value']);
            $query = $this->db->get(); 
        } elseif ($search['filter'] == "lastname") {
            $this->db->from('members');
            $this->db->where('lastname', $search['value']);
            $query = $this->db->get();
        } elseif ($search['filter'] == "position") {
            $this->db->from('members');
            $this->db->where('position', $search['value']);
            $query = $this->db->get();
        }

        return $query->result();
    }

    public function getID($email) {
        $query = $this->db->get('logininfo');
        $login = $query->result();
        foreach ($login as $l) {
            if ($l->email == $email) {
                //get the value of their level and store it in level
                $id = $l->id;
                return $id;
            }
        }
    }

    public function getProfile($id) {
        $this->db->select('*');
        $this->db->from('members');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function getSkill($id) {
        $this->db->select('*');
        $this->db->from('skills');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function updateMember($member, $id) {
        $this->db->where('id', $id);
        $this->db->update('members', $member);
        echo "Member Updated";
    }
    
    public function updateLogin($login, $id) {
        $this->db->where('id', $id);  
        $this->db->update('logininfo', $login);
        echo "Login info Updated";
    }
}
