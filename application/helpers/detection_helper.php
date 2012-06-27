<?php
function loadview($data)
{
	$ci =& get_instance();
	if(detect() == true){
     $ci->load->view('layout/mobile', $data);
	}else{
    $ci->load->view('layout/general', $data);
	}

}
function detect()
{
  $ci =& get_instance();
  return $ci->agent->is_mobile();
}
function detectTest($data)
{
  var_dump($data);
}