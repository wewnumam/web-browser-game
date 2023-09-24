<?php

class Record extends CI_Controller {
    public function __construct() {
        parent::__construct();
		$this->load->database();
		$this->load->model('Record_model');
    }

	public function index()
	{
        if ($_POST != null) {
            $this->Record_model->addRecord($_POST);
		}
	}
}
