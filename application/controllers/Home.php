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
		$this->m_global->getView('page/home/index', $data);
	}
	public function events($slug = null)
	{
		$data = $this->_headData('event');
		if ($slug) {
			$this->m_global->getView('page/event/detail', $data);
		} else {
			$this->m_global->getView('page/event/index', $data);
		}
	}
	public function event_calendar()
	{
		$data = $this->_headData('event');
		$this->m_global->getView('page/event/calendar', $data);
	}
}
