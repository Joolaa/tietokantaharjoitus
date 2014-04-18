<h1>Ryhmän luonti</h1>
<?php 
require 'alerttempl.php'; 
require 'noticetempl.php';?>
<p>Anna ryhmällesi nimi:</p><br>
<form action="../groupcreation.php" method="POST"
    class="form-inline" role="form">
    <div class="row-fluid">
        <input type="text" class="form-control"
            placeholder="Ryhmän nimi" name="grpname">
    </div>
    <div class="row">
        <button type="submit" class="btn btn-primary">
            Hyväksy
        </button>
    </div>
</form>
