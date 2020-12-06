<?php
require_once "layout/header.php";
require_once "layout/sidebar.php";
require_once "layout/nav_bar.php";
?>

<section class="main-section">
    <div class="container-fluid mx-2">
        <div class="row">
            <div class="col-12 col-md-3">
                <div class="card">
                    <div class="card-body">
                        <img src="<?php echo $url ?>/files/<?php echo $_SESSION['user']['photo'] ?>" class="img-fluid img-thumbnail" alt="">
                        <h5 class="mt-3"><?php echo $_SESSION['user']['name'] ?></h5>
                        <h6 class="text-black-50"><?php echo $_SESSION['user']['email'] ?></h6>

                        <div class="mt-3">
                            <a href="<?php echo $url; ?>/profile_edit.php" class="text-decoration-underline">Edit Profile</a>
                        </div>
                        <div class="mt-2">
                            <a href="<?php echo $url; ?>/account_password_change.php" class="text-danger text-decoration-underline">Change Password</a>
                        </div>
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
<?php require_once "layout/footer.php" ?>


