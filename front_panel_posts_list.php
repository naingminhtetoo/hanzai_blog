<div class="col-12 col-md-8">
    <div class="row">
        <?php
        if(empty($data)){
            echo "no";
        }
        else{
            $first_one = true;
            foreach($data as $item){
                if($first_one){

                    ?>
                    <div class="col-12 mt-3">
                        <a href="<?php echo $url ?>/detail.php?id=<?php echo $item->id; ?>">
                            <div class="card card-post card-main-post border-0 overflow-hidden">
                            <div class="card-main-text px-3">
                                <div class="">
                                    <h5 class="text-white font-weight-bold"><?php echo short($item->title,260); ?>
                                    </h5>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <small class="text-white"><i class="feather-user"></i><?php echo user($item->user_id)['name']; ?></small>
                                    <small class="text-white ml-2"><i class="feather-folder"></i> <?php echo $item->category; ?></small>
                                    <small class="text-white ml-2"><i class="feather-clock"></i> <?php echo timeago($item->created_at); ?></small>
                                </div>
                            </div>
                            <div class="card-main-shadow"></div>
                            <img src="files/<?php echo $item->photo; ?>" width="100%" height="400px" alt="">
                        </div>
                        </a>
                    </div>
                    <?php

                    $first_one = false;
                }
                else{
                    ?>
                    <div class="col-12 col-md-6 mt-3">
                        <a href="<?php echo $url ?>/detail.php?id=<?php echo $item->id; ?>">
                            <div class="card card-post border-0 bg-light overflow-hidden">
                                <img src="files/<?php echo $item->photo ?>" height="200px" alt="">
                                <div class="px-2">
                                    <div>
                                        <small><i class="feather-user"></i> <?php echo user($item->user_id)['name']; ?></small>
                                        <small class="ml-2"><i class="feather-folder"></i> <?php echo $item->category; ?></small>
                                        <small class="ml-2"><i class="feather-calendar"></i> <?php echo timeago($item->created_at); ?></small>
                                    </div>
                                    <div class="">
                                        <p class="text-black font-weight-bold"><?php echo short($item->title,100); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php
                }
            }
        }
        ?>
    </div>
    <div class="row">
        <div class="col-12 mt-3">
            <?php
            $no_of_records_per_page = 9;
            $total_rows = countTotal('posts');
            $total_pages = floor($total_rows / $no_of_records_per_page);

            ?>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-end">
                    <li class="page-item"><a class="page-link" href="?pageno=1">First</a></li>
                    <li class="page-item <?php if($pageno <= 1){ echo 'disabled'; } ?>">
                        <a class="page-link" href="<?php if($pageno <= 1){ echo '#'; } else { echo "?page=".($pageno - 1); } ?>">Prev</a>
                    </li>
                    <li class="page-item <?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                        <a class="page-link" href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?page=".($pageno + 1); } ?>">Next</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="?page=<?php echo $total_pages; ?>">Last</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>