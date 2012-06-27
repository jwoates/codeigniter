<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mobile extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->config('twitter');
        $this->load->library('zend');
        $this->load->driver('cache', array('adapter' => 'file', 'backup' => 'file'));
        $this->load->model('Facebook_model');
    }

    function index()
    {

    }
    function twitter()
    {
        
        # no sneaking in
        if($this->session->userdata('user_age') == 'denied')
        {
            redirect('restricted/age');
            exit;
        }

        /* have you authenticated? */
        $data['fb_data'] = $fb_data = $this->session->userdata('fb_data'); // This array contains all the user FB information;
        
        if((!$fb_data['uid']) or (!$fb_data['me']))
        {
            redirect('core');
        }
        $data['twitter_approved_feed']      = $this->getApprovedTwitterFeed();

        $data['yield'] = $this->load->view('mobile/twitter',$data, TRUE);
        if($this->agent->is_mobile() == true)
        {
            $this->load->view('layout/mobile', $data);
        }else{
            $this->load->view('layout/general', $data);
        }
    }
  

    
    private function getApprovedTwitterFeed($url=null)
    {
        if ( ! $get_approved_twitter = $this->cache->get('get_approved_twitter'))
        {
            $get_approved_twitter = file_get_contents('http://feeds.tidytweet.com/client/sdcc/feed/roundhousedemo/legacy.atom');
        }
        $this->cache->save('get_approved_twitter', $get_approved_twitter, 600);
        return simplexml_load_string($get_approved_twitter); 

    }

    
}