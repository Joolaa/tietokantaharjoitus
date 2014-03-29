<?php if(!empty($data->error) && $data->error !== ''): ?>
    <div class="alert alert-danger">
        <?php echo $data->error; ?>
    </div>
<?php endif; ?>
