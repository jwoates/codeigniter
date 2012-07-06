<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Core extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        #$this->load->model('Facebook_model');
        header('P3P:CP="IDC DSP COR ADM DEVi TAIi PSA PSD IVAi IVDi CONi HIS OUR IND CNT"');
        $this->session->set_userdata('started', true);
    }
    function index()
    {
        # check if safari, start TLD redirect loop
        if($this->session->userdata('safari') != true)
        {
            if ($this->agent->is_browser('Chrome'))
            {
                $this->load->view('redirect/index');
            }        
        }else{
            redirect('agegate');
        }
        /*
        $fb_data = $this->session->userdata('fb_data'); // This array contains all the user FB information
        if((!$fb_data['uid']) or (!$fb_data['me']))
        {
            $data['fb_data'] = $fb_data;
            $data['yield'] = $this->load->view('facebook/core',$data, TRUE);
            if($this->agent->is_mobile() == true)
            {
                $this->load->view('layout/mobile', $data);
            }else{
                $this->load->view('layout/general', $data);
            }
        }else{
            $data['fb_data'] = $fb_data;
            if($this->session->userdata('user_age') == 'denied')
            {
                redirect('restricted/age');
                exit;
            }            
            redirect('agegate');
        }
        */
    }
    function destroy()
    {
        $this->session->sess_destroy();
        redirect('core');
    }
}
