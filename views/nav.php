<?php
require_once 'libs/common.php';
require_once 'libs/models/kayttaja.php';

function makepillactive_pohja($currentpage, $thispage) {
    if($currentpage == $thispage) {
        echo ' class="active"';
    } else {
        echo'';
    }
}
?>

<?php if(!isLogged()): ?>
<nav class="navbar navbar-default" role="navigation">
    <ul class="nav nav-pills navbar-left">
        <li<?php makepillactive_pohja('index.php', $page);?>>
            <a href="#">Etusivu</a>
        </li>
    </ul>
    <ul class="nav nav-pills navbar-right">
        <li<?php makepillactive_pohja('loginform.php', $page);?>>
            <a href="#">Kirjaudu</a>
        </li>
        <li<?php makepillactive_pohja('signup.php', $page);?>>
            <a href="#">Rekisteröidy</a>
        </li>
    </ul>
</nav>
<?php else: 
        if(empty($data->user)) {
            $data->user = Kayttaja::getUserById($_SESSION['logged']);
        }?>
<nav class="navbar navbar-default" role="navigation">
    <ul class="navbar-left">
        <p>Kirjautuneena: </p>
    </ul>
    <ul class="nav nav-pills navbar-left">
        <li>
            <a href="#">
                <?php $data->user->echoUserFullName(); ?>
            </a>
        </li>
    </ul>
    <ul class="nav nav-pills navbar-right">
        <li>
            <a href="libs/dologout.php">
                Kirjaudu ulos
            </a>
        </li>
    </ul>
</nav>
<?php endif; ?>
