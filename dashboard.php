<?php
require_once "layout/header.php";
require_once "layout/sidebar.php";
require_once "layout/nav_bar.php";
?>

<section class="main-section">
            <div class="container-fluid mx-2">
                <div class="row d-flex">
                    <div class="col-12 col-sm-6 col-xl-3 ">
                        <div class="card total-box p-3 px-4 shadow d-flex justify-content-between flex-row align-items-center">
                            <div class="t-icon bg-primary p-2 rounded shadow">
                                <i class="feather-book text-white"></i>
                            </div>
                            <div class="t-s d-flex flex-column align-items-center"><h5 id="total-major"
                                                                                       class="m-0 text-dark counter-up">3</h5>
                                <h6 class="text-dark">Major</h6></div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-xl-3 ">
                        <div class="card total-box p-3 px-4 shadow d-flex justify-content-between flex-row align-items-center">
                            <div class="t-icon bg-primary p-2 rounded shadow">
                                <i class="feather-globe text-white"></i>

                            </div>
                            <div class="t-s d-flex flex-column align-items-center"><h5 id="total-news"
                                                                                       class="m-0 text-dark counter-up">5</h5>
                                <h6 class="text-dark">News</h6></div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-xl-3 ">
                        <div class="card total-box p-3 px-4 shadow d-flex justify-content-between flex-row align-items-center">
                            <div class="t-icon bg-primary p-2 rounded shadow">
                                <i class="feather-file-text text-white"></i>
                            </div>
                            <div class="t-s d-flex flex-column align-items-center"><h5 id="total-oq"
                                                                                       class="m-0 text-dark counter-up">90</h5>
                                <h6 class="text-dark">Old Question</h6></div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-xl-3 ">
                        <div class="card total-box p-3 px-4 shadow d-flex justify-content-between flex-row align-items-center">
                            <div class="t-icon bg-primary p-2 rounded shadow">
                                <i class="feather-heart text-white"></i>
                            </div>
                            <div class="t-s d-flex flex-column align-items-center"><h5 id="total-memory"
                                                                                       class="m-0 text-dark counter-up">99</h5>
                                <h6 class="text-dark">Memory</h6></div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-xl-3 ">
                        <div class="card total-box p-3 px-4 shadow d-flex justify-content-between flex-row align-items-center">
                            <div class="t-icon bg-primary p-2 rounded shadow">
                                <i class="feather-file text-white"></i>

                            </div>
                            <div class="t-s d-flex flex-column align-items-center"><h5 id="total-ebook"
                                                                                       class="m-0 text-dark counter-up">9</h5>
                                <h6 class="text-dark">E Book</h6></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <pre>
                        <?php

                        echo var_dump($_SESSION['user']);

                        ?>
                    </pre>
                </div>
            </div>
        </section>

<?php require_once "layout/pre-footer.php" ?>
<script>

    $(function() {
        $(".app-name").text("Dashboard");
        $(".list").removeClass("list-selected");
        $(".listDashboard").addClass("list-selected");
        // scrollLoad();
    });
</script>
<?php require_once "layout/footer.php" ?>


