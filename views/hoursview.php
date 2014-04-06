<?php require 'noticetempl.php';
function makePagesButtonActive($currentamount, $buttonamount) {
    if($currentamount === $buttonamount) {
        echo 'btn btn-primary';
    } else {
        echo 'btn btn-default';
    }
}?>
<div class="row tableelem">
Näytä kerralla:
<div class="btn-group">
    <a href="hours.php?pagenum=<?php echo $data->pagenum; ?>&entriesDisplayed=10" 
        class="<?php makePagesButtonActive($data->entriesOnPage, 10); ?>">
        10
    </a>
    <a href="hours.php?pagenum=<?php echo $data->pagenum; ?>&entriesDisplayed=20" 
        class="<?php makePagesButtonActive($data->entriesOnPage, 20); ?>">
        20
    </a>
    <a href="hours.php?pagenum=<?php echo $data->pagenum; ?>&entriesDisplayed=50" 
        class="<?php makePagesButtonActive($data->entriesOnPage, 50); ?>">
        50
    </a>
    <a href="hours.php?pagenum=<?php echo $data->pagenum; ?>&entriesDisplayed=100" 
        class="<?php makePagesButtonActive($data->entriesOnPage, 100); ?>">
        100
    </a>
</div>
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
                <a href="hours.php?pagenum=<?php echo $data->pagenum; ?>&entriesDisplayed=<?php echo $data->entriesDisplayed; ?>&edit=<?php echo $entry->getId(); ?>">Muokkaa</a>
            <td>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
<?php $destination = 'hours.php';
require 'pagenavigator.php'; ?>
</div>
