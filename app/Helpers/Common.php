<?php

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
