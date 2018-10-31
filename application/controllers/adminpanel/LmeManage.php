<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class LmeManage extends Admin_Controller {
	
	function __construct()
	{
		parent::__construct();
        $this->load->model(array('Lme_manage_model'));
	}

	function index($page_no=1)
    {
        $page_no = max(intval($page_no),1);

        $where_arr = array();
        $where = implode(" and ", $where_arr);
        $orderby = 'date DESC';
        $data_list = $this->Lme_manage_model->listinfo($where, '*', $orderby, $page_no, $this->Lme_manage_model->page_size,'',$this->Member_model->page_size,page_list_url('adminpanel/lmeManage/index',true));

		$this->view('index', array('require_js'=>true, 'data_list'=>$data_list??array()));
	}

	function add()
    {
        if ($this->input->is_ajax_request()) {
            $_POST['create_time'] = NOW_DATE;
            $res = $this->Lme_manage_model->insert($_POST);
            if ($res) {
                exit(json_encode(array('status'=>true,'tips'=>'添加成功')));
            } else {
                exit(json_encode(array('status'=>false,'tips'=>'添加失败')));
            }
        } else {
            $this->view('add', array('require_js'=>true));
        }
    }
}