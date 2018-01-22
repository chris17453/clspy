<? echo '<script type="text/javascript">$("#percent").toggle();</script>';    ?>
    <div style='clear:both;'><h2><?=$resultsLength=count($results);?> Results returned</h2></div>
    <table id='sorter' class='tablesorter-metro-dark'><thead><tr>
    <th >Location</th>
    <th >Code</th>
    <th>Image</th>
    <th >Price</th>
    <th >Title</th>
    <th>URL</th>
    </tr></thead><tbody><?
    foreach($results as $i){
    ?><tr>
    <td><a href="http://<?=$i['loc'];?>.craigslist.org"><?=$i['locDisplay'];?></a></td>
    <td><?=$i['loc'];?></td>
    <td><?
    if(count($i['ids'])>0){
    $imgI=0;
    foreach($i['ids'] as $img) {
        if($resultsLength<500) $maxPic=5;
        if($resultsLength>500) $maxPic=4;
        if($resultsLength>1000) $maxPic=3;
        if($resultsLength>1500) $maxPic=2;
        
        $imgI++;
        $img=substr($img,2);
        if($imgI%$maxPic==0) break;//echo "<br>";;
     ?>
     <a target='_blank' href="<?=$i['link'];?>"><img src='https://images.craigslist.org/<?=$img;?>_300x300.jpg' width="70px"/></a><?       
    }
    }
    ?>
    </td>
    <td><?=$i['price'];?></td>
    <td><a target='_blank' href="<?=$i['link'];?>"><?=$i['title'];?></a></td>
    <td><a href="<?=$i['url'];?>">Search <?=$i['locDisplay'];?></a></td>
    </tr><?    
    }//loc result loop?></tbody></table>
    <br><br><br><br><br><br>
