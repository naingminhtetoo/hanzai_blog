<?php
require_once "core/base.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hanzai Blog</title>
    <link rel="icon" href="<?php echo $url; ?>/images/app_logo_2.png">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhaina+2:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo $url; ?>/vendor/animate_it/css/animate.min.css">
    <link rel="stylesheet" href="<?php echo $url; ?>/vendor/feather-icon/feather.css">
    <link rel="stylesheet" href="<?php echo $url; ?>/vendor/bootstrap/css/bootstrap.min.css">
    <link href="<?php echo $url;?>/vendor/summer_note/summernote-bs4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $url; ?>/vendor/data_table/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo $url; ?>/vendor/data_table/jquery.dataTables.min.js">
    <link rel="stylesheet" href="<?php echo $url; ?>/css/sub_dropdown.css">
    <link rel="stylesheet" href="<?php echo $url; ?>/css/front-panel.css">

</head>
<body>
<div class="container-fluid bg-dark sticky-top d-block d-md-none py-1">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <i class="feather-menu text-white h3"></i>
        </div>
        <div>
            <i class="feather-search text-white h4"></i>
        </div>
    </div>
</div>
<header class="container-fluid  p-0">
    <div class="container-xl logo-section d-flex align-items-center p-2 px-4">
        <img src="<?php echo $url; ?>/images/app_title_logo.png" id="app-photo" width="130px" alt="">
        <h1 class="mb-0 ml-2 font-weight-bold" id="app-title"><?php echo $info['name']; ?></h1>
    </div>
</header>
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
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Submenu</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Submenu action</a></li>
                                        <li><a class="dropdown-item" href="#">Another submenu action</a></li>


                                        <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Subsubmenu</a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#">Subsubmenu action</a></li>
                                                <li><a class="dropdown-item" href="#">Another subsubmenu action</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Second subsubmenu</a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#">Subsubmenu action</a></li>
                                                <li><a class="dropdown-item" href="#">Another subsubmenu action</a></li>
                                            </ul>
                                        </li>



                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <div class="input-group ">
                            <input type="text" class="form-control" placeholder="Search...." aria-describedby="button-addon2" required>
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit" id="button-addon2">
                                    <span>
                                        <i class="feather-search "></i>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </nav>
        </section>
</div>
<div class="container-fluid vh-100 bg-info"></div>
<div class="container-fluid vh-100 bg-danger">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown active">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Categories
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
        </li>

        <li class="nav-item">
            <a class="nav-link " href="#" >About </a>
        </li>
    </ul>
</div>


<script src="<?php echo $url; ?>/vendor/jquery-3.3.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="<?php echo $url; ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo $url; ?>/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo $url; ?>/js/sub_dropdown.js "></script>
</body>
</html>