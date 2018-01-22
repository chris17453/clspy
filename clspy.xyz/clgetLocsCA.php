<?
                                                   


$g[]=array("url"=>"geo.craigslist.org/iso/ca/ON","groupDisplay"=>"Ontario");
$g[]=array("url"=>"geo.craigslist.org/iso/ca/QC","groupDisplay"=>"Qbeck");
$g[]=array("url"=>"geo.craigslist.org/iso/ca/NS","groupDisplay"=>"Nova Scotia");
$g[]=array("url"=>"geo.craigslist.org/iso/ca/NB","groupDisplay"=>"New Brunswick");
$g[]=array("url"=>"geo.craigslist.org/iso/ca/MB","groupDisplay"=>"Manitoba");
$g[]=array("url"=>"geo.craigslist.org/iso/ca/BC","groupDisplay"=>"Brittish Columbia");
$g[]=array("url"=>"geo.craigslist.org/iso/ca/PE","groupDisplay"=>"Prince Edward Island");
$g[]=array("url"=>"geo.craigslist.org/iso/ca/SK","groupDisplay"=>"Saskatchewan");
$g[]=array("url"=>"geo.craigslist.org/iso/ca/AB","groupDisplay"=>"Alberta");
$g[]=array("url"=>"geo.craigslist.org/iso/ca/NL","groupDisplay"=>"Newfoundland");



function getWeb($url){
    global $ch;
    if(!$ch) $ch = curl_init(); 
    
    curl_setopt($ch, CURLOPT_URL, $url); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    curl_setopt($ch, CURLOPT_ENCODING,  '');
    curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4 );

    $output = curl_exec($ch); 
    //curl_close($ch);   
    return $output;    
}

$regexp = "<a\s[^>]*href=(\"??)([^\" >]*?)\\1[^>]*>(.*)<\/a>";
    


foreach($g as $k=>$i) {
    $g[$k]['code']=substr($i['url'],-2);
     $g[$k]['sub']=array();
    $o=getWeb($i['url']);
    $o=explode("<blockquote>",$o,2);
    $o=explode("</blockquote>",$o[1],2);
    if(preg_match_all("/$regexp/siU", $o[0], $matches, PREG_SET_ORDER)) {
        $g[$k]['sub']=$matches;
    }
}

foreach($g as $k=>$i) {
    foreach($i['sub'] as $c){
        $tokens=explode(".craigslist",$c[2]);
        $locCode=substr($tokens[0],2);
        $locs[$locCode]['name']=$locCode;
        $locs[$locCode]['display']=trim($c[3]);
        $locs[$locCode]['states'][$i['code']]=$i['groupDisplay'];
        //echo "*".$locs[$locCode]['display']."*";
        if(false===strpos($locs[$locCode]['display'],"<b>")) $locs[$locCode]['type']='minor';
        else                   {
            $locs[$locCode]['display']=str_replace("<b>","",$locs[$locCode]['display']);
            $locs[$locCode]['display']=str_replace("</b>","",$locs[$locCode]['display']);
          $locs[$locCode]['type']='major';
        }
    }
    if(count($i['sub'])==0) {
        $locCode=$i['code'];
        $locs[$locCode]['name']=$locCode;
        $locs[$locCode]['display']=$i['groupDisplay'];
        $locs[$locCode]['states'][$i['code']]=$i['groupDisplay'];
        $locs[$locCode]['type']='solo';
    }
}

function pad($string,$len){
    $o=$string;
    for($a=strlen($string);$a<$len;$a++) $o.=" ";
    
    return $o;
}


