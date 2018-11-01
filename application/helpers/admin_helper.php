<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if(!function_exists('isset_trim')) {
    function isset_trim($var)
    {
        if(!isset($var))return false;
        if(trim($var)=="")return false;
        return true;
    }
}

/**
 * 把浮点数转换成百分数
 * @param float $numeric
 * @return float
 */
if (!function_exists('percent_format')) {
    function percent_format($numeric, $decimals = 2, $dec_point = '.', $thousands_sep = ',')
    {
        if (isset($numeric)) {
            if ($numeric == '-1') {
                return '-';
            } else {
                return is_numeric($numeric) ? number_format($numeric * 100, $decimals, $dec_point, $thousands_sep) : '0';
            }
        }
        return '-';
    }
}
	
