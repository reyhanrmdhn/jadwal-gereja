<?php
defined('BASEPATH') or exit('No direct script access allowed');
class My404 extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = '404 - Not Found';
        $data['metadesc'] = '404 Not Found';
        $data['metakeyword'] = '404';

        $this->output->set_status_header('404');
        $this->load->view('errors/error_404', $data);
    }
}
