<h1>Kirjaudu sisään.</h1>
<form action="login.php" method="POST">
    <?php require 'alerttempl.php'; ?>
    <div class="row" style="max-width:50%">
        <div class="input-group input-group-lg">
            <span class="input-group-addon">Sähköposti:</span>
            <input type="text" class="form-control" 
             placeholder="Kirjoita tähän" name="username"
             value="<?php echo $data->username ?>">
        </div>
    </div>
    <div class="row" style="max-width:50%">
        <div class="input-group input-group-lg">
            <span class="input-group-addon">Salasana:</span>
            <input type="password" class="form-control" 
             placeholder="***********" name="password">
        </div>
    </div>
    <div class="row">
        <button type="submit" class="btn btn-primary" role="login">
            Kirjaudu
        </button>
    </div>
</form>
