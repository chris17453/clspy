<?php

function searchLocation($url,$loc){
    $regexp = "<a\s[^>]*href=(\"??)([^\" >]*?)\\1[^>]*>(.*)<\/a>";
    $results=array();
    $sTime=microtime(true);
    $res=getWeb($url);
    $oTime=microtime(true) -$sTime;
    //print_r($loc);
    //print_r($url);
    
    //die();
    $index=0;
    $tokens=explode('<ul class="rows">',$res);
    if(count($tokens)>1) {
        $page=explode("</ul>",$tokens[1],2);
        $res2=explode(" Checking 'include nearby areas' will expand your search.",$page[0]);
        $matches=array();
        if(preg_match_all("/$regexp/siU", $res2[0], $matches, PREG_SET_ORDER)) {
            $i=0;
            $packet=array();
            foreach($matches as $match) {
                if(isset($match[1])) $m1=$match[1]; else $m1="";
                if(isset($match[2])) $m2=$match[2]; else $m2="";
                if(isset($match[3])) $m3=$match[3]; else $m3="";
                
                if($i==0) {
                    $key=$index;//
                   //print_r($match);
                    if($loc->country=="US") $domain="craigslist.org";
                    if($loc->country=="CA") $domain="craigslist.ca";
                    
                    if(strpos("craigslist",$m2)===false) $m2="http://{$loc->code}.{$domain}".$m2;
                    $packet['link']=$m2;
                    $tokens=explode("data-ids=\"",$match[0]);
                    $tokens=explode('"',$tokens[1]);
                    $packet['ids']=explode(",",$tokens[0]);
                    $packet['loc']=$loc->code;
                    $packet['locDisplay']=$loc->display;
                    $packet['time']=$oTime;
                    $packet['url']=$url;
                    
                }
                if($i==0) $packet['price']=$m3;
                if($i==1) $packet['title']=$m3;
                if($i==2) { 
                    $results[$key]=$packet;
                    $packet=array();
                    $i=0; $index++; 
                } else {
                    $i++;
                }
            }
        }
    }//end if results
    return $results;
}//end function 

$locCount=count($locs2);
$index=0;
$li=0;
echo '<script type="text/javascript">$("#percent").toggle();</script>';
$terms=array();    
$terms[]="query=".urlencode($search);
$terms[]="hasPic=1";
if(strlen($min)>0) $terms[]="min_price={$min}";
if(strlen($max)>0) $terms[]="max_price={$max}";
if(strlen($year_min)>0) $terms[]="min_auto_year={$year_min}";
if(strlen($year_max)>0) $terms[]="max_auto_year={$year_max}";
if($type) $terms[]="srchType=T";
$terms[]="sort=priceasc";
$results=array();
foreach($locs2 as $l=>$d) {
    foreach($locs as $l2) if($l2->code==$l) { $loc=$l2; break; }
    $li++;
    echo '<script type="text/javascript">$("#percent").html("Loading '.$l." - ".$li." of ".$locCount.' Locations ('.count($results).') Results Found");</script>';
    flush();
    if($loc->country=="US") $domain="craigslist.org";
    if($loc->country=="CA") $domain="craigslist.ca";
    
    $url="https://{$loc->code}.{$domain}/search/{$cat}?".join('&',$terms);
    
    $res=searchLocation($url,$loc);
    foreach($res as $i) {
        $results[$i['link']]=$i;
    }

    if(count($results)>2000) break;
   // break;
}

//echo "<pre>";
//print_r($masterResults);
//die();
//unset($results);

if($subSearch) {
    $index=0;
    $li=0;
    $subResults=array();
    $terms=array();    
    $terms[]="query=".urlencode($subSearch);
    $terms[]="hasPic=1";
    if(strlen($min)>0) $terms[]="min_price={$min}";
    if(strlen($max)>0) $terms[]="max_price={$max}";
    if(strlen($year_min)>0) $terms[]="min_auto_year={$year_min}";
    if(strlen($year_max)>0) $terms[]="max_auto_year={$year_max}";
    //if($type) $terms[]="srchType=T";                                      //subsearch is in all context's
    $terms[]="sort=priceasc";
    foreach($locs2 as $l=>$d) {
        foreach($locs as $l2) if($l2->code==$l) { $loc=$l2; break; }
        $li++;
        echo '<script type="text/javascript">$("#percent").html("Loading '.$l." - ".$li." of ".$locCount.' Locations ('.count($subResults).') Results Found");</script>';
        flush();
        if($loc->country=="US") $domain="craigslist.org";
        if($loc->country=="CA") $domain="craigslist.ca";
        
        $url="http://{$loc->code}.{$domain}/search/{$cat}?".join('&',$terms);
        $res=searchLocation($url,$loc,false);
        foreach($res as $i) {
            $subResults[$i['link']]=$i;
        }
        if(count($subResults)>2000) break;

    }
    //echo"<pre>Done";
    //print_r($results);
    //print_r($subResults);
    //Flatten Results;
    //print_r(array_keys($results));
    //print_r(array_keys($subResults));
    foreach($subResults as $mK=>$d){
        if(isset($results[$mK])) $results2[$mK]=$d;          //remove all results not in sub query.
    }
    $results=$results2;
    //die();
} 

?>

