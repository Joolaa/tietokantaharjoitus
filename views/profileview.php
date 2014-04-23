<div class="leftelem">
<?php if(!empty($invitations)): ?>
    <p>Kutsut:</p>
    <table class="table">
<?php foreach($invitations as $invite): ?>
        <tr>
            <td><?php echo $invite->getNimi(); ?></td>
            <td><a class="btn btn-primary">Hyväksy</a></td>
            <td><a class="btn btn-warning">Hylkää</a></td>
        </tr>
<?php endforeach; ?>
    </table>
<?php endif; ?>
<?php if(empty($data->memberships) && empty($data->supervisorships)):?>
    <p>Et ole minkään ryhmän jäsen.</p>
<?php else: ?> 
    <p>Jäsenyydet</p>
    <table class="table">
<?php foreach($data->supervisorships as $sprvsrship): ?>
        <tr>
        <td><?php echo $sprvsrship->getNimiEncoded() ?></td>
        <td><a href="groupmanagement.php?grpid=<?php echo $sprvsrship->getId(); ?>"class="btn btn-primary">Hallinnoi</a></td>
        <td><a href="groupresign.php?grpid=<?php echo $sprvsrship->getId(); ?>"
             class="btn btn-danger">Eroa</a></td>
        </tr>
<?php endforeach;
foreach($data->memberships as $mbrship):?>
        <tr>
        <td><?php echo $mbrship->getNimiEncoded() ?></td>
        <td><a href="groupresign.php?grpid=<?php echo $mbrship->getId(); ?>" 
            class="btn btn-danger">Eroa</a></td>
        <td></td>
        </tr>
<?php endforeach; ?>
    </table>
<?php endif; ?>
    <a href="groupcreation.php" class="btn btn-primary">
        Ryhmän luonti
    </a>
</div>
<div class="rightelem">
    <a class="btn btn-primary" href="../hours.php">
        Tarkastele työtunteja
    </a>
</div>
