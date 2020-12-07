<div class="d-flex" style="background:#f4f6f9;" id="wrapper">
    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="list-group list-group-flush">
            <div class="profile-section">
                <img src="images/app_title_logo_light.png" class="appIcon">
                <span class="m-close">
                        <i class="feather-x text-danger"></i>
                    </span>
            </div>
            <div class="catagory-section">

                <a class="my-2" href="dashboard.php">
                    <div class="list listDashboard"><i class="feather-home px-3 pl-4"></i>Dashboard
                    </div>
                </a>
                <a class="my-2" href="index.php">
                    <div class="list listUser"><i class="feather-layout px-3 pl-4"></i>Front Panel</div>
                </a>
                <div class="a-m-panel my-3">
                    <a class="my-2" href="#">
                        <div class="list pl-2 text-white-50">Category Management</div>
                    </a>
                    <a class="my-2" href="<?php echo $url; ?>/category.php">
                        <div class="list listCategory"><i class="feather-list px-3 pl-4"></i>Main Category</div>
                    </a>
                    <a class="my-2" href="<?php echo $url; ?>/sub_category.php">
                        <div class="list listSubCategory"><i class="feather-list px-3 pl-4"></i>Sub Category</div>
                    </a>
                </div>

                <div class="a-m-panel my-3">
                    <a class="my-2" href="#">
                        <div class="list pl-2 text-white-50">Post Management</div>
                    </a>
                    <a class="my-2" href="<?php echo $url; ?>/post.php">
                        <div class="list listPost"><i class="feather-list px-3 pl-4"></i>Post List</div>
                    </a>
                    <a class="my-2" href="<?php echo $url; ?>/post_add.php">
                        <div class="list listPostAdd"><i class="feather-plus-circle px-3 pl-4"></i>Add Post</div>
                    </a>
                </div>



            </div>
        </div>
    </div>

    <div id="page-content-wrapper">