<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //load model
        $this->load->model('Global_model', 'm_global');
        $this->load->model('Auth_model', 'm_auth');
        $this->load->model('Input_model', 'm_input');
        $this->load->model('Data_model', 'm_data');

        date_default_timezone_set("Asia/Jakarta");
    }

}
