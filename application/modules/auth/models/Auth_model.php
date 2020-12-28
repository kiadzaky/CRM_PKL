<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Dashboard
 * @author IMAM SYAIFULLOH
 */
class Auth_model extends CI_Model
{
    public function __construct()
    {
     parent::__construct();
    }

    function login($username)
    {
        return $this->db->get_where('akun', array('akun' => $username));

    }
}
?>