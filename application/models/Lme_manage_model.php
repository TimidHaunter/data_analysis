<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Lme_manage_model extends Base_Model
{

    var $page_size = 10;

    public function __construct()
    {
        $this->db_tablepre = 't_lme_';
        $this->table_name = 'day_data';
        parent::__construct();
    }



}