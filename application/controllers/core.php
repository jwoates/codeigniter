<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Core extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        #$this->load->model('Facebook_model');
        header('P3P:CP="IDC DSP COR ADM DEVi TAIi PSA PSD IVAi IVDi CONi HIS OUR IND CNT"');
        $this->session->set_userdata('started', true);
        $this->load->library('user_agent');
    }
    function index()
    {
        # check if safari, start TLD redirect loop
        
        if($this->session->userdata('safari') != true && $this->agent->is_browser('Safari'))
        {
            if ($this->agent->is_browser('Safari'))
            {
                $this->load->view('redirect/index');
            }        
        }else{
            redirect('agegate');
        }
    }
    function tab()
    {
        if ( ! $this->agent->is_mobile())
        {
            $this->load->view('redirect/tab');

        }

    }
    function destroy()
    {
        $this->session->sess_destroy();
        redirect('core');
    }
}
