<pre>
<?php
//
//$pwd ="adminadmin";
//
//$spwd = password_hash($pwd,PASSWORD_DEFAULT);
//
//echo $spwd;
$text = rawurlencode("post 2");
$data = json_decode(file_get_contents("http://localhost/admin/api/posts_by_search.php?search_text=$text&page=1"));
echo var_dump($data);