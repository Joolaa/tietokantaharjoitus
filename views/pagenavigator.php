<?php if($data->amountOfPages > 1): ?>
<ul class="pagination">
    <?php if($data->page > 1): ?>
    <li><a href="<?php echo $destination; ?>?page=<?php echo $data->page-1; ?>">&laquo</a></li>
    <?php else: ?>
    <li class="disabled">&laquo</li>
    <?php endif; ?>

    <?php for($i = 1; $i <=amountOfPages; $i++): ?>
    <?php if($i === $data->page): ?>
    <li class="active"><a href="<?php echo $destination; ?>?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
    <?php else: ?>
    <li><a href="<?php echo $destination; ?>?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
    <?php endif; ?>
    <?php endfor; ?>

    <?php if($data->page < $data->amountOfPages): ?>
    <li><a href="<?php echo $destination; ?>?page=<?php echo $data->page+1; ?>">&raquo</a></li>
    <?php else: ?>
    <li class="disabled">&raquo</li>
    <?php endif; ?>
</ul>
<?php endif; ?>
