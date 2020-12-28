<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Dashboard
 * @author IMAM SYAIFULLOH
 */
class Customer_model extends CI_Model
{
    public function __construct()
    {
     parent::__construct();
    }

    function getData($table)		
    {
    	return $this->db->get($table);
    }
}
?>