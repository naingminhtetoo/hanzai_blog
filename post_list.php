<table class="table table-hover mt-3 mb-0">
    <thead>
    <tr>
        <th>#</th>
        <th>Title</th>
        <th>Description</th>
        <th>Category</th>
        <th>Sub_Category</th>
        <th>Control</th>
        <th>Created</th>
    </tr>
    </thead>
    <tbody>

    <?php

    $i = 1;

    foreach (posts() as $c){
        if(category(subCategory($c['sub_category_id'])['category_id']) != null && subCategory($c['sub_category_id']) != null){


            ?>
        <tr class="">
            <td><?php echo $i++; ?></td>
            <td><?php echo short($c['title']); ?></td>
            <td><?php echo short(strip_tags(html_entity_decode($c['description']))); ?></td>

            <td><small class=""><?php echo category(subCategory($c['sub_category_id'])['category_id'])['name']; ?></small>
                </td>
            <td><small><?php echo subCategory($c['sub_category_id'])['name']; ?></small></td>
            <td class="text-nowrap">
                <a href="post_detail.php?id=<?php echo $c['id']; ?>" class="btn btn-outline-primary btn-sm">
                    <i class="feather-eye fa-fw"></i>
                </a>
                <a href="post_delete.php?id=<?php echo $c['id']; ?>"
                   onclick="return confirm('Are U sure to delete. 😊')"
                   class="btn btn-outline-danger btn-sm">
                    <i class="feather-trash-2 fa-fw"></i>
                </a>
                <a href="post_edit.php?id=<?php echo $c['id']; ?>" class="btn btn-outline-info btn-sm">
                    <i class="feather-edit-2 fa-fw"></i>
                </a>
            </td>
            <td class="text-nowrap"><?php echo showTime($c['created_at']); ?></td>
        </tr>

    <?php
        }
        } ?>
    </tbody>
</table>

