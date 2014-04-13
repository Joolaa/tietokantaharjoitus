<h1>Asetusten muuttaminen</h1>
<br><br>
<?php require 'alerttempl.php'; ?>
<?php require 'noticetempl.php'; ?>
<br>
<p>Sähköpostiosoitteen vaihtaminen</p>
<p>Anna salasana varmistaaksesi osoitteen vaihtamisen</p>
<form action="usersettings.php?email" method="POST"
    class="form-inline" role="form">
    <div class="row-fluid">
        <div class="form-group">
            <input type="password" class="form-control"
             placeholder="Salasana" name="password">
        </div>
    </div>
    <div class="row-fluid">
        <div class="form-group">
            <input type="text" class="form-control"
             placeholder="Uusi sähköposti" name="email">
        </div>
        <button type="submit" class="btn btn-primary">
            Vaihda
        </button>
    </div>
</form>
<br><br>
<p>Etunimen vaihtaminen</p>
<form action="usersettings.php?firstname" method="POST"
    class="form-inline" role="form">
    <div class="row-fluid">
        <div class="form-group">
            <input type="text" class="form-control"
             placeholder="Uusi etunimi" name="firstname">
        </div>
        <button type="submit" class="btn btn-primary">
            Vaihda
        </button>
    </div>
</form>
<br><br>
<p>Sukunimen vaihtaminen</p>
<form action="usersettings.php?lastname" method="POST"
    class="form-inline" role="form">
    <div class="row-fluid">
        <div class="form-group">
            <input type="text" class="form-control"
             placeholder="Uusi sukunimi" name="lastname">
        </div>
        <button type="submit" class="btn btn-primary">
            Vaihda
        </button>
    </div>
</form>
<br><br>
<p>Salasanan vaihtaminen</p>
<form action="usersettings.php?password" method="POST"
    role="form" class="form-inline">
    <div class="row-fluid">
        <div class="form-group">
            <input type="password" class="form-control"
             placeholder="Vanha salasana" name="oldpass">
        </div>
    </div>
    <div class="row-fluid">
        <div class="form-group">
            <input type="password" class="form-control"
             placeholder="Uusi salasana" name="newpass">
        </div>
    </div>
    <div class="row-fluid">
        <div class="form-group">
            <input type="password" class="form-control"
             placeholder="Uusi salasana uudestaan"
             name="newpassconfirm">
        </div>
    </div>
    <div class="row-fluid">
        <button type="submit" class="btn btn-primary">
            Vaihda
        </button>
    </div>
</form>
<br><br>
<p>Tilin poistaminen</p>
<p>Syötä salasanasi varmistaaksesi tilin poistaminen</p>
<form action="usersettings.php?delete" method="POST"
    role="form" class="form-inline">
    <div class="row-fluid">
        <div class="form-group">
            <input type="password" class="form-control"
             placeholder="Salasana" name="password">
        </div>
        <button type="submit" class="btn btn-danger">
            Poista tili
        </button>
    </div>
</form>
