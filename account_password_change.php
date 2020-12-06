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
                                <i class="feather-layers text-primary"></i> Change Password
                            </h5>

                        </div>
                        <hr>
                        <?php
                        if(isset($_POST['pwd_update'])){
                             echo changePassword();
                        }
                        ?>
                        <form method="post" enctype="multipart/form-data">

                            <div class="form-group">
                                <label for="">Old Password
                                </label>
                                <input type="text" name="old_password" class="form-control" required value="<?php if(isset($_SESSION['data']['old_password'])) {echo  $_SESSION['data']['old_password'];} ?>">

                                <?php
                                if(isset($_SESSION['error']['old_password'])){
                                    ?>
                                    <small class="text-danger font-weight-bold">
                                        <?php echo $_SESSION['error']['old_password'] ?>
                                    </small>
                                    <?php
                                }
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="">New Password
                                </label>
                                <input type="text" name="new_password" class="form-control" required value="<?php if(isset($_SESSION['data']['new_password'])) {echo  $_SESSION['data']['new_password'];} ?>">

                                <?php
                                if(isset($_SESSION['error']['new_password'])){
                                    ?>
                                    <small class="text-danger font-weight-bold">
                                        <?php echo $_SESSION['error']['new_password'] ?>
                                    </small>
                                    <?php
                                }
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="">Confrim Password
                                </label>
                                <input type="text" name="confrim_password" class="form-control" required value="<?php if(isset($_SESSION['data']['confrim_password'])) {echo  $_SESSION['data']['confrim_password'];} ?>">

                                <?php
                                if(isset($_SESSION['error']['confrim_password'])){
                                    ?>
                                    <small class="text-danger font-weight-bold">
                                        <?php echo $_SESSION['error']['confrim_password'] ?>
                                    </small>
                                    <?php
                                }
                                ?>
                            </div>

                            <div class="d-flex flex-column">
                                <?php
                                if(isset($_SESSION['error']['pwd_short'])){
                                    ?>
                                    <small class="text-danger font-weight-bold">
                                        <?php echo $_SESSION['error']['pwd_short'] ?>
                                    </small>
                                    <?php
                                }
                                ?>
                                <?php
                                if(isset($_SESSION['error']['pwd_notequal'])){
                                    ?>
                                    <small class="text-danger font-weight-bold">
                                        <?php echo $_SESSION['error']['pwd_notequal'] ?>
                                    </small>
                                    <?php
                                }
                                ?>


                            </div>
                            <button type="submit" class="btn btn-primary" name="pwd_update" onclick="return confirm('Are U sure to change your password? 😊')">Change</button>
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
$_SESSION['data'] = [];
?>
<?php require_once "layout/footer.php" ?>


