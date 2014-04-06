<?php require 'noticetempl.php' ?>
<div class="row tableelem">
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
            <?php echoFormatHoursMins($entry->getTunteja()); ?>
            </td>
            <td>
            <?php echo $entry->getAihe(); ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
</div>
