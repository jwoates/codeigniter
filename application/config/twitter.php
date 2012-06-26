<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if($_SERVER['HTTP_HOST'] == '10.1.10.249')
{
  /* local
  */

}else{
  /* azure
  */
  
}

/* constants */
$config['tw_feed_url']    = 'http://rhapi.com/twitter/search/kinect?type=json&limit=10';
$config['tw_feed_lang']   = 'en';
