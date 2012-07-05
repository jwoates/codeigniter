<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

# Add application to page link
# set with live app settings (app id and redirect)
# http://www.facebook.com/dialog/pagetab?app_id=329330017143635&next=https://sdcc.azurewebsites.net/


/* jackson */
if($_SERVER['HTTP_HOST'] == '10.1.10.249')
{
  $config['appId']                = '151259104968742';
  $config['secret']               = '2e783d93aefa6581e923a62c6054abac';
  $config['facebook_app_url']     = 'https://apps.facebook.com/rh-jackson/';
}

/* vadim */
elseif($_SERVER['HTTP_HOST'] == 'http://10.1.10.193/')
{
  $config['appId']                = '291750807589264';
  $config['secret']               = '88eee99cc3c945d7453611a5520cc210';
  $config['facebook_app_url']     = 'https://apps.facebook.com/rh_vadim/';
}

/* azure*/
else
{
  $config['appId']                = '329330017143635';
  $config['secret']               = '4a3cae68535777a6793df72ab18c7904';
  $config['facebook_app_url']     = 'https://apps.facebook.com/xbox-sdcc/';
  
}

/* constants */
$config['facebook_album_id']    = '226149420814213';
$config['facebook_app_scope']   = '';
$config['facebook_landing']     = 'core';