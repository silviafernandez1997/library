var selectedVal;
var appiD="4SGDHv4F0HUZXXTGPe9nVjZrXhXWSZjl";
var keyCity;

function change() {
    var select = document.getElementById("selectBox");
    selectedVal = selectBox.options[select.selectedIndex].value;
    //alert(selectedVal);  
    loadDoc();
}

function loadDoc() {
  $.ajax({url: "http://dataservice.accuweather.com/locations/v1/cities/search?apikey="+appiD+"&q="+ selectedVal, success: function(result){
        var array1=result; 
        keyCity=array1[0].Key;
       $.ajax({url: "http://dataservice.accuweather.com/currentconditions/v1/"+keyCity+"?apikey="+appiD, success: function(result){
            var array1=result; 
            generateTable(array1)
        }, error: function(){
            $('#demo').html("Error de lectura 2");
        }});
    }, error: function(){
        $('#demo').html("Error de lectura");
    }});
}

function generateTable(array1){
  var body = document.getElementsByTagName("p")[2];
    if(body.hasChildNodes()){
        body.removeChild(body.lastElementChild);
    }

  // create elements <table> and a <tbody>
  var tbl = document.createElement("table");
  var tblBody = document.createElement("tbody");
    
  for (var j = 0; j <= 1; j++) {
      
    // table row creation
    var row = document.createElement("tr");

    if(j==0){
        var cell1=document.createElement("th");
        var cellText1=document.createTextNode("City");
        cell1.appendChild(cellText1); 

        var cell2=document.createElement("th");
        var cellText2=document.createTextNode("Temperature");
        cell2.appendChild(cellText2);

        var cell3=document.createElement("th");
        var cellText3=document.createTextNode("Weather");
        cell3.appendChild(cellText3);

        var cell4=document.createElement("th");
        var cellText4=document.createTextNode("Precipitation");
        cell4.appendChild(cellText4);

        var cell5=document.createElement("th");
        var cellText5=document.createTextNode("Date Time");
        cell5.appendChild(cellText5);

        var cell6=document.createElement("th");
        var cellText6=document.createTextNode("Is Day Time");
        cell6.appendChild(cellText6);
    } else{
        var cell1=document.createElement("td");
        var cellText1=document.createTextNode(selectedVal);
        cell1.appendChild(cellText1);

        var cell2=document.createElement("td");
        var cellText2=document.createTextNode(array1[0].Temperature.Metric.Value +" "+ array1[0].Temperature.Metric.Unit);
        cell2.appendChild(cellText2);

        var cell3=document.createElement("td");
        var cellText3=document.createTextNode(array1[0].WeatherText);
        cell3.appendChild(cellText3); 

        var cell4=document.createElement("td");
        var cellText4=document.createTextNode(array1[0].HasPrecipitation);
        cell4.appendChild(cellText4); 

        var cell5=document.createElement("td");
        var cellText5=document.createTextNode(array1[0].LocalObservationDateTime);
        cell5.appendChild(cellText5); 

        var cell6=document.createElement("td");
        var cellText6=document.createTextNode(array1[0].IsDayTime);
        cell6.appendChild(cellText6); 
    }
    
    // create element <td> and text node 
    //Make text node the contents of <td> element
    // put <td> at end of the table row
    cell1.style.padding="5px";
    cell2.style.padding="5px";
    cell3.style.padding="5px";
    cell4.style.padding="5px";
    cell5.style.padding="5px";
    cell6.style.padding="5px";
      
    row.appendChild(cell1);
    row.appendChild(cell2);
    row.appendChild(cell3);
    row.appendChild(cell4);
    row.appendChild(cell5);
    row.appendChild(cell6);

    //row added to end of table body
    tblBody.appendChild(row);
  }
    
  // append the <tbody> inside the <table>
  tbl.appendChild(tblBody);
  // put <table> in the <body>
  body.appendChild(tbl);
  tbl.setAttribute("border","1px");
  // tbl border attribute to 
  //tbl.setAttribute("border", "2");
}