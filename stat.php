<?php
date_default_timezone_set('Asia/Shanghai');
ini_set('date.timezone','Asia/Shanghai');
if (empty($_GET['type']) || empty($_GET['time']) || empty($_GET['msg'])) {
    exit;
}
$filename = '/tmp/stat.log';
$data = $_GET['type'].': '.date('Y-m-d H:i:s').' '.$_GET['msg']."\n\n";
file_put_contents($filename, $data, FILE_APPEND);