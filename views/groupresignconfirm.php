<p>Vahvista ryhmästä eroaminen antamalla salasanasi</p>
<?php require 'alerttempl.php'; ?>
<form action="groupresign.php?grpid=<?php echo $data->grpid; ?>"  
    method="POST" class="form-inline">
    <div class="row-fluid">
        <div class="form-group">
            <input type="password" class="form-control"
             placeholder="********" name="password">
        </div>
    </div>
    <div class="row-fluid">
        <button type="submit" class="btn btn-danger">
            Eroa ryhmästä
        </button>
    </div>
</form>
