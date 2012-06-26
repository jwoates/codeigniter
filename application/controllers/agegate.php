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
        print_r($this->session->all_userdata());

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
        $data = array();
        
        $data['message'] = null;

        $age = (isset($_POST['age']) ? $_POST['age'] : 100);

        if ($age < 50){
            
            $this->session->set_userdata('user_age', 'denied');
            $data['message'] = 'too young';
        }else{
            $this->session->set_userdata('user_age', 'approved');
            redirect('landing');
        }
        $this->load->view('agegate', $data);
    }
}