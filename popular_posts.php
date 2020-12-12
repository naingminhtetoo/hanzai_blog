<div>
    <h5 class="font-weight-bold mb-3">Popular Posts</h5>
    <div class="">
        <?php
        $data = postsOrderByViewers();
        foreach ($data as $item){
            $post_item = post($item['post_id']);
            if(!empty($post_item)){
                ?>
                <a href="<?php echo $url ?>/detail.php?id=<?php echo $post_item['id']; ?>">
                    <div class="mb-2">
                        <h6 class="m-0"><?php echo short($post_item['title'],50); ?></h6>
                        <div>
                            <small class="text-black-50"><i class="feather-clock"></i>
                                <?php echo timeago($post_item['created_at']) ?>
                            </small>
                            <small class="text-black-50 ml-2"><i class="feather-folder"></i>
                                <?php echo category(subCategory($post_item['sub_category_id'])['category_id'])['name']; ?>
                            </small>
                        </div>
                    </div>
                </a>
                <?php
            }
        }
        ?>
    </div>
</div>
