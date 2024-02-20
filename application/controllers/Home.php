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
			// Input data
			$month = date('n'); // Current month
			$year = date('Y'); // Current year

			$days = ['Thursday' => 1, 'Friday' => 1, 'Saturday' => 1, 'Sunday' => 2];

			$services = [
				'Thursday' => [
					1 => [
						'Khotbah' => 1,
						'Pembawa Acara' => 1,
						'Pemain Musik' => 2,
						'Kantong Kolekte' => 0,
						'Mentor' => 0,
						'Singer' => 0,
						'Penari Thamborin' => 0,
						'Pembaca Nabuatan' => 0,
						'Operator Slide' => 0,
					],
				],
				'Friday' => [
					1 => [
						'Khotbah' => 1,
						'Pembawa Acara' => 1,
						'Pemain Musik' => 2,
						'Kantong Kolekte' => 1,
						'Mentor' => 1,
						'Singer' => 2,
						'Penari Thamborin' => 1,
						'Pembaca Nabuatan' => 1,
						'Operator Slide' => 1,
					],
				],
				'Saturday' => [
					1 => [
						'Khotbah' => 1,
						'Pembawa Acara' => 1,
						'Pemain Musik' => 2,
						'Kantong Kolekte' => 1,
						'Mentor' => 1,
						'Singer' => 2,
						'Penari Thamborin' => 1,
						'Pembaca Nabuatan' => 1,
						'Operator Slide' => 1,
					],
				],
				'Sunday' => [
					1 => [
						'Khotbah' => 1,
						'Pembawa Acara' => 1,
						'Pemain Musik' => 2,
						'Kantong Kolekte' => 1,
						'Mentor' => 1,
						'Singer' => 2,
						'Penari Thamborin' => 1,
						'Pembaca Nabuatan' => 1,
						'Operator Slide' => 1,
					],
					2 => [
						'Khotbah' => 1,
						'Pembawa Acara' => 1,
						'Pemain Musik' => 2,
						'Kantong Kolekte' => 1,
						'Mentor' => 1,
						'Singer' => 2,
						'Penari Thamborin' => 1,
						'Pembaca Nabuatan' => 1,
						'Operator Slide' => 1,
					],
				],
			];

			$participants = [
				'Khotbah' => ['Pdt. A', 'Pdt. B', 'Pdt. C'],
				'Pembawa Acara' => ['Host 1', 'Host 2', 'Host 3'],
				'Pemain Musik' => ['Musician 1', 'Musician 2', 'Musician 3', 'Musician 4'],
				'Kantong Kolekte' => ['Usher 1', 'Usher 2', 'Usher 3'],
				'Mentor' => ['Mentor 1', 'Mentor 2', 'Mentor 3'],
				'Singer' => ['Singer 1', 'Singer 2', 'Singer 3', 'Singer 4'],
				'Penari Thamborin' => ['Dancer 1', 'Dancer 2', 'Dancer 3'],
				'Pembaca Nabuatan' => ['Reader 1', 'Reader 2', 'Reader 3'],
				'Operator Slide' => ['Operator 1', 'Operator 2', 'Operator 3'],
			];

			// Generate Schedule
			$data['jadwal'] = generateFullMonthSchedule($services, $days, $participants, $month, $year);
			// echo '<pre>';
			// var_dump($data['jadwal']);
			// echo '</pre>';

			$this->m_global->getView('page/event/index', $data);
		}
	}
	public function event_calendar()
	{
		$data = $this->_headData('event');
		$this->m_global->getView('page/event/calendar', $data);
	}
}
