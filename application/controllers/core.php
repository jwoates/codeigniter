<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Core extends CI_Controller {

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {

        # FB library is autoloaded, as well as FB config

        $user = $this->facebook->getUser();
        if ($user) {
            try {
                $data['user_profile'] = $this->facebook->api('/me');
            } catch (FacebookApiException $e) {
                $user = null;
            }
        }

        if ($user) {
            $data['logout_url'] = $this->facebook->getLogoutUrl();
        } else {
            $data['login_url'] = $this->facebook->getLoginUrl(
              $params = array(
                'redirect_uri' => $this->config->item('facebook_app_url'),
                'scope' => $this->config->item('facebook_app_scope')
              )
            );
        }

        $this->load->view('core',$data);
    }
}

