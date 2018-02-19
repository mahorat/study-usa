<?php 

namespace App\Helpers;

class Helpers
{
	
	public static function dateDiff($date1, $date2 = false)
	{   
	    date_default_timezone_set("Asia/Dushanbe");

	    $date_1 = new \DateTime($date1);

	    if($date2 == false) $date_2 = new \DateTime;

	    else $date_2 = new \DateTime($date2);

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

	public static function short_text($string, $length = 50)
	{
	    mb_internal_encoding('utf-8');

	    $string = strip_tags($string);

	    if (strlen($string) > $length) {
	        $string = substr($string, 0, $length);
	        $string.="...";
	    }

	    return $string;
	}

	public static function rand_color(){
	    $colors = array("warning", "indigo", "brown", "danger", "info", "success", "secondary", "primary");
	    $rand_keys = array_rand($colors, 2);
	    return $colors[$rand_keys[0]];
	}

	public static function setActive($path)
	{
	    if(\Request::route()->getName() == $path) echo 'class=active';
	}

	public static function js_str($s)
    {
        return "'" . addcslashes($s, "\0..\37\"\\") . "'";
    }

    public static function js_array($array)
    {
        $temp = array_map('self::js_str', $array);
        return '[' . implode(',', $temp) . ']';
    }

    public static function to_js_array($array, $filename="email-autocomplete.js")
    {
        mb_internal_encoding("UTF-8");
        $array = "$('#inputEmail1').textcomplete([{ words: ".Helpers::js_array($array).", match: /(^|[^\wа-яё])([\wа-яё]{2,})$/i, search: function (term, callback) {callback($.map(this.words, function (word) {return word.indexOf(term) === 0 ? word : null;}));}, index: 2, replace: function (word) {return '$1' + word + ' ';}}]);";
        $path1 = "resources/views/layouts/inbox/jetson/includes/";
        $path2 = "assets-inbox/dist/js/";
        $path2.=$filename;
        file_put_contents($path2, $array);
        $path1.=$filename;
        return file_put_contents($path1, $array);
    }
}