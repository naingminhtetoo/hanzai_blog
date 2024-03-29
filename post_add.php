<?php
require_once "layout/header.php";
require_once "layout/sidebar.php";
require_once "layout/nav_bar.php";
?>

<section class="main-section">
    <div class="container-fluid mx-2">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-white mb-2">
                        <li class="breadcrumb-item"><a href="<?php echo $url; ?>/dashboard.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo $url; ?>/post.php">Post</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Post</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-xl-8">
                <div class="card mb-4 border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">
                                <i class="feather-plus-circle text-primary"></i> Add Post
                            </h5>
                            <div class="d-flex ">
                                <a href="<?php echo $url; ?>/post.php" class="btn btn-outline-primary btn-sm">
                                    <i class="feather-list"></i>
                                </a>

                                <div class="ml-2 btn btn-outline-secondary btn-sm box-toggle"title="Maximized and Minized">
                                    <i class="feather-maximize-2"></i>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <?php
                        if(isset($_POST['addPost'])){
                             print_r(addPost());
                        }
                        ?>
                        <form method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="">Post Title</label>
                                <input type="text" name="title" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <label for="">Main Category</label>
                                        <select name="category" class="form-control mr-2 mb-2" id="category" required>
                                            <option value="" disabled selected>select category</option>
                                            <?php

                                            foreach (categories() as $category){
                                                ?>
                                                <option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
                                                <?php
                                            }

                                            ?>
                                        </select>
                                        <?php
                                        if(isset($_SESSION['error']['category'])){
                                            ?>
                                            <small class="text-danger font-weight-bold">
                                                <?php echo $_SESSION['error']['name'] ?>
                                            </small>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="">Sub Category</label>

                                        <select name="subCategory" id="subCategory" class="form-control mr-2 mb-2" required>
                                            <option value=""></option>
                                        </select>
                                        <?php
                                        if(isset($_SESSION['error']['subcategory'])){
                                            ?>
                                            <small class="text-danger font-weight-bold">
                                                <?php echo $_SESSION['error']['subcategory'] ?>
                                            </small>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Post Photo
                                    <i class="feather-info" tabindex="0" data-toggle="popover" data-placement="top" data-trigger="focus"  data-content="Only Image File Supported!"></i>
                                </label>
                                <input type="file" name="photo" class="form-control-file" accept="image/*" required>
                                <?php
                                if(isset($_SESSION['error']['file'])){
                                    ?>
                                    <small class="text-danger font-weight-bold">
                                        <?php echo $_SESSION['error']['file'] ?>
                                    </small>
                                    <?php
                                }
                                ?>
                            </div>
                            <div class="form-group mb-0">
                                <label for="">Post Description</label>
                                <textarea type="text" name="description" rows="9" id="description" class="form-control" required>
                                    <?php
                                    if(isset($_SESSION['data']['description'])){
                                        echo $_SESSION['data']['description'];
                                    }
                                    ?></textarea>
                                <?php
                                if(isset($_SESSION['error']['description'])){
                                    ?>
                                    <small class="text-danger font-weight-bold">
                                        <?php echo $_SESSION['error']['description'] ?>
                                    </small>
                                    <?php
                                }
                                ?>
                            </div>
                            <br>
                            <button class="btn btn-primary" name="addPost">Add Post</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once "layout/pre-footer.php" ?>
<script>
    let subCategory = JSON.parse('<?php echo json_encode(subCategories()); ?>');

    $(function() {
        $(".app-name").text("Post");
        $(".list").removeClass("list-selected");
        $(".listPostAdd").addClass("list-selected");
        // scrollLoad();
    });


    $("#category").change(function(){
        $("#subCategory").empty();
        let id = $(this).val();
        for (let i = 0; i < subCategory.length; i++) {
            if(subCategory[i].category_id == id){
                let data = `<option value="${subCategory[i].id}">${subCategory[i].name}</option>`;
                $("#subCategory").append(data);
            }
        }
    });
    $("#description").summernote({
        placeholder: 'Enter Some Description',
        tabsize: 2,
        height: 500,

    });
</script>

<?php
clearError();
?>
<?php require_once "layout/footer.php" ?>



