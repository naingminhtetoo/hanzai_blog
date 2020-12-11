<div class="row">
    <div class="col-12">
        <h5 class="font-weight-bold">Related Posts</h5>
    </div>
    <?php
    $data = json_decode(file_get_contents("http://localhost/admin/api/posts.php?limit=4&offset=1&no_id=$id"));
    foreach ($data as $item){
        ?>
        <div class="col-12 col-md-6 mb-2" >
            <a href="<?php echo $url ?>/detail.php?id=<?php echo $item->id; ?>" class="text-decoration-none text-primary " >
                <div class="card card-post border-0 bg-light overflow-hidden">
                    <img src="files/<?php echo $item->photo ?>" height="200px" alt="">
                    <div class="px-2">
                        <div>
                            <small class="text-dark"><i class="feather-user"></i> <?php echo user($item->user_id)['name']; ?></small>
                            <small class="ml-2 text-dark"><i class="feather-folder"></i> <?php echo $item->category; ?></small>
                            <small class="ml-2 text-dark"><i class="feather-calendar"></i> <?php echo timeago($item->created_at); ?></small>
                        </div>
                        <div class="">
                            <p class="text-dark font-weight-bold"><?php echo short($item->title,100); ?>
                            </p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <?php
    }
    ?>
</div>
