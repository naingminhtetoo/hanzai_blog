<?php

?>

<nav class="navbar navbar-light rounded border-bottom justify-content-between py-1">
    <div class="d-flex align-items-center">
            <span id="menu-toggle" class="d-flex">
                <i class="feather-menu menuBtn"></i>
            </span>
        <ul class="nav">
            <li class="nav-item">
                <h5 class="app-name">Admin</h5>
            </li>
        </ul>
    </div>
    <div class="profile-sec">
        <div class="dropdown">
            <div href="#" class="dropdown-toggle" type="button"
                 id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="<?php echo $url; ?>/files/<?php echo $user['photo']; ?>" class="admin-img"><span class="admin-n"><?php echo $user['name']; ?></span> <input type="hidden"
                                                                                    class="admin-id">
            </div>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">

                <a class="dropdown-item" href="<?php echo $url; ?>/account_setting.php">
                    <div class="d-flex justify-content-start align-items-center"><i
                                class="feather-settings mr-3"></i>Account
                    </div>
                </a>
                <a class="dropdown-item bg-danger" href="<?php echo $url; ?>/logout.php">
                    <div class="text-white d-flex justify-content-start align-items-center"><i
                                class="feather-log-out mr-3"></i>Logout
                    </div>
                </a>
            </div>
        </div>
    </div>
</nav>