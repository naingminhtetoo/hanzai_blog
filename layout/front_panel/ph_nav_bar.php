<div class="container-fluid bg-dark sticky-top d-block d-md-none py-1 ph-menu-div overflow-auto" >
    <div class="d-flex justify-content-between align-items-center">
        <div class="ph-menu-btn">
            <i class="feather-menu text-white h3"></i>
        </div>
        <div data-toggle="modal" data-target="#exampleModal">
            <i class="feather-search text-white h4"></i>
        </div>
    </div>
    <div class="ph-menu">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active nav-home">
                <a class="nav-link text-white" href="index.php">Home</a>
            </li>
            <li class="nav-item nav-contact">
                <a class="nav-link text-white" href="<?php echo $url ?>/contact.php">Contact</a>
            </li>
            <li class="nav-item nav-about">
                <a class="nav-link text-white" href="<?php echo $url ?>/about.php">About</a>
            </li>
            <li class="nav-item nav-category">
                <a class="nav-link text-white" href="#">
                    Categories
                </a>
                <?php
                $category_data = json_decode(file_get_contents("http://localhost/admin/api/categories.php"));
                if (empty($category_data)) {
                    echo "no";
                } else {
                    ?>
                <div class="ml-3">
                    <ul class="navbar-nav" aria-labelledby="navbarDropdownMenuLink">
                        <?php
                        foreach ($category_data as $item) {
                            ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php echo $item->name; ?>
                                </a>
                                <?php
                                if (count($item->sub_categories)) {
                                    ?>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <?php
                                        foreach ($item->sub_categories as $sub_category) {
                                            ?>
                                            <li><a class="dropdown-item" href="<?php echo $url; ?>/posts_by_category.php?sub_category=<?php echo $sub_category->id ?>"><?php echo $sub_category->name; ?></a></li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                    <?php
                                }
                                ?>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
                    <?php
                }
                ?>
            </li>
        </ul>
    </div>
</div>