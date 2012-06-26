<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Restricted extends CI_Controller {

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        echo "you cannot access this application";
    }
    function age()
    {
        echo "you are too young";
    }
}
