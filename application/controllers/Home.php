<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct() {
        parent::__construct();
		$this->load->database();
		$this->load->model('Record_model');
    }

	public function index()
	{
		$leaderboard = $this->Record_model->getRecord();
		$this->load->view('home/index', ['leaderboard' => $leaderboard]);
	}
}
