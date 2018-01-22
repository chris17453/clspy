<?
require_once "clData.php";


if(!isset($_POST['search'])) {
    $search=false;
    $subSearch=false;
    $min        ="";
    $max        ="";
    $cat        ="";
    $year_min   ="";
    $year_max   ="";
    $locs2      ="";
    $type       ="";
} else {
    $search     =$_POST['search'];
    $subSearch  =$_POST['subSearch'];
    $min        =$_POST['min'];
    $max        =$_POST['max'];
    $cat        =$_POST['cat'];
    $year_min   =$_POST['year_min'];
    $year_max   =$_POST['year_max'];
    $locs2      =$_POST['locs2'];
    if(isset($_POST['type'])) $type=$_POST['type']; else $type=false;
    if($subSearch && trim($subSearch)=='') $subSearch=false;
}
$ch=false;

function getWeb($url){
    global $ch;
    if(!$ch) $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_URL, $url); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    curl_setopt($ch, CURLOPT_ENCODING,  '');
    curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4 );
    curl_setopt($ch, CURLOPT_USERAGENT,$_SERVER['HTTP_USER_AGENT']);
    $output = curl_exec($ch); 
    //curl_close($ch);   
    return $output;    
}

function pad($string,$len,$char=" "){
    $o=$string;
    for($a=strlen($string);$a<$len;$a++) $o.=$char;
    
    return $o;
}

if(!$locs2) {
    $locs2=array();
 //foreach($locs as $l) $locs2[$l->code]=false;   
}