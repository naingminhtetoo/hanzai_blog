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
                                <i class="feather-layers text-primary"></i> Post List
                            </h5>
                            <a href="<?php echo $url; ?>/post.php" class="btn btn-outline-primary">
                                <i class="feather-list"></i>
                            </a>
                        </div>
                        <hr>
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

                                    <select name="category" class="form-control mr-2 mb-2" required>
                                        <option value="" disabled selected>select sub category</option>

                                        <?php

                                        foreach (subCategories() as $c){
                                            ?>
                                            <option value="<?php echo $c['id'] ?>" data-category="<?php echo $c['category_id'] ?>"><?php echo $c['name'] ?></option>
                                            <?php
                                        }

                                        ?>
                                    </select>
                                    <?php
                                    if(isset($_SESSION['error']['subcategory'])){
                                        ?>
                                        <small class="text-danger font-weight-bold">
                                            <?php echo $_SESSION['error']['name'] ?>
                                        </small>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Post Photo</label>
                            <input type="file" name="photo" class="form-control-file" required>
                        </div>
                        <div class="form-group mb-0">
                            <label for="">Post Description</label>
                            <textarea type="text" name="description" rows="9" id="description" class="form-control" required></textarea>
                        </div>
                        <br>
                        <button class="btn btn-primary">Add Post</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once "layout/pre-footer.php" ?>
<script>


    $(function() {
        // $(".app-name").text("Admin");
        $(".list").removeClass("list-selected");
        $(".listPostAdd").addClass("list-selected");
        // scrollLoad();
    });
</script>

<?php
clearError();
?>
<?php require_once "layout/footer.php" ?>

<script>

    $("#category").change(function(){
       console.log($(this).val());
    });
    $("#description").summernote({
        placeholder: 'Enter Some Description',
        tabsize: 2,
        height: 500,

    });
</script>


