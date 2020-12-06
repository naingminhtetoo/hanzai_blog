</div>
<!-- /#page-content-wrapper -->

</div>

<span id="back-to-top">
    <i class="feather-chevron-up"></i>
</span>

<script src="<?php echo $url; ?>/vendor/jquery-3.3.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="<?php echo $url; ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo $url; ?>/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo $url; ?>/vendor/way_point/waypoint.js"></script>
<script src="<?php echo $url; ?>/vendor/counter_up/counter_up.js"></script>
<script src="<?php echo $url; ?>/vendor/data_table/jquery.dataTables.min.js"></script>
<script src="<?php echo $url; ?>/vendor/data_table/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo $url; ?>/vendor/summer_note/summernote.min.js"></script>
<script src="<?php echo $url; ?>/js/admin.js"></script>
<script src="<?php echo $url; ?>/js/dashboard.js"></script>
<script>
    $(".table").dataTable({
        "order": [[0, "asc" ]]
    });
    $('[data-toggle="popover"]').popover()
</script>