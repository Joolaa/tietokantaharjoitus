<?php if($data->amountOfPages > 1): ?>
<ul class="pagination">
    <?php if($data->pagenum > 1): ?>
    <li><a href="<?php echo $destination; ?>?pagenum=<?php echo $data->pagenum-1; ?>&entriesOnPage=<?php echo $data->entriesOnPage; ?>">&laquo</a></li>
    <?php else: ?>
    <li class="disabled">&laquo</li>
    <?php endif; ?>

    <?php for($i = 1; $i <=amountOfPages; $i++): ?>
    <?php if($i === $data->pagenum): ?>
    <li class="active"><a href="<?php echo $destination; ?>?pagenum=<?php echo $i; ?>&entriesOnPage=<?php echo $data->entriesOnPage; ?>"><?php echo $i; ?></a></li>
    <?php else: ?>
    <li><a href="<?php echo $destination; ?>?pagenum=<?php echo $i; ?>&entriesOnPage=<?php echo $data->entriesOnPage; ?>"><?php echo $i; ?></a></li>
    <?php endif; ?>
    <?php endfor; ?>

    <?php if($data->pagenum < $data->amountOfPages): ?>
    <li><a href="<?php echo $destination; ?>?pagenum=<?php echo $data->page+1; ?>&entriesOnPage=<?php echo $data->entriesOnPage; ?>">&raquo</a></li>
    <?php else: ?>
    <li class="disabled">&raquo</li>
    <?php endif; ?>
</ul>
<?php endif; ?>
