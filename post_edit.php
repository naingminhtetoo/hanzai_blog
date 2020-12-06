<?php
require_once "layout/header.php";
require_once "layout/sidebar.php";
require_once "layout/nav_bar.php";
if(!isset($_GET['id'])){
    linkTo('post.php');
}
$id = $_GET['id'];
$current = post($id);
if($current == null){
    echo "<script>alert('Something is wrong!')</script>";
    linkTo('post.php');
}
?>

<section class="main-section">
    <div class="container-fluid mx-2">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-white mb-2">
                        <li class="breadcrumb-item"><a href="<?php echo $url; ?>/dashboard.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo $url; ?>/post.php">Post</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Post</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-xl-8">
                <div class="card mb-4 border-0 shadow-sm overflow-auto">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">
                                <i class="feather-plus-circle text-primary"></i> Edit Post
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
                        if(isset($_POST['updatePost'])){
                            print_r(updatePost());
                        }
                        ?>
                        <form method="post" enctype="multipart/form-data">
                            <input type="hidden" value="<?php echo $id; ?>" name="id">
                            <div class="form-group">
                                <label for="">Post Title</label>
                                <input type="text" name="title" class="form-control" required value="<?php echo $current['title']; ?>">
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <label for="">Main Category</label>
                                        <select name="category" class="form-control mr-2 mb-2" id="category"  required>
                                            <?php

                                            foreach (categories() as $category){
                                                $subCategory = subCategory($current['sub_category_id'])['category_id'];
                                                ?>
                                                <option value="<?php echo $category['id'] ?>" <?php echo $category['id']==category($subCategory)['id']?'selected':''; ?>><?php echo $category['name'] ?></option>
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
                                <input type="file" name="photo" class="form-control-file" accept="image/*">
                                <small class="text-primary">
                                    Please choose file if you want to update existing post photo!
                                </small>
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
                                    echo html_entity_decode($current['description'],ENT_QUOTES);
                                    ?>
                                </textarea>
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
                            <button class="btn btn-primary" name="updatePost">Update Post</button>
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
        $(".listPost").addClass("list-selected");
        // scrollLoad();

        <?php echo 
        $sub_category_id = $current['sub_category_id']; 
        $category_id = subCategory($current['sub_category_id'])['category_id'];
        $selected_subCategory = json_encode(subCategoriesByCategoryId($category_id));
        ?>;
        let selected_subCategory = <?php echo $selected_subCategory ?>;
        let sub_category_id = <?php echo $sub_category_id ?>;
        let curr = '';
        for (let i = 0; i < selected_subCategory.length; i++) {
                if(selected_subCategory[i].id == sub_category_id) {
                    curr = 'selected';
                }
                else curr = '';

                let data = `<option value="${selected_subCategory[i].id}" ${curr}>${selected_subCategory[i].name}</option>`;
                $("#subCategory").append(data);

        }

        //console.log(<?php //echo $selected_subCategory ?>//);
        //console.log(<?php //echo $sub_category_id; ?>//);
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



