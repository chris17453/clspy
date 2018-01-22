<?//Base Object

//    require_once "/web/radshop.us/class/base.core.php";
?><!doctype html>
<head>
<title>CLSPY A Craigslist Search Engine</title>
<meta name="description"             content="A Craigslist Agregate Search Engine"> 
<meta name="author"                  content="Charles C Watkins">
<meta property="og:url"              content="clspy.xyz" /> 
<meta property="og:title"            content="CLSPY a Craigslist Search Engine" /> 
<meta property="og:description"      content="CLSPY a Craigslist Search Engine" /> 
<meta property="og:image"            content="" /> 
<meta property="og:type"             content="website" />
<meta property="og:site_name"        content="" />
<meta property="twitter:card"        content="" />
<meta property="twitter:site"        content="" />
<meta property="twitter:account_id"  content="" />
<meta property="twitter:title"       content="" />
<meta property="twitter:description" content="" />
<meta property="twitter:image"       content="" />
<meta name="viewport" content="width=device-width, maximum-scale=1, minimum-scale=1" />

<link rel="stylesheet" type="text/css" href="/media/css/main.css">
<link rel="stylesheet" type="text/css" href="/media/js/tablesorter/css/theme.metro-dark.min.css">
<script type="text/javascript" src="/media/js/jquery-3.1.1.min.js"></script> 
<script type="text/javascript" src="/media/js/tablesorter/js/jquery.tablesorter.js"></script>
<script type="text/javascript" src="/media/js/tablesorter/js/jquery.tablesorter.widgets.min.js"></script>
<script type="text/javascript" src="/media/js/main.js"></script>                                                                                            


</head>
<body>
<div id="boss" class='hide'>
<table celspacing=0px cellpadding=0px class="tableizer-table">
<thead>
<tr class="tableizer-firstrow"><?for($a=0;$a<100;$a++){?><th><?=chr(65+$a%26);?></th><?}?> </tr>
<tbody>
<? for($b=0;$b<40;$b++) {?><tr class="tableizer-firstrow"><td><?=$b;?></td><?for($a=0;$a<100-1;$a++){?><td></td><?}?> </tr><? } ?>
</tbody></table>
</div>
<div class='header'> 
    <h2>A Craigslist Search Engine</h2>
</div>
<div class='footAnchor'>
       <div class='footer_wraper_dark footer_line'>
            <div class='footer wrapper copywright'> <a class='btt' href="#top">[Back to top of page]</a>             Copywright (c) 2016 Charles Watkins (pretty freakin cool....) <span onclick="bossMode();" class='boss'>[Boss Mode]</span>
            </div>            
            <div class='clear'></div>
        </div>
</div>
<div class='content'>
<div class='contentWrapper'>