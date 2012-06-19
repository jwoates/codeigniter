<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Landing extends CI_Controller {

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {


        $user = $this->facebook->getUser();

        if ($user) {
            try {
                $data['user_profile'] = $this->facebook->api('/me');
            } catch (FacebookApiException $e) {
                $user = null;
            }
            $data['logout_url'] = $this->facebook->getLogoutUrl();
        }

        $this->load->view('landing',$data);
    }
}