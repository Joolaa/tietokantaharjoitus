<?php if(!empty($data->notice) && $data->notice !== ''): ?>
    <div class="alert alert-info">
        <?php echo $data->notice; ?>
    </div>
<?php endif; ?>
