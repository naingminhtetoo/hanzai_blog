<div class="container-fluid bg-dark sticky-top d-none d-md-block">
    <section class="container-xl p-0 ">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Categories
                        </a>
                        <?php
                        $category_data = json_decode(file_get_contents("http://localhost/admin/api/categories.php"));
                        if (empty($category_data)) {
                            echo "no";
                        } else {
                            ?>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <?php
                                foreach ($category_data as $item) {
                                    ?>
                                    <li class="dropdown-submenu">
                                        <a class="dropdown-item dropdown-toggle" href="#"><?php echo $item->name; ?></a>
                                        <?php
                                        if (count($item->sub_categories)) {
                                            ?>
                                            <ul class="dropdown-menu">
                                                <?php
                                                foreach ($item->sub_categories as $sub_category) {
                                                    ?>
                                                    <li><a class="dropdown-item" href="#"><?php echo $sub_category->name; ?></a></li>
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
                            <?php
                        }
                        ?>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <div class="input-group ">
                        <input type="text" class="form-control" placeholder="Search...." aria-describedby="button-addon2" required>
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit" id="button-addon2">
                                    <span>
                                        <i class="feather-search"></i>
                                    </span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </nav>
    </section>
</div>
