<?php
require_once "layout/header.php";
require_once "layout/sidebar.php";
require_once "layout/nav_bar.php";


?>

<section class="main-section">
    <div class="container-fluid mx-2">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="card mb-4 border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">
                                <i class="feather-edit-3 text-primary"></i> Edit Account
                            </h5>

                        </div>
                        <hr>
                        <?php
                        if(isset($_POST['updateAccount'])){
                            echo updateAccount();
                        }
                        ?>
                        <form method="post" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control" id="" name="name" value="<?php echo $_SESSION['user']['name']; ?>" required>
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
                                <div class="form-group col-md-6">
                                    <label for="">Email</label>
                                    <input type="email" class="form-control" name="email" id="" value="<?php echo $_SESSION['user']['email']; ?>" required>
                                    <?php
                                    if(isset($_SESSION['error']['email'])){
                                        ?>
                                        <small class="text-danger font-weight-bold">
                                            <?php echo $_SESSION['error']['email'] ?>
                                        </small>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Profile Photo
                                    <i class="feather-info" tabindex="0" data-toggle="popover" data-placement="top" data-trigger="focus"  data-content="Only Image File Supported!"></i>
                                </label>
                                <br>
                                <small class="text-primary">
                                    Please choose Photo <b> <u>if you want to update existing Profile photo!</u></b>
                                </small>
                                <input type="file" name="photo" class="form-control-file" accept="image/*">


                                <?php
                                if(isset($_SESSION['error']['photo'])){
                                    ?>
                                    <small class="text-danger font-weight-bold">
                                        <?php echo $_SESSION['error']['photo'] ?>
                                    </small>
                                    <?php
                                }
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="">Password
                                </label>
                                <br>
                                <small class="text-primary">
                                    Please enter <b>Your Password</b> to verify ,not new password
                                </small>
                                <input type="password" name="password" class="form-control" required>

                                <?php
                                if(isset($_SESSION['error']['password'])){
                                    ?>
                                    <small class="text-danger font-weight-bold">
                                        <?php echo $_SESSION['error']['password'] ?>
                                    </small>
                                    <?php
                                }
                                ?>
                            </div>
                            <button type="submit" class="btn btn-primary" name="updateAccount">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once "layout/pre-footer.php" ?>
<script>

    $(function() {
        $(".app-name").text("Account");
        $(".list").removeClass("list-selected");
        // scrollLoad();
    });
</script>
<?php
clearError();
?>
<?php require_once "layout/footer.php" ?>


