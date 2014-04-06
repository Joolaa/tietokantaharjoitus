<form action="<?php echo $destination; ?>" method="POST">
    <?php require 'alerttempl.php'; ?>
    Alkuaika:<br>
    <div class="row">
        <div class="input-group input-group-sm" style="width:2em">
            <span class="input-group-addon"></span>
            <input type="text" class="form-control" 
             placeholder="pp" name="startday">
        </div>/
        <div class="input-group input-group-sm" style="width:2em">
            <span class="input-group-addon"></span>
            <input type="text" class="form-control" 
             placeholder="kk" name="startmonth">
        </div>/
        <div class="input-group input-group-sm" style="width:4em">
            <span class="input-group-addon"></span>
            <input type="text" class="form-control" 
             placeholder="pp" name="startyear">
        </div>
    </div>
    <div class="row">
        <div class="input-group input-group-sm" style="width:2em">
                <span class="input-group-addon"></span>
                <input type="text" class="form-control" 
                placeholder="tt" name="starthour">
        </div>:
        <div class="input-group input-group-sm" style="width:2em">
            <span class="input-group-addon"></span>
            <input type="text" class="form-control" 
             placeholder="mm" name="startminute">
        </div>
    </div>
    Loppuaika:<br>
    <div class="row">
        <div class="input-group input-group-sm" style="width:2em">
            <span class="input-group-addon"></span>
            <input type="text" class="form-control" 
             placeholder="pp" name="endday">
        </div>/
        <div class="input-group input-group-sm" style="width:2em">
            <span class="input-group-addon"></span>
            <input type="text" class="form-control" 
             placeholder="kk" name="endmonth">
        </div>/
        <div class="input-group input-group-sm" style="width:4em">
            <span class="input-group-addon"></span>
            <input type="text" class="form-control" 
             placeholder="pp" name="endyear">
        </div>
    </div>
    <div class="row">
        <div class="input-group input-group-sm" style="width:2em">
                <span class="input-group-addon"></span>
                <input type="text" class="form-control" 
                placeholder="tt" name="endhour">
        </div>:
        <div class="input-group input-group-sm" style="width:2em">
            <span class="input-group-addon"></span>
            <input type="text" class="form-control" 
             placeholder="mm" name="endminute">
        </div>
    </div>
    Aihe:<br>
    <div class="row">
        <div class="input-group input-group-sm">
            <span class="input-group-addon"></span>
            <input type="text" class="form-control" 
            placeholder="Aihe" name="topic">
    </div>
    <div class="row">
        <button type="submit" class="btn btn-primary" role="submit">
            Hyväksy
        </button>
    </div>
</form>
