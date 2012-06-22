<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Core extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('Facebook_model');
    }

function index()
    {
        $fb_data = $this->session->userdata('fb_data'); // This array contains all the user FB information
 
        if((!$fb_data['uid']) or (!$fb_data['me']))
        {
            // If this is a protected section that needs user authentication
            // you can redirect the user somewhere else
            // or take any other action you need
            #redirect('login');
            $data['fb_data'] = $fb_data;
        }
        else
        {
            $data['fb_data'] = $fb_data;
        }
        $this->load->view('core', $data);
    }
}
