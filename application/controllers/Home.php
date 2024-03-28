<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['home_banner'] = $this->m_data->getHomeBanner();
		$this->m_global->getView('page/home/index', $data);
	}
	public function events($slug = null)
	{
		if ($slug) {
			$this->m_global->getView('page/event/detail');
		} else {
			$data['jadwal'] = $this->m_data->getJadwalThisMonth(date('m'));
			$this->m_global->getView('page/event/index', $data);
		}
	}
	public function event_calendar()
	{
		$this->m_global->getView('page/event/calendar');
	}
}
