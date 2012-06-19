<?php
class Facebook_model extends CI_Model {
 
    public function __construct()
    {
        parent::__construct();
        /*
        $config = array(
                        'appId'  => '151259104968742',
                        'secret' => '2e783d93aefa6581e923a62c6054abac',
                        'fileUpload' => true, // Indicates if the CURL based @ syntax for file uploads is enabled.
                        );
 
        $this->load->library('Facebook', $config);
        */
        $this->load->library('Facebook');
 
        $user = $this->facebook->getUser();
 
        // We may or may not have this data based on whether the user is logged in.
        //
        // If we have a $user id here, it means we know the user is logged into
        // Facebook, but we don't know if the access token is valid. An access
        // token is invalid if the user logged out of Facebook.
        $profile = null;
        if($user)
        {
            try {
                // Proceed knowing you have a logged in user who's authenticated.
                $profile = $this->facebook->api('/me?fields=id,name,link,email');
            } catch (FacebookApiException $e) {
                error_log($e);
                $user = null;
            }
        }
 
        $fb_data = array(
                        'me' => $profile,
                        'uid' => $user,
                        'loginUrl' => $this->facebook->getLoginUrl(
                            array(
                                'scope'         => $this->config->item('facebook_app_scope'),
                                'redirect_uri'  => $this->config->item('facebook_app_url') . $this->config->item('facebook_landing')
                            )
                        ),
                        'logoutUrl' => $this->facebook->getLogoutUrl(),
                    );
 
        $this->session->set_userdata('fb_data', $fb_data);
}