$statesCoord = [
    'AL' => ['lat' => 32.6010112, 'lng' => -86.6807365],
    'AK' => ['lat' => 61.3025006, 'lng' => -158.7750198],
    'AZ' => ['lat' => 34.1682185, 'lng' => -111.930907],
    'AR' => ['lat' => 34.7519275, 'lng' => -92.1313784],
    'CA' => ['lat' => 37.2718745, 'lng' => -119.2704153],
    'CO' => ['lat' => 38.9979339, 'lng' => -105.550567],
    'CT' => ['lat' => 41.5187835, 'lng' => -72.757507],
    'DE' => ['lat' => 39.145251, 'lng' => -75.4189206],
    'DC' => ['lat' => 38.8993487, 'lng' => -77.0145666],
    'FL' => ['lat' => 27.9757279, 'lng' => -83.8330166],
    'GA' => ['lat' => 32.6781248, 'lng' => -83.2229757],
    'HI' => ['lat' => 20.46, 'lng' => -157.505],
    'ID' => ['lat' => 45.4945756, 'lng' => -114.1424303],
    'IL' => ['lat' => 39.739318, 'lng' => -89.504139],
    'IN' => ['lat' => 39.7662195, 'lng' => -86.441277],
    'IA' => ['lat' => 41.9383166, 'lng' => -93.389798],
    'KS' => ['lat' => 38.4987789, 'lng' => -98.3200779],
    'KY' => ['lat' => 37.8222935, 'lng' => -85.7682399],
    'LA' => ['lat' => 30.9733766, 'lng' => -91.4299097],
    'ME' => ['lat' => 45.2185133, 'lng' => -69.0148656],
    'MD' => ['lat' => 38.8063524, 'lng' => -77.2684162],
    'MA' => ['lat' => 42.0629398, 'lng' => -71.718067],
    'MI' => ['lat' => 44.9435598, 'lng' => -86.4158049],
    'MN' => ['lat' => 46.4418595, 'lng' => -93.3655146],
    'MS' => ['lat' => 32.5851062, 'lng' => -89.8772196],
    'MO' => ['lat' => 38.3046615, 'lng' => -92.437099],
    'MT' => ['lat' => 46.6797995, 'lng' => -110.044783],
    'NE' => ['lat' => 41.5008195, 'lng' => -99.680902],
    'NV' => ['lat' => 38.502032, 'lng' => -117.0230604],
    'NH' => ['lat' => 44.0012306, 'lng' => -71.5799231],
    'NJ' => ['lat' => 40.1430058, 'lng' => -74.7311156],
    'NM' => ['lat' => 34.1662325, 'lng' => -106.0260685],
    'NY' => ['lat' => 40.7056258, 'lng' => -73.97968],
    'NC' => ['lat' => 35.2145629, 'lng' => -79.8912675],
    'ND' => ['lat' => 47.4678819, 'lng' => -100.3022655],
    'OH' => ['lat' => 40.1903624, 'lng' => -82.6692525],
    'OK' => ['lat' => 35.3097654, 'lng' => -98.7165585],
    'OR' => ['lat' => 44.1419049, 'lng' => -120.5380993],
    'PA' => ['lat' => 40.9945928, 'lng' => -77.6046984],
    'RI' => ['lat' => 41.5827282, 'lng' => -71.5064508],
    'SC' => ['lat' => 33.62505, 'lng' => -80.9470381],
    'SD' => ['lat' => 44.2126995, 'lng' => -100.2471641],
    'TN' => ['lat' => 35.830521, 'lng' => -85.9785989],
    'TX' => ['lat' => 31.1693363, 'lng' => -100.0768425],
    'UT' => ['lat' => 39.4997605, 'lng' => -111.547028],
    'VT' => ['lat' => 43.8717545, 'lng' => -72.4477828],
    'VA' => ['lat' => 38.0033855, 'lng' => -79.4587861],
    'WA' => ['lat' => 38.8993487, 'lng' => -77.0145665],
    'WV' => ['lat' => 38.9201705, 'lng' => -80.1816905],
    'WI' => ['lat' => 44.7862968, 'lng' => -89.8267049],
    'WY' => ['lat' => 43.000325, 'lng' => -107.5545669],
];

