<?php

function dateDiff($date1, $date2 = false)
{   
    //date_default_timezone_set("Europe/Moscow");
    date_default_timezone_set("Asia/Dushanbe");

    $date_1 = new DateTime($date1);

    if($date2 == false) $date_2 = new DateTime;
    else $date_2 = new DateTime($date2);
    
    if($date_1 > $date_2) echo "Error Date!";

    $diff = $date_1->diff($date_2);

    if ($diff->days > 365) {
        return $date_1->format('Y-m-d');
    } elseif ($diff->days == 0 AND $diff->h < 12) {
        return $date_1->format('H:i A');
    } elseif ($diff->days == 0 AND $diff->h == 0 AND $diff->i >= 1 AND $diff->i < 60) {
        return $diff->i." min ago";
    } elseif ($diff->days == 0 AND $diff->h == 0 AND $diff->i == 0 AND $diff->s < 60) {
        return $diff->s." sec ago";
    } else return $date_1->format('M d');
}

function short_text($string, $length = 50)
{
    mb_internal_encoding('utf-8');

    $string = strip_tags($string);

    if (strlen($string) > $length) {
        $string = substr($string, 0, $length);
        $string.="...";
    }

    return $string;
}

function rand_color(){
    $colors = array("pink", "warning", "indigo", "brown", "danger", "info", "success", "secondary", "primary");
    $rand_keys = array_rand($colors, 2);
    return $colors[$rand_keys[0]];
}

function setActive($path)
{
    if(\Request::route()->getName() == $path) echo 'class=active';
}