<?php
require_once "layout/header.php";
require_once "layout/sidebar.php";
require_once "layout/nav_bar.php";
?>

<section class="main-section">
            <div class="container-fluid mx-2">
                <div class="row d-flex">
                    <div class="col-12 col-lg-3">
                        <a href="<?php echo $url; ?>/post.php">
                            <div class="card total-box p-3 px-4 shadow d-flex justify-content-between flex-row align-items-center">
                                <div class="t-icon bg-primary p-2 rounded shadow">
                                    <i class="feather-grid text-white"></i>
                                </div>
                                <div class="t-s d-flex flex-column align-items-center"><h5
                                            class="m-0 text-dark counter-up"><?php echo count(posts()); ?></h5>
                                    <h6 class="text-dark">Posts</h6></div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-lg-3">
                        <a href="<?php echo $url; ?>/category.php">
                        <div class="card total-box p-3 px-4 shadow d-flex justify-content-between flex-row align-items-center">
                            <div class="t-icon bg-primary p-2 rounded shadow">
                                <i class="feather-folder text-white"></i>
                            </div>
                            <div class="t-s d-flex flex-column align-items-center"><h5
                                        class="m-0 text-dark counter-up"><?php echo count(categories()) ?></h5>
                                <h6 class="text-dark">Categories</h6></div>
                        </div>
                        </a>
                    </div>
                    <div class="col-12 col-lg-3">
                        <a href="<?php echo $url; ?>/sub_category.php">
                        <div class="card total-box p-3 px-4 shadow d-flex justify-content-between flex-row align-items-center">
                            <div class="t-icon bg-primary p-2 rounded shadow">
                                <i class="feather-folder-minus text-white"></i>
                            </div>
                            <div class="t-s d-flex flex-column align-items-center"><h5
                                        class="m-0 text-dark counter-up"><?php echo count(subCategories()) ?></h5>
                                <h6 class="text-dark">Sub Category</h6></div>
                        </div>
                        </a>
                    </div>
                    <div class="col-12 col-lg-9">
                        <div class="card border-0 shadow">
                            <div class="card-body">
                                <h5 class="font-weight-bold"><i class="feather-eye text-primary"></i> Posts User Most Views</h5>
                                <hr>
                                <div class="table-responsive">
                                    <table class="table table-striped table-sm">
                                        <thead>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Viewer Count</th>
                                        <th>Category</th>
                                        <th>Control</th>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $i = 1;
                                        $data = postsOrderByViewers();
                                        foreach ($data as $item){
                                        $post_item = post($item['post_id']);
                                        if(!empty($post_item)){
                                            ?>
                                                <tr>
                                                    <td><?php echo $i++; ?></td>
                                                    <td><?php echo short($post_item['title'],50); ?></td>
                                                    <td><span class="btn btn-outline-info btn-sm"><i class="feather-user"></i> <?php echo count(viewerCountByPost($post_item['id'])); ?></span></td>
                                                    <td><?php echo category(subCategory($post_item['sub_category_id'])['category_id'])['name']; ?></td>
                                                    <td class="text-nowrap">
                                                        <a href="post_detail.php?id=<?php echo $post_item['id']; ?>" class="btn btn-outline-primary btn-sm">
                                                            <i class="feather-eye fa-fw"></i>
                                                        </a>
                                                        <a href="post_delete.php?id=<?php echo $post_item['id']; ?>"
                                                           onclick="return confirm('Are U sure to delete. 😊')"
                                                           class="btn btn-outline-danger btn-sm">
                                                            <i class="feather-trash-2 fa-fw"></i>
                                                        </a>
                                                        <a href="post_edit.php?id=<?php echo $post_item['id']; ?>" class="btn btn-outline-info btn-sm">
                                                            <i class="feather-edit-2 fa-fw"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                        <?php
                                        }
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
<!--                <div class="row">-->
<!--                    <pre>-->
<!--                        --><?php
//
//                        echo var_dump($_SESSION['user']);
//
//                        ?>
<!--                    </pre>-->
<!--                </div>-->
            </div>
        </section>

<?php require_once "layout/pre-footer.php" ?>
<script>

    $(function() {
        $(".app-name").text("Dashboard");
        $(".list").removeClass("list-selected");
        $(".listDashboard").addClass("list-selected");
        // scrollLoad();
    });
</script>
<?php require_once "layout/footer.php" ?>


