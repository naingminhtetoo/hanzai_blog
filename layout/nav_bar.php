<nav class="navbar navbar-light rounded border-bottom justify-content-between">
    <div class="d-flex align-items-center">
            <span id="menu-toggle" class="d-flex">
                <i class="feather-menu menuBtn"></i>
            </span>
        <ul class="nav">
            <li class="nav-item">
                <h4 class="app-name">Admin</h4>
            </li>
        </ul>
    </div>
    <div class="profile-sec">
        <div class="dropdown">
            <div href="#" class="dropdown-toggle" type="button"
                 id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="" class="admin-img"> <span class="admin-n"></span> <input type="hidden"
                                                                                    class="admin-id">
            </div>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="profile.php">
                    <div class="d-flex justify-content-start align-items-center"><i
                                class="feather-user mr-3"></i>Profile
                    </div>
                </a>
                <a class="dropdown-item" href="#" onclick="logout()">
                    <div class="text-danger d-flex justify-content-start align-items-center"><i
                                class="feather-log-out mr-3"></i>Logout
                    </div>
                </a>
            </div>
        </div>
    </div>
</nav>