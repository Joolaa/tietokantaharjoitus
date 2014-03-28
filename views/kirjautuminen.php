<!DOCTYPE html>
<html>
    <head>
        <title>Kirjautuminen</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="../css/bootstrap.css" rel="stylesheet">
        <link href="../css/bootstrap-theme.css" rel="stylesheet">
        <link href="../css/main.css" rel="stylesheet">
    </head>
    <body>
        <!-- VAROITUS sisältää vähän copypastea, en saanut SSI-systeemiä
        toimimaan-->
        <nav class="navbar navbar-default" role="navigation">
        <ul class="nav nav-pills navbar-left">
            <li><a href="index.html">Etusivu</a></li>
        </ul>
        <ul class="nav nav-pills navbar-right">
            <li class="active">
            <a href="kirjautuminen.html">Kirjaudu</a>
            </li>
            <li><a href="rekisteroityminen.html">Rekisteröidy</a></li>
        </ul>
        </nav>
        <div class="shiftedtext">
            <h1>Kirjaudu sisään</h1>
        </div>
        <div class="row">
            <div class="shiftedtext input-group input-group-lg">
                <span class="input-group-addon">Sähköposti:</span>
                <input type="text" class="form-control" 
                placeholder="Kirjoita tähän">
            </div>
        </div>
        <div class="row">
            <div class="shiftedtext input-group input-group-lg">
                <span class="input-group-addon">Salasana:</span>
                <input type="password" class="form-control" 
                placeholder="***********">
            </div>
        </div>
        <div class="row shiftedtext">
            <a href="profiili.html" class="btn btn-primary" role="login">
                Kirjaudu
            </a>
        </div>
    </body>
</html>
