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

<?php if(empty($data->user) || !isLogged($data->user)): ?>
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
<?php else: ?>
<nav class="navbar navbar-default" role="navigation">
    <ul class="navbar-left">
        <p>Kirjautuneena: </p>
    </ul>
    <ul class="nav nav-pills navbar-left">
        <li>
            <a href="#">
                <?php $data->user->echoUserFullName() ?>
            </a>
        </li>
    </ul>
    <ul class="nav nav-pills navbar-right">
        <form action="libs/dologout.php" method="post">
            <button type="submit">
                Kirjaudu ulos
                <input name="logout" value="<?php $data->user->getId() ?>">
            </button>
        </form>
    </ul>
</nav>
<?php endif; ?>
