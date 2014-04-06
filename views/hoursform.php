<form action="<?php echo $destination; ?>" method="POST" 
    class="form-inline" role="form">
    <?php require 'alerttempl.php'; ?>
    Alkuaika:<br>
    <div class="row-fluid">
        <div class="form-group" style="max-width:3em">
            <input type="text" class="form-control" 
             placeholder="pp" name="startday">
        </div>/
        <div class="form-group" style="max-width:3em">
            <input type="text" class="form-control" 
             placeholder="kk" name="startmonth">
        </div>/
        <div class="form-group" style="max-width:5em">
            <input type="text" class="form-control" 
             placeholder="yyyy" name="startyear">
        </div>
    </div>
    <div class="row-fluid">
        <div class="form-group" style="max-width:3em">
                <input type="text" class="form-control" 
                placeholder="tt" name="starthour">
        </div>:
        <div class="form-group" style="max-width:3em">
            <input type="text" class="form-control" 
             placeholder="mm" name="startminute">
        </div>
    </div>
    Loppuaika:<br>
    <div class="row-fluid">
        <div class="form-group" style="max-width:3em">
            <input type="text" class="form-control" 
             placeholder="pp" name="endday">
        </div>/
        <div class="form-group" style="max-width:3em">
            <input type="text" class="form-control" 
             placeholder="kk" name="endmonth">
        </div>/
        <div class="form-group" style="max-width:5em">
            <input type="text" class="form-control" 
             placeholder="yyyy" name="endyear">
        </div>
    </div>
    <div class="row-fluid">
        <div class="form-group" style="max-width:3em">
                <input type="text" class="form-control" 
                placeholder="tt" name="endhour">
        </div>:
        <div class="form-group" style="max-width:3em">
            <input type="text" class="form-control" 
             placeholder="mm" name="endminute">
        </div>
    </div>
    Aihe:<br>
    <div class="row-fluid">
        <div class="form-group">
            <input type="text" class="form-control" 
            placeholder="Aihe" name="topic">
        </div>
    </div>
    <div class="row-fluid">
        <button type="submit" class="btn btn-primary">
            Hyväksy
        </button>
    </div>
</form>
