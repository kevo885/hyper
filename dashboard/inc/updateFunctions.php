<?php
function validDate()
{
    $d = DateTime::createFromFormat('m/d/Y', $_POST['newDob']);
    return $d && $d->format('m/d/Y') == $_POST['newDob'];
}

function checkAge()
{
    global $newDob, $formatedDate;
    // gets age
    $newAge = date_diff(date_create($newDob), date_create('now'))->y;

    // prevent entering a dob greater than current day
    $currDate = date("Y-m-d");

    if(isset($_GET['studentID'])){
        if ($currDate < $formatedDate || $newAge < 14 || $newAge > 19)
        return True;
    else
        return False;
    }
    else{
        if ($currDate < $formatedDate || $newAge < 18 || $newAge > 65)
        return True;
    else
        return False;
    }
}

function dobPastEnrollemnt()
{
    $dob_no_year = date_create_from_format('m/d/Y', $_POST['newDob']);
    $checkDob = date_format($dob_no_year, 'm-d');
    $schoolStartDate = date("m-d", mktime(0, 0, 0, 9, 1, 0));

    if ($checkDob > $schoolStartDate)
        return True;
    else
        return False;
}
