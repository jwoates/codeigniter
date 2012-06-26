<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agegate extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->driver('cache', array('adapter' => 'file', 'backup' => 'file'));
        $this->load->helper('form');
    }

    function index()
    {
        $data['message'] = null;
        if($this->session->userdata('user_age') == 'approved')
        {
            redirect('landing');
            exit;
        }

        if($this->session->userdata('user_age') == 'denied')
        {
            redirect('restricted/age');
            exit;
        }

        $this->load->view('agegate', $data);
    }
  
    function authenticate()
    {   
        $this->load->helper('birthday_helper');

        $data = array();
        
        $data['message'] = null;

        $day    = ($_POST['day'] != 'DD')     ? $_POST['day']     : 1;
        $month  = ($_POST['month'] != 'MM')   ? $_POST['month']   : 1;
        $year   = ($_POST['year'] != 'YYYY')    ? $_POST['year']    : 2012;
        $age = birthday("$day/$month/$year");
        
        if ($age < 18){
            $this->session->set_userdata('user_age', 'denied');
            redirect('core');
            
        }else{
            $this->session->set_userdata('user_age', 'approved');
            redirect('landing');
        }
        $this->load->view('agegate', $data);
    }
}