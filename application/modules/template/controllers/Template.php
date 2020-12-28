<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Dashboard
 * @author IMAM SYAIFULLOH
 */
class Template extends MX_Controller
{
    public function __construct()
    {
     parent::__construct();
    }

    public function index($data=NULL,$page = NULL)
    {
     
     $this->load->view('v_header',$data); 
     $this->load->view('v_sidebar',$data);    
     $this->load->view('v_topbar',$data);    
     $this->load->view('v_content',$data);

     $this->load->view('v_footer',$data);

    }
}
?>