var array_jso;
var quant={};

function shoppingCart() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            array_jso=JSON.parse(this.responseText);
            //document.getElementById("taula").innerHTML=array_jso.length;
            generateTable();
        }
    };
    xmlhttp.open("GET", "db_select_cart.php", true);
    xmlhttp.send();
    
}

shoppingCart();

function generateTable(){
  var body = document.getElementsByTagName("p")[1];

  // create elements <table> and a <tbody>
  var tbl = document.createElement("table");
  var tblBody = document.createElement("tbody");
    
  // cells creation
  for (var j = 0; j < array_jso.length; j++) {
      
    // table row creation
    var row = document.createElement("tr");

    
    // create element <td> and text node 
    //Make text node the contents of <td> element
    // put <td> at end of the table row
    var img=document.createElement("img");
    img.setAttribute("src","../book_img/"+array_jso[j].image);
    var cell=document.createElement("td");
    cell.appendChild(img); 
      
    var cell1=document.createElement("td");
    var cellText1=document.createTextNode(array_jso[j].title);
    cell1.appendChild(cellText1); 
      
    var cell2=document.createElement("td");
    var cellText2=document.createTextNode(array_jso[j].author);
    cell2.appendChild(cellText2); 
      
    var cell3=document.createElement("td");
    var cellText3=document.createTextNode(array_jso[j].precio+"€");
    cell3.setAttribute("id",j);
    cell3.appendChild(cellText3); 
      
    var form=document.createElement("form");
    form.setAttribute("method","post");
    var number=document.createElement("input");
    number.setAttribute("type","number");
    number.setAttribute("id",j+"n");
    number.setAttribute("value","1");
    number.setAttribute("max",array_jso[j].copias);
    number.addEventListener("change",function(){
        priceChange(cell3.getAttribute("id"));
    });
    var id=document.createElement("input");
    id.setAttribute("type","text");
    id.setAttribute("value",array_jso[j].book_ID);
    id.setAttribute("name","id");
    id.setAttribute("hidden","hidden");
    var delete1=document.createElement("input");
    delete1.setAttribute("type","submit");
    delete1.setAttribute("value","Delete");
    delete1.setAttribute("name","delete");
    var cell4=document.createElement("td");
      
    form.appendChild(number);
    form.appendChild(id);
    form.appendChild(delete1);
    cell4.appendChild(form);
                
    row.appendChild(cell);
    row.appendChild(cell1);
    row.appendChild(cell2);
    row.appendChild(cell3);
    row.appendChild(cell4);

    //row added to end of table body
    tblBody.appendChild(row);
  }
    
    quant[j]=1;
    
  var form1=document.createElement("form");
  form1.setAttribute("method","post");
  var buy=document.createElement("input");
  buy.setAttribute("type","submit");
  buy.setAttribute("name","buy");
  buy.setAttribute("value","Buy");
  buy.setAttribute("onclick","borrarLocalStorage()");
  var q=document.createElement("input");
  q.setAttribute("type","number");
  q.setAttribute("name","quant[]");
  q.setAttribute("value",quant);
  q.setAttribute("hidden","hidden");
    
  form1.appendChild(buy);
  form1.appendChild(q);
    
  // append the <tbody> inside the <table>
  tbl.appendChild(tblBody);
  // put <table> in the <body>
  body.appendChild(tbl);
  body.appendChild(form1);
  // tbl border attribute to 
  //tbl.setAttribute("border", "2");
}

function priceChange(id){
    var valor=document.getElementById(id+"n").value;
    var price=array_jso[id].precio;
    var p=parseInt(price);
    var v=parseInt(valor);
    document.getElementById(id).innerHTML=v*p;
}

//When buy books
function borrarLocalStorage(){
    localStorage.removeItem("name");
    for (var j = 1; j <= localStorage.getItem("total"); j++) {
        localStorage.removeItem(localStorage.clickcount);
    }
    localStorage.removeItem("total");
    localStorage.clickcount=0;
}