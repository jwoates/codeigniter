<?php

	function dump($var=null)
	{
		if($var != null){
			echo '<pre>' . print_r($var,true) . '</pre>';
		}else{
			echo 'no variable set';
		}
	}