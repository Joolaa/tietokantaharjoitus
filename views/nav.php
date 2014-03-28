<?php 
    function makepillactive_pohja($currentpage, $thispage) {
        global $page;
        if($currentpage == $thispage) {
            echo ' class="active"';
        } else {
            echo'';
        }
    }
?>

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
