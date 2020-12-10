<pre>
<?php
//
//$pwd ="adminadmin";
//
//$spwd = password_hash($pwd,PASSWORD_DEFAULT);
//
//echo $spwd;

$category_data = json_decode(file_get_contents("http://localhost/admin/api/categories.php"));

if (empty($category_data)) {
    echo "no";
} else {
    foreach ($category_data as $item) {
        echo $item->id;
        echo "<br>";
        echo $item->name;
        echo "<br>";
        if(count($item->sub_categories)){
            foreach($item->sub_categories as $sub_category){
                echo "id".$sub_category->id;
                echo "name".$sub_category->name;
                echo "<br>";
            }
        }
        echo "<br>";
        echo "<br>";
//        echo var_dump($item);
    }
}

?>

<!--    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">-->
<!--                            <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Submenu</a>-->
<!--                                <ul class="dropdown-menu">-->
<!--                                    <li><a class="dropdown-item" href="#">Submenu action</a></li>-->
<!--                                    <li><a class="dropdown-item" href="#">Another submenu action</a></li>-->
<!---->
<!---->
<!--                                    <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Subsubmenu</a>-->
<!--                                        <ul class="dropdown-menu">-->
<!--                                            <li><a class="dropdown-item" href="#">Subsubmenu action</a></li>-->
<!--                                            <li><a class="dropdown-item" href="#">Another subsubmenu action</a></li>-->
<!--                                        </ul>-->
<!--                                    </li>-->
<!--                                    <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Second subsubmenu</a>-->
<!--                                        <ul class="dropdown-menu">-->
<!--                                            <li><a class="dropdown-item" href="#">Subsubmenu action</a></li>-->
<!--                                            <li><a class="dropdown-item" href="#">Another subsubmenu action</a></li>-->
<!--                                        </ul>-->
<!--                                    </li>-->
<!---->
<!---->
<!---->
<!--                                </ul>-->
<!--                            </li>-->
<!--                        </ul>-->
