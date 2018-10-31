<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class LmeManage extends Admin_Controller {
	
	function __construct()
	{
		parent::__construct();
	}

	function index()
    {
		$this->view('index', array('require_js'=>true, 'data_list'=>$data_list??array()));
	}

	function add()
    {
        if ($this->input->is_ajax_request())
        {

        } else {
            $this->view('add', array('require_js'=>true));
        }
    }
}