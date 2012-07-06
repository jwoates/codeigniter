<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class safaripass extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        header('P3P:CP="IDC DSP COR ADM DEVi TAIi PSA PSD IVAi IVDi CONi HIS OUR IND CNT"');
    }

    function index()
    {

        $this->session->set_userdata('safari', true);
        $this->load->view('redirect/backtoapp');
    }
  
}