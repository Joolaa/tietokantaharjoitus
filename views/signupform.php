<h1>Rekisteröidy</h1>
<form action="signup.php" method="POST">
    <?php require 'alerttempl.php'; ?>
    <div class="row" style="max-width:50%">
        <div class="input-group">
            <span class="input-group-addon">Sähköposti:</span>
            <input type="text" class="form-control"
             name="email">
        </div>
    </div>
    <div class="row" style="max-width:50%">
        <div class="input-group">
            <span class="input-group-addon">Salasana:</span>
            <input type="password" class="form-control"
             name="password">
        </div>
    </div>
    <div class="row" style="max-width:50%">
        <div class="input-group">
            <span class="input-group-addon">Salasana uudestaan:</span>
            <input type="password" class="form-control"
             name="passwordconfirm">
        </div>
    </div>
    <div class="row" style="max-width:50%">
        <div class="input-group">
            <span class="input-group-addon">Etunimi:</span>
            <input type="text" class="form-control"
             name="firstname">
        </div>
    </div>
    <div class="row" style="max-width:50%">
        <div class="input-group">
            <span class="input-group-addon">Sukunimi:</span>
            <input type="text" class="form-control"
             name="lastname">
        </div>
    </div>
    <div class="row">
        <button type="submit" class="btn btn-primary" role="signup">
            Rekisteröidy
        </button>
    </div>
</form>
