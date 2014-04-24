<?php require 'alerttempl.php'; ?>
<?php require 'noticetempl.php'; ?>
<div class="rightelem">
    <p>Kutsu käyttäjä ryhmään:</p>
    <form class="form-inline" method="POST"
     action="groupmanagement.php?grpid=<?php echo $data->grpid; ?>">
        <div class="row-fluid">
        <input type="text" class="form-control" name="invite"
         placeholder="Käyttäjän sähköposti">
        <button type="submit" class="btn btn-primary">
            Kutsu
        </button>
        </div>
    </form>
    <?php if(!empty($data->invitations)): ?>
    <p>Lähetetyt kutsut:</p>
    <table class="table">
        <?php foreach($data->invitations as $invite): ?>
        <tr>
            <td><?php echo $invite->getKayttaja(); ?></td>
            <td>
                <form action="groupmanagement.php?grpid=<?php echo $data->grpid; ?>" method="POST">
                    <input type="hidden" name="cancelsent" 
                     value="<?php echo $invite->getId(); ?>">
                    <button type="submit" class="btn btn-warning">
                        Peru
                    </button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <?php endif; ?>
</div>
