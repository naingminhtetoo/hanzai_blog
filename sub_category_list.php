<div class="table-responsive">
    <table class="table table-hover table-sm mt-3 mb-0">
        <thead>
        <tr>
            <th>#</th>
            <th>Main Category</th>
            <th>Name</th>
            <th>Control</th>
            <th>Created</th>
        </tr>
        </thead>
        <tbody>

        <?php
        $i = 1;
        if(count(subCategories()) == 0 ){
            ?>
            <tr>
                <th colspan="5" class="text-center text-danger">
                    No data Found!
                </th>
            </tr>
            <?php
        }
        foreach (subCategories() as $c){
            if(category($c['category_id']) != null){

                ?>
                <tr class="">
                    <td><?php echo $i++; ?></td>
                    <td><?php echo category($c['category_id'])['name']; ?></td>
                    <td><?php echo $c['name']; ?></td>
                    <td>
                        <a href="sub_category_delete.php?id=<?php echo $c['id']; ?>"
                           onclick="return confirm('Are U sure to delete. 😊')"
                           class="btn btn-outline-danger btn-sm">
                            <i class="feather-trash-2 fa-fw"></i>
                        </a>
                        <a href="sub_category_edit.php?id=<?php echo $c['id']; ?>" class="btn btn-outline-warning btn-sm">
                            <i class="feather-edit-2 fa-fw"></i>
                        </a>
                    </td>
                    <td><?php echo showTime($c['created_at']); ?></td>
                </tr>

            <?php }

        }?>
        </tbody>
    </table>
</div>