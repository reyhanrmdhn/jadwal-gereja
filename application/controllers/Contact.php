<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = $this->_headData('contact');
        $this->m_global->getView('page/contact/index', $data);
    }
}