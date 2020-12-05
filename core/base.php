<?php


function con(){
    return mysqli_connect("localhost","root","","hanzai_blog");
}

$info = array([
    "name" => "Hanzai Blog",
    "short" => "Hanzai",
    "description" => ""
]);

$url = "http://{$_SERVER['HTTP_HOST']}/admin";

date_default_timezone_set('Asia/Yangon');