<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['jadwal'] = $this->m_data->getJadwalThisMonth(date('m'));
		$this->m_global->getView('page/event/index', $data);
	}
}
