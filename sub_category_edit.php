<?php
require_once "layout/header.php";
require_once "layout/sidebar.php";
require_once "layout/nav_bar.php";
if(!isset($_GET['id'])){
    linkTo('sub_category.php');
}
$id = $_GET['id'];
$current = subCategory($id);
if($current == null){
    echo "<script>alert('Something is wrong!')</script>";
    linkTo('sub_category.php');
}
?>

<section class="main-section">
    <div class="container-fluid mx-2">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-white mb-2">
                        <li class="breadcrumb-item"><a href="<?php echo $url; ?>/dashboard.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo $url; ?>/category.php">Category</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Sub Category</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-xl-4">
                <div class="card mb-4 border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-start align-items-center">
                            <h5 class="mb-0">
                                <i class="feather-layers text-primary"></i> Category
                            </h5>

                        </div>
                        <hr>
                        <?php

                        if(isset($_POST['addCat'])){
                            echo subCategoryUpdate();
                        }

                        ?>
                        <form method="post">
                            <input type="hidden" value="<?php echo $id; ?>" name="id">
                            <div class="form-group">
                                <label for="">Main Category</label>
                                <select name="category" class="form-control mr-2 mb-2" required>
                                    <?php

                                    foreach (categories() as $category){
                                        ?>
                                        <option value="<?php echo $category['id'] ?>" <?php echo $category['id']==$current['category_id']?'selected':''; ?>><?php echo $category['name'] ?></option>
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
                            <div class="form-group">
                                <label for="">Sub Category</label>
                                <input type="text" class="form-control mr-2 mb-2" name="name" placeholder="New Sub Category" value="<?php echo $current['name'] ?>" required>
                                <?php
                                if(isset($_SESSION['error']['name'])){
                                    ?>
                                    <small class="text-danger font-weight-bold">
                                        <?php echo $_SESSION['error']['name'] ?>
                                    </small>
                                    <?php
                                }
                                ?>
                            </div>
                            <button class="btn btn-primary" name="addCat">Update Sub Category</button>

                        </form>
                    </div>
                </div>

            </div>
            <div class="col-12 col-xl-8">
                <div class="card mb-4 border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-start align-items-center">
                            <h5 class="mb-0">
                                <i class="feather-layers text-primary"></i> Sub Category List
                            </h5>

                        </div>
                        <hr>

                        <?php include 'sub_category_list.php'; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once "layout/pre-footer.php" ?>
<script>

    $(function() {
        $(".app-name").text("Sub Category");
        $(".list").removeClass("list-selected");
        $(".listSubCategory").addClass("list-selected");
        // scrollLoad();
    });
</script>

<?php
clearError();
?>
<?php require_once "layout/footer.php" ?>


