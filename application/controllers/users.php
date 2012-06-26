<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('Facebook_model');
        $this->load->helper('dump_helper');
        $this->load->spark('php-activerecord/0.0.2');
    }

    function index()
    {
        echo '<pre>'; var_dump(User::all()); exit;
        
    }
    function create()
    {
        $user = User::create(array(
            'name_first' => 'maury',
            'name_last' => 'povitch',
            'email' => 'mv@example.com'
            )
        );
    }
    function update($key, $value)
    {
        dump($key, $value);
        exit;
        $user = User::find_by_name_first($key);
        $user->name_first = $value;
        $user->save();
    }
}
