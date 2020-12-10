<footer class="container-fluid bg-dark">
    <div class="container-xl py-5">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="d-flex flex-column">
                    <img src="<?php echo $url; ?>/images/app_title_logo_light.png" width="150px" alt="">
                    <a href="index.php" class="mt-3 h5">Home</a>
                    <a href="#" class="mt-3 h5">About Me</a>
                    <a href="#" class="mt-3 h5">Contact Me</a>

                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="">
                    <table class="table table-borderless        ">
                        <tr>
                            <td><i class="feather-phone h5 text-primary"></i></td>
                            <td><a href="tel:<?php echo $info['phone']; ?>" class="h5"><?php echo $info['phone']; ?></a></td>
                        </tr>
                        <tr>
                            <td><i class="feather-mail h5 text-primary"></i></td>
                            <td><a href="mailto:<?php echo $info['email']; ?>" class="h5"><?php echo $info['email']; ?></a></td>
                        </tr>

                    </table>
                    <div class="mt-3 mb-3">
                        <h5 class="text-primary mb-3">Follow Me: </h5>
                        <div class="d-flex">
                            <a href="" class="ml-2"><img width="25px" src="<?php echo $url; ?>/images/facebook.png" alt=""></a>
                            <a href="" class="ml-2"><img width="25px" src="<?php echo $url; ?>/images/instagram.png" alt=""></a>
                            <a href="" class="ml-2"><img width="25px" src="<?php echo $url; ?>/images/twitter.png" alt=""></a>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-4">
                <div>
                    <h5 class="font-weight-bold text-primary">Check Facebook Page Here</h5>
                    <?php require_once "layout/front_panel/fb_page.php"?>
                </div>
            </div>
        </div>
    </div>
</footer>
<section class="container-fluid bg-primary">
    <div class="container-xl">
            <p class="text-center m-0 py-3 font-weight-bold">Copyright &copy; Hanzai Market Analysis Blog. All rights reserved.</p>
    </div>
</section>


<script src="<?php echo $url; ?>/vendor/jquery-3.3.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="<?php echo $url; ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo $url; ?>/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo $url; ?>/js/sub_dropdown.js "></script>
<script src="<?php echo $url; ?>/js/app.js "></script>
</body>
</html>