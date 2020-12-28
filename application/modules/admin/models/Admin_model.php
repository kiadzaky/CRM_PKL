<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Dashboard
 * @author IMAM SYAIFULLOH
 */
class Admin_model extends CI_Model
{
    public function __construct()
    {
     parent::__construct();
    }

    function getData($table, $where ='', $limit='', $offset= '')
    {
        if($where <> ''){
            return $this->db->get_where($table, $where, $limit, $offset);
        }
        else{
           return $this->db->get($table); 
        }
    	
    }

    function getWhere($table, $where)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);
        return $this->db->get();
    }

    public function getQuery($query)
    {
    	$q = $this->db->query($query);
    	return $q;
    }
}
?>