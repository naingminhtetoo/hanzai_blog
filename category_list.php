<table class="table table-hover mt-3 mb-0">
    <thead>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Control</th>
        <th>Created</th>
    </tr>
    </thead>
    <tbody>

    <?php
    $i = 1;
    foreach (categories() as $c){
        ?>
        <tr class="">
            <td><?php echo $i++; ?></td>
            <td><?php echo $c['name']; ?></td>
            <td>
                <a href="category_delete.php?id=<?php echo $c['id']; ?>"
                   onclick="return confirm('Are U sure to delete. 😊')"
                   class="btn btn-outline-danger btn-sm">
                    <i class="feather-trash-2 fa-fw"></i>
                </a>
                <a href="category_edit.php?id=<?php echo $c['id']; ?>" class="btn btn-outline-warning btn-sm">
                    <i class="feather-edit-2 fa-fw"></i>
                </a>

            </td>
            <td><?php echo showTime($c['created_at']); ?></td>
        </tr>

    <?php } ?>
    </tbody>
</table>