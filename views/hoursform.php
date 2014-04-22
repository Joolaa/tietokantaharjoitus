<?php
$formdestination = $destination.'?pagenum='.$data->pagenum.'&entriesDisplayed='.$data->entriesPerPage;

if($data->adding) {
    $formdestination .= '&add';
} else if(isset($data->editId)) {
    $formdestination .= '&edit='.$data->editId;
}

$dflthours = $data->hoursdata;

$dfltstartday = '';
$dfltstartmonth = '';
$dfltstartyear = '';
$dfltstarthour = '';
$dfltstartminute = '';
$dfltendday = '';
$dfltendmonth = '';
$dfltendyear = '';
$dfltendhour = '';
$dfltendminute = '';
$dflttopic = '';

if(!is_null($dflthours)) {
    $dfltstartday = 'value='.$dflthours->getStartDay();
    $dfltstartmonth = 'value='.$dflthours->getStartMonth();
    $dfltstartyear = 'value='.$dflthours->getStartYear();
    $dfltstarthour = 'value='.$dflthours->getStartHour();
    $dfltstartminute = 'value='.$dflthours->getStartMinute();
    $dfltendday = 'value='.$dflthours->getEndDay();
    $dfltendmonth = 'value='.$dflthours->getEndMonth();
    $dfltendyear = 'value='.$dflthours->getEndYear();
    $dfltendhour = 'value='.$dflthours->getEndHour();
    $dfltendminute = 'value='.$dflthours->getEndMinute();
    $dflttopic = 'value='.$dflthours->getAihe;
}
?>
<form action="<?php echo $formdestination; ?>" method="POST" 
    class="form-inline" role="form">
    Ryhmä:<br>
    <div class="row-fluid">
        <select class="form-control" name="group">
            <?php foreach($data->groups as $group): ?>
            <option value="<?php echo $group->getId(); ?>" <?php issetEcho($data->editId === $group->getId(), 'selected'); ?>><?php echo $group->getNimi(); ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    Alkuaika:<br>
    <div class="row-fluid">
        <div class="form-group">
            <input type="text" size="2" class="form-control" 
             placeholder="pp" name="startday"
             <?php echo $dfltstartday;?>>
        </div> /
        <div class="form-group">
            <input type="text" size="2" class="form-control" 
             placeholder="kk" name="startmonth"
             <?php echo $dfltstartmonth;?>>

        </div> /
        <div class="form-group">
            <input type="text" size="4" class="form-control" 
             placeholder="yyyy" name="startyear"
             <?php echo $dfltstartyear;?>>
        </div>
    </div>
    <div class="row-fluid">
        <div class="form-group">
                <input type="text" size="2" class="form-control" 
                placeholder="tt" name="starthour"
                <?php echo $dfltstarthour;?>>
        </div> :
        <div class="form-group">
            <input type="text" size="2" class="form-control" 
             placeholder="mm" name="startminute"
             <?php echo $dfltstartminute;?>>
        </div>
    </div>
    Loppuaika:<br>
    <div class="row-fluid">
        <div class="form-group">
            <input type="text" size="2" class="form-control" 
             placeholder="pp" name="endday"
             <?php echo $dfltendday;?>>
        </div> /
        <div class="form-group">
            <input type="text" size="2" class="form-control" 
             placeholder="kk" name="endmonth"
             <?php echo $dfltendmonth;?>>
        </div> /
        <div class="form-group">
            <input type="text" size="4" class="form-control" 
             placeholder="yyyy" name="endyear"
             <?php echo $dfltendyear;?>>
        </div>
    </div>
    <div class="row-fluid">
        <div class="form-group">
                <input type="text" size="2" class="form-control" 
                placeholder="tt" name="endhour"
                <?php echo $dfltendhour;?>>
        </div> :
        <div class="form-group">
            <input type="text" size="2" class="form-control" 
             placeholder="mm" name="endminute"
             <?php echo $dfltendminute;?>>
        </div>
    </div>
    Aihe:<br>
    <div class="row-fluid">
        <div class="form-group">
            <input type="text" class="form-control" 
            placeholder="Aihe" name="topic"
             <?php echo $dflttopic;?>>
        </div>
    </div>
    <div class="row">
        <button type="submit" class="btn btn-primary">
            Hyväksy
        </button>
    </div>
</form>
