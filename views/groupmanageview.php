<?php require 'alerttempl.php'; ?>
<div class="rightelem">
    <p>Kutsu käyttäjä ryhmään:</p>
    <form class="form-inline" method="POST"
     action="groupmanagement.php?grpid="<?php echo $data->grpid;?>>
        <div class="row-fluid">
        <input type="text" class="form-control" name="invite"
         placeholder="Käyttäjän sähköposti">
        <button type="submit" class="btn btn-primary">
            Kutsu
        </button>
        </div>
    </form>
</div>
