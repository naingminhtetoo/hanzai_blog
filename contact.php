<?php require_once "layout/front_panel/header.php" ?>
<title><?php echo $info['short'] ?></title>
<meta name="title" content="<?php echo $info['name']; ?>">
<meta name="description" content="<?php echo $info['description']; ?>">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="<?php echo $url; ?>/index.php">
<meta property="og:title" content="<?php echo $info['name']; ?>">
<meta property="og:description" content="<?php echo $info['description']; ?>">
<meta property="og:image" content="<?php echo $url; ?>/images/app_img.jpg">
<?php require_once "layout/front_panel/side_header.php" ?>
<?php require_once "layout/front_panel/ph_nav_bar.php"?>
<?php require_once "layout/front_panel/app_logo_header.php"?>
<?php require_once "layout/front_panel/nav_bar.php"; ?>
<div class="container-xl">
    <div class="col-12">
        <h3 class="my-3 text-primary font-weight-bold">Contact Me</h3>
        <form>
            <div class="form-group">
                <label for="exampleInputEmail1">Full Name</label>
                <input type="text" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" required>
                <small id="emailHelp" class="form-text text-muted">example@example.com</small>

            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Messages</label>
                <textarea name="" id="" class="form-control" cols="30" rows="7" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary"><i class="feather-send"></i> Send</button>
            <br><br>
        </form>
    </div>
</div>

<?php require_once "layout/front_panel/footer.php"?>
<script>
    $(".nav-item").removeClass("active");
    $(".nav-contact").addClass("active");
</script>
