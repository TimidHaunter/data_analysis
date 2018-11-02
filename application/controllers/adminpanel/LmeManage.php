<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class LmeManage extends Admin_Controller {
	
	function __construct()
	{
		parent::__construct();
        $this->load->model(array('Lme_manage_model'));
        $this->load->helper(array('admin_helper'));
	}

	function index($page_no=1)
    {
        $page_no = max(intval($page_no),1);

        $where_arr = array();
        $where = implode(" and ", $where_arr);
        $order_by = 'date DESC';
        $data_list = $this->Lme_manage_model->listinfo($where, '*', $order_by, $page_no, $this->Lme_manage_model->page_size,'',$this->Member_model->page_size,page_list_url('adminpanel/lmeManage/index',true));

		$this->view('index', array('require_js'=>true, 'data_list'=>$data_list??array()));
	}

    function chart($page_no=1)
    {
        $page_no = max(intval($page_no),1);

        $where_arr = array();
        $where = implode(" and ", $where_arr);
        $order_by = 'date ASC';
        $data_list = $this->Lme_manage_model->listinfo($where, '*', $order_by, $page_no, $this->Lme_manage_model->page_size,'',$this->Member_model->page_size,page_list_url('adminpanel/lmeManage/index',true));

        if ($data_list) {
            foreach ($data_list as $k=>$v) {
                $data_list[$k]['cu_cancel_percent'] = percent_format($v['cu_cancel']/$v['cu_keep']).'%';
                $data_list[$k]['al_cancel_percent'] = percent_format($v['al_cancel']/$v['al_keep']).'%';
                $data_list[$k]['zn_cancel_percent'] = percent_format($v['zn_cancel']/$v['zn_keep']).'%';
                $data_list[$k]['ni_cancel_percent'] = percent_format($v['ni_cancel']/$v['ni_keep']).'%';
                $data_list[$k]['sn_cancel_percent'] = percent_format($v['sn_cancel']/$v['sn_keep']).'%';
                $data_list[$k]['pb_cancel_percent'] = percent_format($v['pb_cancel']/$v['pb_keep']).'%';
            }
        }
        $this->view('chart', array('require_js'=>true, 'data_list'=>$data_list??array()));
    }

	function add()
    {
        if ($this->input->is_ajax_request()) {
            // 先判断是否有该日期的数据
            $date = $_POST['date'];
            $data_info = $this->Lme_manage_model->get_one(array('date'=>$date));
            if ($data_info) exit(json_encode(array('status'=>false,'tips'=>'日期'.$date.'数据已存在')));

            $_POST['create_time'] = NOW_DATE;
            $res = $this->Lme_manage_model->insert($_POST);
            if ($res) {
                exit(json_encode(array('status'=>true,'tips'=>'添加成功')));
            } else {
                exit(json_encode(array('status'=>false,'tips'=>'添加失败')));
            }
        } else {
            $this->view('add', array('require_js'=>true, 'is_edit'=>false));
        }
    }

    function edit($id)
    {
        $id = intval($id);
        $data_info = $this->Lme_manage_model->get_one(array('id' => $id));
        if (!$data_info) exit(json_encode(array('status'=>false,'tips'=>'编辑的信息ID不存在')));

        if ($this->input->is_ajax_request()) {
            $res = $this->Lme_manage_model->update($_POST, array('id' => $id));
            if ($res) {
                exit(json_encode(array('status'=>true,'tips'=>'编辑成功')));
            } else {
                exit(json_encode(array('status'=>false,'tips'=>'编辑失败')));
            }
        } else {
            $this->view('add', array('require_js'=>true, 'is_edit'=>true, 'data_info'=>$data_info));
        }
    }

    function show($id)
    {
        $id = intval($id);
        $data_info = $this->Lme_manage_model->get_one(array('id' => $id));
        if (!$data_info) exit(json_encode(array('status'=>false,'tips'=>'编辑的信息ID不存在')));

        // 获取上一交易日数据
        // 先判断今日是星期几
        $date = $data_info['date'];
        $week = date('w', strtotime($date));

        // 如果是星期一
        if ($week=='1') {
            $last_date = date('Ymd', strtotime($date)-259200);
        } else {
            $last_date = date('Ymd', strtotime($date)-86400);
        }

        $last_data = $this->Lme_manage_model->get_one(array('date' => $last_date));
        if ($last_data) {
            // 有上一天数据
            $data_info['cu_change'] = $data_info['cu_keep'] - $last_data['cu_keep'];
            $data_info['al_change'] = $data_info['al_keep'] - $last_data['al_keep'];
            $data_info['zn_change'] = $data_info['zn_keep'] - $last_data['zn_keep'];
            $data_info['ni_change'] = $data_info['ni_keep'] - $last_data['ni_keep'];
            $data_info['sn_change'] = $data_info['sn_keep'] - $last_data['sn_keep'];
            $data_info['pb_change'] = $data_info['pb_keep'] - $last_data['pb_keep'];
        } else {
            // 没有
            $data_info['cu_change'] = $data_info['al_change'] = $data_info['zn_change'] = $data_info['ni_change'] = $data_info['sn_change'] = $data_info['pb_change'] = 0;
        }

        $this->view('show', array('require_js'=>true, 'is_edit'=>true, 'data_info'=>$data_info));
    }
}