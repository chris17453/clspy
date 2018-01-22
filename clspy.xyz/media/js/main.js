$(function() {

  var allChecked=false;
  var allCheckedM=false;
  var allCheckedC=false;
  var allCheckedU=false;
  var allCheckedF=false;
  $("#sorter").tablesorter({
    theme : 'metro-dark',
    widthFixed : true,
    widgets: ["zebra", "filter"],
    widgetOptions : {
      filter_cssFilter   : '',
      filter_childRows   : false,
      filter_hideFilters : false,
      filter_ignoreCase  : true,
      filter_reset : '.reset',
      filter_saveFilters : true,
      filter_searchDelay : 300,
      filter_startsWith  : false,
    }
  });

  
    
  $("#toggleCheckbox").click(function(){
      $('.major').prop('checked', true);
      $('.minor').prop('checked', true);
      $('.solo').prop('checked', true);
      countSel();
  });
  $("#toggleCheckboxM").click(function(){
      if(allCheckedM) allCheckedM=false; else allCheckedM=true;
      $('.major').prop('checked', allCheckedM);
      countSel();
  });
  $("#toggleCheckboxm").click(function(){
      if(allCheckedM) allCheckedM=false; else allCheckedM=true;
      $('.minor').prop('checked', allCheckedM);
      $('.solo').prop('checked', allCheckedM);
      countSel();
  });
$("#toggleCheckboxC").click(function(){
      if(allCheckedC) allCheckedC=false; else allCheckedC=true;
      $('.CA').prop('checked', allCheckedC);
      countSel();
  });  
$("#toggleCheckboxU").click(function(){
      if(allCheckedU) allCheckedU=false; else allCheckedU=true;
      $('.US').prop('checked', allCheckedU);
      countSel();
  });  

$("#toggleAllOff").click(function(){
      if(allCheckedU) allCheckedU=false; else allCheckedU=true;
      $('.major').prop('checked', false);
      $('.minor').prop('checked', false);
      $('.solo').prop('checked', false);
      countSel();
  });  
    
  $("#toggleCheckboxF").click(function(){
      if(allCheckedF) allCheckedF=false; else allCheckedF=true;
      $('.BC').prop('checked', allCheckedF);
      $('.wa').prop('checked', allCheckedF);
      $('.id').prop('checked', allCheckedF);
      $('.or').prop('checked', allCheckedF);
      countSel();
  });  
  
  
  var r=new Array();
  $(".region").click(function(){
      var region=$(this).attr("data-region")
      
      if(r[region]) r[region]=false; else r[region]=true;
      if(region=='0') $('.I')   .prop('checked', r[0]);
      if(region=='1') $('.II')  .prop('checked', r[1]);
      if(region=='2') $('.III') .prop('checked', r[2]);
      if(region=='3') $('.IV')  .prop('checked', r[3]);
      if(region=='4') $('.V')   .prop('checked', r[4]);
      if(region=='5') $('.VI')  .prop('checked', r[5]);
      if(region=='6') $('.VII') .prop('checked', r[6]);
      if(region=='7') $('.VIII').prop('checked', r[7]);                             
      if(region=='8') $('.IX')  .prop('checked', r[8]);
      if(region=='9') $('.X')   .prop('checked', r[9]);
      if(region=='ON') $('.ON') .prop('checked', r[region]);
      if(region=='QC') $('.QC') .prop('checked', r[region]);
      if(region=='NS') $('.NS') .prop('checked', r[region]);
      if(region=='NB') $('.NB') .prop('checked', r[region]);
      if(region=='MB') $('.MB') .prop('checked', r[region]);
      if(region=='BC') $('.BC') .prop('checked', r[region]);
      if(region=='PE') $('.PE') .prop('checked', r[region]);
      if(region=='SK') $('.SK') .prop('checked', r[region]);                             
      if(region=='AB') $('.AB') .prop('checked', r[region]);
      if(region=='NL') $('.NL') .prop('checked', r[region]);

      countSel();
  });
  function countSel(){
    var numberOfChecked = $('.minor:checkbox:checked').length+$('.solo:checkbox:checked').length+$('.major:checkbox:checked').length;
    $("#locSel").html(numberOfChecked +" Locations Selected")
  
  }
  countSel();
});


function bossMode(){
    var div = document.getElementById("boss");
    if(div.style.display == 'block') div.style.display = 'none'; else div.style.display = 'block';
}   
