<div class='searchBody'>
<form method="post">
<div style='float:left; width:310px;'>
<table width="300px">
<tr><td>Search</td><td colspan=1><input class='searchInput' name='search' value='<?=$search;?>'></td></tr>
<tr><td>Sub Search</td><td colspan=1><input class='searchInput' name='subSearch' value='<?=$subSearch;?>'></td></tr>
<tr><td>Price</td>
    <td>
        <div class='left sPrice'><input class='searchInput' name='min' value='<?=$min;?>'></div>
        <div class='left sPriceSep'>-</div>
        <div class='left sPrice'><input class='searchInput' name='max' value='<?=$max;?>'></div>
    </td>
</tr>
<tr><td>Age</td>
    <td>
        <div class='left sAge'><input class='searchInput' name='year_min' value='<?=$year_min;?>'></div>
        <div class='left sAgeSep'>-</div>
        <div class='left sAge'><input class='searchInput' name='year_max' value='<?=$year_max;?>'></div>
    </td>
</tr>
<tr><td>Title Only</td><td style='text-align:left;'><input class='' name='type' type='checkbox' <? if ($type) {?>checked='checked'<? } ?>></td></tr>

<tr>
<td colspan=2>

<select class='cats' name="cat" >
<? foreach($cats as $c) { ?>
<option  <? if($cat==$c->code) {  ?>selected="selected" <? } ?> value="<?=$c->code;?>"><?=pad(ucfirst($c->group),12,"_");?><?=ucfirst($c->display);?></option>
<?}?>
</select>
</td>
</tr>
<tr><td></td><td><button type='submit'>Search CL</button></td></tr>
</table>
</div>

<div style='float:left;'>
<table>
<tr><td><button type='button' class='region' id='toggleCheckbox'>All ON</button></td></tr>
<tr><td><button type='button' class='region' id='toggleAllOff'>All OFF</button></td></tr>
<tr><td><button type='button' class='region' id='toggleCheckboxM'>Big Cities </button></td> </tr>
<tr><td><button type='button' class='region' id='toggleCheckboxm'>Small Cities </button></td></tr>
<tr><td><button type='button' class='region' id='toggleCheckboxC'>Canada</button></td></tr>
<tr><td><button type='button' class='region' id='toggleCheckboxU'>US</button></td></tr>
<tr><td><button type='button' class='region' id='toggleCheckboxF'>PAC NW/BC</button></td></tr>
<tr><td colspan=2>&nbsp;</td></tr>
<tr><td colspan=2>&nbsp;</td></tr>

</table></div>

<div style='float:left;'>
<table>
<tr><td><button type='button'  class='region' data-region='0'>Region I</button></td><td></td></tr>
<tr><td><button type='button'  class='region' data-region='1'>Region II</button></td><td></td></tr>
<tr><td><button type='button'  class='region' data-region='2'>Region III</button></td><td></td></tr>
<tr><td><button type='button'  class='region' data-region='3'>Region IV</button></td><td></td></tr>
<tr><td><button type='button'  class='region' data-region='4'>Region V</button></td><td></td></tr>
<tr><td><button type='button'  class='region' data-region='5'>Region VI</button></td><td></td></tr>
<tr><td><button type='button'  class='region' data-region='6'>Region VII</button></td><td></td></tr>
<tr><td><button type='button'  class='region' data-region='7'>Region VIII</button></td><td></td></tr>
<tr><td><button type='button'  class='region' data-region='8'>Region IX</button></td><td></td></tr>
<tr><td><button type='button'  class='region' data-region='9'>Region X</button></td><td></td></tr>
</table>
</div>
<div style='float:left;'>
<table>
<tr><td><button type='button'  class='region' data-region='ON'>ON</button></td><td></td></tr>
<tr><td><button type='button'  class='region' data-region='QC'>QC</button></td><td></td></tr>
<tr><td><button type='button'  class='region' data-region='NS'>NS</button></td><td></td></tr>
<tr><td><button type='button'  class='region' data-region='NB'>NB</button></td><td></td></tr>
<tr><td><button type='button'  class='region' data-region='MB'>MB</button></td><td></td></tr>
<tr><td><button type='button'  class='region' data-region='BC'>BC</button></td><td></td></tr>
<tr><td><button type='button'  class='region' data-region='PE'>PE</button></td><td></td></tr>
<tr><td><button type='button'  class='region' data-region='SK'>SK</button></td><td></td></tr>
<tr><td><button type='button'  class='region' data-region='AB'>AB</button></td><td></td></tr>
<tr><td><button type='button'  class='region' data-region='NL'>NL</button></td><td></td></tr>
</table>
</div>


<div style='float:left; margin-top:-54px'><img src="/media/images/map.png" border="0" width="300px" height="" ></div>
<div id='locSel'></div>
<div class='cities'>
<ul>
<? foreach($locs as $l) {?>
<li><input type='checkbox' class='<?=$l->country." ".$l->type." ".join(" ",$l->states)." ".join(" ",$l->region);?>' name='locs2[<?=$l->code;?>]' id='<?=$l->code;?>' <? if(isset($locs2[$l->code])){?> checked='checked'<?}?>><label for='<?=$l->code;?>'><?=join(",",$l->states);?>, <?=$l->display;?></label></li>
<? } ?></ul>
</div>


</form>
<div style='clear:both'></div>
</div>
<br>
<div id="percent" style='clear:both;display:none; border-color:grey; border-width:1px; border-style:solid; width:700px; font-size:18px; padding:20px; margin-left:auto; margin-right:auto; background-color:lightgrey; color:blue;'></div>


