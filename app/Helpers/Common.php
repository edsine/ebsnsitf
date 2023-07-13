<?php

use Illuminate\Support\Facades\Auth;

function getBranchRegions()
{
    $regions = [
        '' => 'Select Branch Region',
        1 => 'Abuja',
        2 => 'Bauchi',
        3 => 'Benue',
        4 => 'Borno',
        5 => 'Cross River',
        6 => 'Delta',
        7 => 'Ebonyi',
        8 => 'Edo',
        9 => 'Enugu',
        10 => 'Gombe',
        11 => 'Imo',
        12 => 'Jigawa',
        13 => 'Kaduna',
        14 => 'Kano',
        15 => 'Katsina',
        16 => 'Kebbi',
        17 => 'Kogi',
        18 => 'Kwara',
        19 => 'Lagos',
        20 => 'Nassarawa',
        21 => 'Niger',
        22 => 'Ogun',
        23 => 'Ondo',
        24 => 'Osun',
        25 => 'Oyo',
        26 => 'Plateau',
        27 => 'Rivers',
        28 => 'Sokoto',
        29 => 'Taraba',
        30 => 'Yobe',
    ];
    return $regions;
}



function leave_type()
{
    $types = [
        '' => 'Select Leave with Pay',
        1 => 'vacation',
        2 => 'casual',
        2 => 'Examination',
        3=>'Sick leave',
        4=>'Maternity',
        5=>'Paternity',
        6=>'Study Leave without Pay',
        7=>'Study Leave with Pay',
        8=> 'Leave to Attend Sporting Event',
        9=>'Speacial Leave For pilgrimage',
        10=>'Speacial Leave for Proffessional Activities',
        11=>'Leave to Attend sporting Event',
        12=>'Compassionate Leave',
        13=> 'Leave of Abscence'
       
    ];
    return $types;
}


function getRanks()
{
    $regions = [
        '' => 'Select Highest Rank',
        1 => 'Managing Director',
        2 => 'Executive Directors',
        3 => 'General Managers',
        4 => 'Deputy General Managers',
        5 => 'Assistant General Managers',
        6 => 'Principal Managers',
        7 => 'Senior Managers',
        8 => 'Managers',
        9 => 'Assistant Managers',
        10 => 'Senior Officers',
        11 => 'Officers',
        12 => 'Junior Officers',
    ];
    return $regions;
}

function checkPermission($permission)
{
    $user = Auth::user();
    if($user->can($permission))
    {
        return true;
    }
    return false;
}
