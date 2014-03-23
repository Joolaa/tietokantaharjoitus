<?php

require_once "libs/tietokantayhteys.php";
require_once "libs/models/yhteiso.php";

$lista = Yhteiso::etsiKaikkiYhteisot();
?>
<!DOCTYPE HTML>
<html>
<head><title>Testi</title></head>
<body>
<table>
    <tr>
        <th>ID</th>
        <th>Nimi</th>
    </tr>
<?php foreach($lista as $yhteiso) { ?>
<tr>
<td><?php echo $yhteiso->getID(); ?></td>
<td><?php echo $yhteiso->getNimi()); ?></td>
</tr>
<?php } ?>
</table>
</body>
</html>

