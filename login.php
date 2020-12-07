
<?php
session_start();

require_once "core/base.php";
require_once "core/functions.php";

if(isset($_SESSION['user'])){
    redirect('dashboard.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="<?php echo $url; ?>/images/app_logo_2.png">

    <!-- Bootstrap core CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Concert+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo $url; ?>/vendor/animate_it/css/animate.min.css">
    <link rel="stylesheet" href="<?php echo $url; ?>/vendor/feather-icon/feather.css">
    <link rel="stylesheet" href="<?php echo $url; ?>/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $url; ?>/css/login.css">

</head>

<body>
<div class="container-fluid">
    <div class="login-box">
        <div class="appIcon">
            <img src="<?php echo $url; ?>/images/app_title_logo.png" style="max-width: 300px;" alt="">
        </div>
        <br>
        <div class="login-section">
            <div class="row">
                <div class="col-10 offset-1">

                    <?php
                        if(isset($_POST['login-btn'])){
                             echo login();
                        }
                    ?>
                    <form method="post">
                        <div style="display: none;" class="alert alert-danger errorMessage" role="alert">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"><i class="feather-mail"></i> Email address</label>
                            <input type="email" class="form-control" name="email" id="email"
                                   aria-describedby="emailHelp" required>
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
                        <div class="form-group">
                            <label for="exampleInputPassword1"><i class="feather-lock"></i> Password</label>
                            <input type="password" name="password" class="form-control" autocomplete="" id="pwd" min="8" required>
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
                        <?php
                        if(isset($_SESSION['error']['auth'])){
                            ?>
                            <div class="form-group">
                                <small class="text-danger font-weight-bold">
                                    <?php  $_SESSION['error']['auth'] ?>
                                </small>
                            </div>
                            <?php
                        }
                        ?>
                        <br>
                        <div class="form-group">
                            <button type="submit" id="login" class="btn" style="width:100%;" name="login-btn">Log In</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo $url; ?>/vendor/jquery-3.3.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="<?php echo $url; ?>/vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
<?php
clearError();
?>
