<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('error_reporting', 1);

$db_file = 'IoT.db';
$db = new SQLite3($db_file);
$db_size = round(filesize($db_file) / (1024*1000), 2);

$data = [];
$tables = [];
$result = $db->query("SELECT * FROM sqlite_master WHERE TYPE = 'table' AND name !='sqlite_sequence'");
if($result) {
    while ($row = $result->fetchArray()) {
        $tables[] = $row['name'];
    }  
}

$order = $order ?: 'DESC';

if($current_topic = $_GET['topic']) {
    $from = gmdate('Y-m-d H:i:s', strtotime($_GET['from']));
    $to = gmdate('Y-m-d H:i:s', strtotime($_GET['to']));
    if(!$from) $from = gmdate('Y-m-d H:i:s', time());
    if(!$from) $from = gmdate('Y-m-d H:i:s', time() - 600);
    $query = "SELECT ID, MESSAGE, datetime(DATE_INSERT, 'localtime') AS DATE_INSERT 
    FROM $current_topic 
    WHERE DATE_INSERT >= '$from' 
    AND DATE_INSERT <= '$to' 
    ORDER BY ID $order";
    $result = $db->query($query);
    while ($row = $result->fetchArray()) {
        $data[] = $row;
    }   
}