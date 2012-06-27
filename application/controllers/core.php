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
    }
    function destroy()
    {
        $this->session->sess_destroy();
        redirect('core');
    }
}
