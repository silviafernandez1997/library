var s="";
function showHint(str) {
    if (str.length == 0) {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var array_jso=JSON.parse(this.responseText);
                for(var n=0;n<array_jso.length;n++){
                    
                   s+=array_jso[n].title+", ";
                }
                document.getElementById("txtHint").innerHTML=s;
                s="";
            }
        };
        xmlhttp.open("GET", "db_suggestion.php?q=" + str, true);
        xmlhttp.send();
    }
}
