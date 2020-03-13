localStorage.setItem("name","guest");
var body;
window.onload=function(){
    body=document.getElementById("taula1");
    generateTable();
    if(localStorage.clickcount==0){
        body.innerHTML="Don't have books in the cart";
    }
};

function clickCounter() {
  if (typeof(Storage) !== "undefined") {
    if (localStorage.clickcount) {
      localStorage.clickcount = Number(localStorage.clickcount)+1;
    } else {
      localStorage.clickcount = 1;
    }
  }
}

function shoppingCart(id) {
    clickCounter();
    localStorage.setItem(localStorage.clickcount,id);
    //alert(localStorage.getItem(localStorage.clickcount));
    //alert(id);
    //alert(localStorage.clickcount);
    localStorage.setItem("total",localStorage.clickcount);
}



function generateTable(){
    //alert(localStorage.getItem("name"));
  //var body = document.getElementById("taula");

  // create elements <table> and a <tbody>
  var tbl = document.createElement("table");
  var tblBody = document.createElement("tbody");
  var form=document.createElement("form");
  form.setAttribute("method","post");
    
  // cells creation
  for (var j = 0; j <= localStorage.getItem("total"); j++) {
      
    // table row creation
    var row = document.createElement("tr");

    if(j==0){
        var cell1=document.createElement("th");
        var cellText1=document.createTextNode("Book ID");
        cell1.appendChild(cellText1); 

        var cell2=document.createElement("th");
        var cellText2=document.createTextNode("Member");
        cell2.appendChild(cellText2); 

        var cell3=document.createElement("th");
        var cellText3=document.createTextNode("Quantity");
        cell3.appendChild(cellText3);
    } else{
        var cell1=document.createElement("td");
        var cellText1=document.createTextNode(localStorage.getItem(j));
        cell1.appendChild(cellText1); 

        var cell2=document.createElement("td");
        var cellText2=document.createTextNode(localStorage.getItem("name"));
        cell2.appendChild(cellText2); 

        var cell3=document.createElement("td");
        var cellText3=document.createTextNode("1");
        cell3.appendChild(cellText3);         
        
        var input=document.createElement("input");
        input.setAttribute("hidden","hidden");
        input.setAttribute("type","number");
        input.setAttribute("name","id[]");
        input.setAttribute("value",localStorage.getItem(j));
        form.appendChild(input);
    }
    
    // create element <td> and text node 
    //Make text node the contents of <td> element
    // put <td> at end of the table row
    
    row.appendChild(cell1);
    row.appendChild(cell2);
    row.appendChild(cell3);

    //row added to end of table body
    tblBody.appendChild(row);
  }

  // append the <tbody> inside the <table>
  tbl.appendChild(tblBody);
  // put <table> in the <body>
  //body.appendChild(tbl);
    body.appendChild(tbl);
     var input=document.createElement("input");
    input.setAttribute("value","Send to My Cart");
    input.setAttribute("type","submit");
    input.setAttribute("name","submit");
   
    form.appendChild(input);
    body.appendChild(form);
  // tbl border attribute to 
  //tbl.setAttribute("border", "2");
}
