<?php require 'alerttempl.php'; ?>
<div class="rightelem">
    <p>Kutsu käyttäjä ryhmään:</p>
    <form class="form-inline" method="POST"
     action="groupmanagement.php?grpid="<?php echo $grpid;?>>
        <input type="text" class="form-control" name="invite"
         placeholder="Käyttäjän sähköposti">
    </form>
</div>
