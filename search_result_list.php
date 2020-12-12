<div class="col-12 col-md-8">
    <div class="row">
        <?php
        if(empty($data)){
            ?>
            <div class="col-12 mt-3">
                <?php echo alert("Oh, No Search Data Found!","warning") ?>
            </div>

            <?php
        }
        else{
            foreach($data as $item){
                    ?>
                    <div class="col-12 col-md-6 mt-3">
                        <a href="<?php echo $url ?>/detail.php?id=<?php echo $item->id; ?>">
                            <div class="card card-post border-0 bg-light overflow-hidden">
                                <img src="files/<?php echo $item->photo ?>" height="200px" alt="">
                                <div class="px-2">
                                    <div>
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
        }
        ?>
    </div>
    <div class="row">
        <?php

        if(!empty($data)){
            ?>
            <div class="col-12 mt-3">
                <?php
                $no_of_records_per_page = 9;
                $total_rows = countTotal('posts',"posts.title LIKE '%{$_GET['search_text']}%'");
                $total_pages = ceil($total_rows / $no_of_records_per_page);
                ?>
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-end">
                        <li class="page-item"><a class="page-link" href="?page=1&search_text=<?php echo $_GET['search_text']; ?>">First</a></li>
                        <li class="page-item <?php if($pageno <= 1){ echo 'disabled'; } ?>">
                            <a class="page-link" href="<?php if($pageno <= 1){ echo '#'; } else { echo "?page=".($pageno - 1); } ?>&search_text=<?php echo $_GET['search_text']; ?>">Prev</a>
                        </li>
                        <li class="page-item <?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                            <a class="page-link" href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?page=".($pageno + 1); } ?>&search_text=<?php echo $_GET['search_text']; ?>">Next</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="?page=<?php echo $total_pages; ?>&search_text=<?php echo $_GET['search_text']; ?>">Last</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <?php
        }

        ?>
    </div>
</div>