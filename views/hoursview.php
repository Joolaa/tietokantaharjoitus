<?php require 'noticetempl.php';
function makePagesButtonActive($currentamount, $buttonamount) {
    if($currentamount === $buttonamount) {
        echo 'btn btn-primary';
    } else {
        echo 'btn btn-default';
    }
}
$destination = 'hours.php';
?>
<div class="row tableelem">
Näytä kerralla:
<div class="btn-group">
    <a href="<?php echo $destination.'?pagenum='.$data->pagenum.'&entriesDisplayed=10'; ?>" 
        class="<?php makePagesButtonActive($data->entriesPerPage, 10); ?>">
        10
    </a>
    <a href="<?php echo $destination.'?pagenum='.$data->pagenum.'&entriesDisplayed=20'; ?>" 
        class="<?php makePagesButtonActive($data->entriesPerPage, 20); ?>">
        20
    </a>
    <a href="<?php echo $destination.'?pagenum='.$data->pagenum.'&entriesDisplayed=50'; ?>" 
        class="<?php makePagesButtonActive($data->entriesPerPage, 50); ?>">
        50
    </a>
    <a href="<?php echo $destination.'?pagenum='.$data->pagenum.'&entriesDisplayed=100'; ?>" 
        class="<?php makePagesButtonActive($data->entriesPerPage, 100); ?>">
        100
    </a>
</div><br>
<div class="panel panel-default">
    <div class="panel-heading">Kirjatut työtunnit:</div>
    <table class="table">
        <tr>
            <th>Mistä?</th>
            <th>Mihin?</th>
            <th>Tunteja</th>
            <th>Aihe</th>
            <th>Muokkaa</th>
        </tr>
        <?php foreach($data->entriesOnPage as $entry): ?>
        <tr>
            <td>
            <?php echoFormatDateFinnish($entry->getAlkuaika()); ?>
            </td>
            <td>
            <?php echoFormatDateFinnish($entry->getLoppuaika()); ?>
            </td>
            <td>
            <?php echoFormatHoursMins($entry->getTunteja()); ?>
            </td>
            <td>
            <?php echo $entry->getAihe(); ?>
            </td>
            <td>
            <a href="<?php echo $destination.'?pagenum='.$data->pagenum.'&entriesDisplayed='.$data->entriesPerPage.'&edit='.$entry->getId(); ?>">Muokkaa</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
<?php require 'pagenavigator.php'; ?><br>
<?php if(!is_null($data->editId)): ?>
<a class="btn btn-danger" href="<?php echo $destination.'?pagenum='.$data->pagenum.'&entriesDisplayed='.$data->entriesPerPage.'&delete='.$data->editId; ?>">Poista</a>
<a class="btn btn-primary" href="<?php echo $destination.'?pagenum='.$data->pagenum.'&entriesDisplayed='.$data->entriesPerPage; ?>">Peruuta</a>
<?php elseif($data->adding):
require "hoursform.php"; ?>
<div class=row>
<a class="btn btn-primary" href="<?php echo $destination.'?pagenum='.$data->pagenum.'&entriesDisplayed='.$data->entriesPerPage; ?>">Peruuta</a>
</div>
<?php else: ?>
<a class="btn btn-primary" href="<?php echo $destination.'?pagenum='.$data->pagenum.'&entriesDisplayed='.$data->entriesPerPage.'&add'; ?>">Lisää uusi</a>
<?php endif; ?>
</div>
