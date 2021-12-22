<?php

function totalUser(){
    global $stmt;
    mysqli_stmt_prepare($stmt, "SELECT COUNT(id) FROM user");
    if(!mysqli_stmt_execute($stmt))
        exit(mysqli_stmt_error($stmt));

    mysqli_stmt_bind_result($stmt,$count);
    mysqli_stmt_fetch($stmt);
    return $count;
}
function totalStudents(){
    global $stmt;
    mysqli_stmt_prepare($stmt, "SELECT COUNT(studentID) FROM students");
    if(!mysqli_stmt_execute($stmt))
        exit(mysqli_stmt_error($stmt));

    mysqli_stmt_bind_result($stmt,$count);
    mysqli_stmt_fetch($stmt);
    return $count;
}

function totalCourses(){
    global $stmt;
    mysqli_stmt_prepare($stmt, "SELECT COUNT(courseID) FROM courses");
    if(!mysqli_stmt_execute($stmt))
        exit(mysqli_stmt_error($stmt));

    mysqli_stmt_bind_result($stmt,$count);
    mysqli_stmt_fetch($stmt);
    return $count;
}

function avgAgeUser(){
    global $stmt;
    mysqli_stmt_prepare($stmt, "SELECT AVG(age) FROM user");
    if(!mysqli_stmt_execute($stmt))
        exit(mysqli_stmt_error($stmt));

    mysqli_stmt_bind_result($stmt,$age);
    mysqli_stmt_fetch($stmt);
    return $age;
}
function avgAgeStudent(){
    global $stmt;
    mysqli_stmt_prepare($stmt, "SELECT AVG(age) FROM students");
    if(!mysqli_stmt_execute($stmt))
        exit(mysqli_stmt_error($stmt));

    mysqli_stmt_bind_result($stmt,$age);
    mysqli_stmt_fetch($stmt);
    return $age;
}

function getGender(){
    global $stmt;
    $countMale = 0;$countFemale=0;$countNeutral=0;
    mysqli_stmt_prepare($stmt, "SELECT gender FROM user");
    if (!mysqli_stmt_execute($stmt))
        exit(mysqli_stmt_error($stmt));

    $result = mysqli_stmt_get_result($stmt);
    while($row = $result->fetch_assoc()){
        if($row['gender'] == 'Male')
            $countMale++;
        else if($row['gender'] =='Female')
            $countFemale++;
        else
            $countNeutral++;
    }

    $genderArr = array($countMale,$countFemale,$countNeutral);
    return $genderArr;
}