<form method="POST" action="">
<p><select size="1" name="day">
<?php formDay(); ?>
</select>-
<select size="1" name="month">
<?php formMonth(); ?>
</select>-
<select size="1" name="year">
<?php formYear(); ?>
</select> <input type="submit" value="Submit"></p>
</form>

<?php
//functions to loop day,month,year
function formDay(){
    for($i=1; $i<=31; $i++){
        $selected = ($i==date('n'))? ' selected' :'';
        echo '<option'.$selected.' value="'.$i.'">'.$i.'</option>'."\n";
    }
}
//with the -8/+8 month, meaning june is center month
function formMonth(){
    $month = strtotime(date('Y').'-'.date('m').'-'.date('j').' - 8 months');
    $end = strtotime(date('Y').'-'.date('m').'-'.date('j').' + 8 months');
    while($month < $end){
        $selected = (date('F', $month)==date('F'))? ' selected' :'';
        echo '<option'.$selected.' value="'.date('F', $month).'">'.date('F', $month).'</option>'."\n";
        $month = strtotime("+1 month", $month);
    }
}

function formYear(){
    for($i=1980; $i<=date('Y'); $i++){
        $selected = ($i==date('Y'))? ' selected' :'';
        echo '<option'.$selected.' value="'.$i.'">'.$i.'</option>'."\n";
    }
}
?>