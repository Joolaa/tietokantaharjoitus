<?php
function makePagesButtonActive($currentamount, $buttonamount) {
    if($currentamount === $buttonamount) {
        echo 'btn btn-primary';
    } else {
        echo 'btn btn-default';
    }
}
$destination = 'grouphoursofuser.php?grpid='.$data->grpid.'&usrid='.$data->usrid;
?>
    <a href="groupmanagement.php?grpid=<?php echo $data->grpid ?>"
     class="btn btn-primary">
        &#8592;Takaisin
    </a><br><br>
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
            <?php echoFormatHoursDecimal($entry->getTunteja()); ?>
            </td>
            <td>
            <?php echo $entry->getAihe(); ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
<?php require 'pagenavigator.php'; ?><br>
