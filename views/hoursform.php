<?php
$formdestination = $destination.'?pagenum='.$data->pagenum.'&entriesDisplayed='.$data->entriesPerPage;

if($data->adding) {
    $formdestination .= '&add';
} else if(isset($data->editId)) {
    $formdestination .= '&edit='.$data->editId;
}

$dflthours = $data->hoursdata;
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
             <?php issetEcho($dflthours,
              'value='.$dflthours->getStartDay());?>>
        </div> /
        <div class="form-group">
            <input type="text" size="2" class="form-control" 
             placeholder="kk" name="startmonth"
             <?php issetEcho($dflthours,
              'value='.$dflthours->getStartMonth());?>>

        </div> /
        <div class="form-group">
            <input type="text" size="4" class="form-control" 
             placeholder="yyyy" name="startyear"
             <?php issetEcho($dflthours,
              'value='.$dflthours->getStartYear());?>>
        </div>
    </div>
    <div class="row-fluid">
        <div class="form-group">
                <input type="text" size="2" class="form-control" 
                placeholder="tt" name="starthour"
                <?php issetEcho($dflthours,
                 'value='.$dflthours->getStartHour());?>>
        </div> :
        <div class="form-group">
            <input type="text" size="2" class="form-control" 
             placeholder="mm" name="startminute"
             <?php issetEcho($dflthours,
              'value='.$dflthours->getStartMinute());?>>
        </div>
    </div>
    Loppuaika:<br>
    <div class="row-fluid">
        <div class="form-group">
            <input type="text" size="2" class="form-control" 
             placeholder="pp" name="endday"
             <?php issetEcho($dflthours,
              'value='.$dflthours->getEndDay());?>>
        </div> /
        <div class="form-group">
            <input type="text" size="2" class="form-control" 
             placeholder="kk" name="endmonth"
             <?php issetEcho($dflthours,
              'value='.$dflthours->getEndMonth());?>>
        </div> /
        <div class="form-group">
            <input type="text" size="4" class="form-control" 
             placeholder="yyyy" name="endyear"
             <?php issetEcho($dflthours,
              'value='.$dflthours->getEndYear());?>>
        </div>
    </div>
    <div class="row-fluid">
        <div class="form-group">
                <input type="text" size="2" class="form-control" 
                placeholder="tt" name="endhour"
                <?php issetEcho($dflthours,
                 'value='.$dflthours->getEndHour());?>>
        </div> :
        <div class="form-group">
            <input type="text" size="2" class="form-control" 
             placeholder="mm" name="endminute"
             <?php issetEcho($dflthours,
              'value='.$dflthours->getEndMinute());?>>
        </div>
    </div>
    Aihe:<br>
    <div class="row-fluid">
        <div class="form-group">
            <input type="text" class="form-control" 
            placeholder="Aihe" name="topic"
             <?php issetEcho($dflthours,
              'value='.$dflthours->getAihe());?>>
        </div>
    </div>
    <div class="row">
        <button type="submit" class="btn btn-primary">
            Hyväksy
        </button>
    </div>
</form>
