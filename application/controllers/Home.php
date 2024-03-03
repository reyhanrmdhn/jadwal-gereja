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
		$data = $this->_headData('home');
		$data['home_banner'] = $this->m_data->getHomeBanner();
		$data['home_gallery'] = $this->m_data->getHomeGallery();
		$data['home_quotes'] = $this->m_data->getHomeQuotes();
		$data['articles'] = $this->m_data->getLatestArticles();
		$this->m_global->getView('page/home/index', $data);
	}
	public function events($slug = null)
	{
		$data = $this->_headData('event');
		if ($slug) {
			$this->m_global->getView('page/event/detail', $data);
		} else {
			$data['jadwal'] = $this->m_data->getJadwalThisMonth(date('m'));
			$this->m_global->getView('page/event/index', $data);
		}
	}
	public function event_calendar()
	{
		$data = $this->_headData('event');
		$this->m_global->getView('page/event/calendar', $data);
	}
}
