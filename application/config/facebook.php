<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if($_SERVER['HTTP_HOST'] == '10.1.10.249')
{
  /* local
  */
  $config['appId']                = '151259104968742';
  $config['secret']               = '2e783d93aefa6581e923a62c6054abac';
  $config['facebook_app_url']     = 'https://apps.facebook.com/rh-jackson/';
  $config['frame_url']            = 'https://allibubba.azurewebsites.net';

}else{
  /* azure
  */
  $config['appId']                = '329330017143635';
  $config['secret']               = '4a3cae68535777a6793df72ab18c7904';
  $config['facebook_app_url']     = 'http://apps.facebook.com/azure-app/';
  $config['frame_url']            = 'http://10.1.10.249';
  
}

/* constants */
$config['facebook_album_id']    = '226149420814213';
$config['facebook_app_scope']   = 'email,photo_upload,user_photos,read_stream';
$config['facebook_landing']     = 'landing';