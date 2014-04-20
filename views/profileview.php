<div class="leftelem">
<?php if(empty($data->memberships) && empty($data->supervisorships)):?>
    <p>Et ole minkään ryhmän jäsen.</p>
<?php else: ?> 
    <table class="table">
<?php foreach($data->supervisorships as $sprvsrship): ?>
        <tr>
        <td><?php echo $sprvsrship->getNimi() ?></td>
        <td><a class="btn btn-primary">Hallinnoi</a></td>
        <td><a class="btn btn-danger">Eroa</a></td>
        </tr>
<?php endforeach;
foreach($data->memberships as $mbrship):?>
        <tr>
        <td><?php echo $mbrship->getNimi() ?></td>
        <td><a class="btn btn-danger">Eroa</a></td>
        <td></td>
        </tr>
<?php endforeach; ?>
    </table>
<?php endif; ?>
    <a href= "groupcreation.php" class="btn btn-primary">
        Ryhmän luonti
    </a>
</div>
<div class="rightelem">
    <a class="btn btn-primary" href="../hours.php">
        Tarkastele työtunteja
    </a>
</div>
