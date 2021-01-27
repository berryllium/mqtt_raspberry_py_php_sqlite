<?php
$order = 'ASC';
require_once('model.php');
$json = [];
foreach($data as $item) {
    $json[] = [
        $item['DATE_INSERT'],
        $item['MESSAGE'],
    ];
}
echo json_encode($json, JSON_UNESCAPED_UNICODE);