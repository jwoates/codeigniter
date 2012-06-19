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
            redirect('login');
        }
        else
        {
            $data = array(
                    'fb_data' => $fb_data,
                    );
 
            $this->load->view('core', $data);
        }
    }
}




/*
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
                'redirect_uri' => $this->config->item('facebook_app_url') . $this->config->item('facebook_landing'),
                'scope' => $this->config->item('facebook_app_scope')
              )
            );
        }

        $this->load->view('core',$data);
    }
}
*/