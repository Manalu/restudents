<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Common extends CI_Model {
    
    public function get_data($table){
        $query= $this->db->get($table);
        if ( $this->db->affected_rows() > 0 ) {
            return $query;
        } else {
            return FALSE;
        }
    }


    public function get_restuent(){
        $this->db->order_by("open", "desc");
        $this->db->order_by('bestMatch', 'desc');

        $query = $this->db->get('resturents');
        if ( $this->db->affected_rows() > 0 ) {
            return $query;
        } else {
            return FALSE;
        }
    }

    public function sort_restudent($orderCol,$value){
        $this->db->order_by($orderCol,$value);
        $query = $this->db->get('resturents');
        if ( $this->db->affected_rows() > 0 ) {
            return $query;
        } else {
            return FALSE;
        }
    }

    public function searchRestudents($restudentName){
        $this->db->like('name', $restudentName, "both");
        $this->db->order_by('bestMatch', 'desc');
        $query = $this->db->get('resturents');
        if ( $this->db->affected_rows() > 0 ) {
            return $query;
        } else {
            return FALSE;
        }
    }

    
    

}