$states = array(
'Alabama'=>'AL',
'Alaska'=>'AK',
'Arizona'=>'AZ',
'Arkansas'=>'AR',
'California'=>'CA',
'Colorado'=>'CO',
'Connecticut'=>'CT',
'Delaware'=>'DE',
'Florida'=>'FL',
'Georgia'=>'GA',
'Hawaii'=>'HI',
'Idaho'=>'ID',
'Illinois'=>'IL',
'Indiana'=>'IN',
'Iowa'=>'IA',
'Kansas'=>'KS',
'Kentucky'=>'KY',
'Louisiana'=>'LA',
'Maine'=>'ME',
'Maryland'=>'MD',
'Massachusetts'=>'MA',
'Michigan'=>'MI',
'Minnesota'=>'MN',
'Mississippi'=>'MS',
'Missouri'=>'MO',
'Montana'=>'MT',
'Nebraska'=>'NE',
'Nevada'=>'NV',
'New Hampshire'=>'NH',
'New Jersey'=>'NJ',
'New Mexico'=>'NM',
'New York'=>'NY',
'North Carolina'=>'NC',
'North Dakota'=>'ND',
'Ohio'=>'OH',
'Oklahoma'=>'OK',
'Oregon'=>'OR',
'Pennsylvania'=>'PA',
'Rhode Island'=>'RI',
'South Carolina'=>'SC',
'South Dakota'=>'SD',
'Tennessee'=>'TN',
'Texas'=>'TX',
'Utah'=>'UT',
'Vermont'=>'VT',
'Virginia'=>'VA',
'Washington'=>'WA',
'West Virginia'=>'WV',
'Wisconsin'=>'WI',
'Wyoming'=>'WY'
);

$Regions[]=array('name'=>'I',' Connecticut',' Maine',' Massachusetts',' New Hampshire',' Rhode Island',' Vermont');
$Regions[]=array('name'=>'II',' New Jersey',' New York',' Puerto Rico',' US Virgin Islands');
$Regions[]=array('name'=>'III',' Delaware',' District of Columbia',' Maryland',' Pennsylvania',' Virginia',' West Virginia');
$Regions[]=array('name'=>'IV',' Alabama',' Florida',' Georgia',' Kentucky',' Mississippi',' North Carolina',' South Carolina',' Tennessee');
$Regions[]=array('name'=>'V',' Illinois',' Indiana',' Michigan',' Minnesota',' Ohio',' Wisconsin');
$Regions[]=array('name'=>'VI',' Arkansas',' Louisiana',' New Mexico',' Oklahoma',' Texas');
$Regions[]=array('name'=>'VII',' Iowa',' Kansas',' Missouri',' Nebraska');
$Regions[]=array('name'=>'VIII',' Colorado',' Montana',' North Dakota',' South Dakota',' Utah',' Wyoming');
$Regions[]=array('name'=>'IX','Arizona',' California',' Hawaii',' Nevada',' American Samoa',' Guam',' Northern Mariana Islands',' Trust Territory of the Pacific Islands');
$Regions[]=array('name'=>'X','Alaska',' Idaho',' Oregon',' Washington');
  






?> <pre><?

//print_r($g);
foreach($locs as $loc){
?>$locs['<?=pad($loc['name']."'",16);?>]=(object)array('country'=>'CA','display'=>'<?=pad($loc['display']."'",28);?>,'code'=>'<?=pad($loc['name']."'",16);?>,'type'=>'<?=pad($loc['type']."'",6);?><?


?>,'region'=>array('<? 
//$tr=array(); foreach($Regions as $r) foreach($r as $s) if(in_array(strtolower(trim($s)),$loc['states'])) $tr[$r['name']]=$r['name']; 
//echo pad(join("','",$tr)."'",15);
echo join("','",array_keys($loc['states']))."'";
?>)<?
?>,'states'=>array('<?=join("','",array_keys($loc['states']));?>'));
<?
    
    
    
}