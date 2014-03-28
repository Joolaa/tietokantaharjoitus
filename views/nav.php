<?php 
    $activepage = $page;
    function makepillactive_pohja($currentpage) {
        if($currentpage === $activepage)
            echo 'class="active"';
    }
?>

<nav class="navbar navbar-default" role="navigation">
    <ul class="nav nav-pills navbar-left">
        <li <?php makepillactive_pohja('index.php');?>>
            <a href="#">Etusivu</a>
        </li>
    </ul>
    <ul class="nav nav-pills navbar-right">
        <li <?php makepillactive_pohja('loginform.php');?>>
            <a href="#">Kirjaudu</a>
        </li>
        <li <?php makepillactive_pohja('signup.php');?>>
            <a href="#">Rekisteröidy</a>
        </li>
    </ul>
</nav>
