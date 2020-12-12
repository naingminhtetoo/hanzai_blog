<div class="col-12 col-md-8 overflow-hidden">
        <div class="row">
            <div class="col-12">
                <?php
                if (empty($data)) {
                    ?>
                    <?php echo alert("No Data Found! Please Go to <a href='$url/index.php'>HOME</a> and Try Again","danger") ?>

                    <?php

                } else {
                    ?>
                    <h3 class="mt-4"><?php echo $data[0]->title; ?></h3>
                    <div class="mt-2 d-flex">
                        <small class="text-dark posi"><i class="feather-user text-primary"></i> <?php echo user($data[0]->user_id)['name'] ?></small>
                        <small class="text-dark ml-2"><i class="feather-clock text-info"></i> <?php echo timeago($data[0]->created_at) ?></small>
                    </div>
                    <div class="d-flex align-items-center my-2">
                        <h4 class="font-weight-bold text-primary mb-0"><?php echo $data[0]->category ?> </h4> <span class="mx-2"> > </span> <h6 class="mb-0 font-weight-bold text-primary"><?php echo $data[0]->sub_category ?></h6>
                    </div>
                    <img src="<?php echo $url; ?>/files/<?php echo $data[0]->photo; ?>" alt="" class="img-fluid">

                    <div class="mt-4">
                        <?php echo html_entity_decode($data[0]->description,ENT_QUOTES); ?>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    <hr>
        <?php
        if(!empty($data)){
            include_once "related_posts.php";
        }
        ?>

</div>