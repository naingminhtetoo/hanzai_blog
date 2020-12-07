<?php


function con(){
    return mysqli_connect("localhost","root","","hanzai_blog");
}

$info = [
    "name" => "Hanzai Market Analysis Blog",
    "short" => "HanZai Blog",
    "description" => ""
];

$url = "http://{$_SERVER['HTTP_HOST']}/admin";

date_default_timezone_set('Asia/Yangon');