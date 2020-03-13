function showTime() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("clock").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "showTime.php", true);
    xmlhttp.send();
    
}

setInterval(showTime,1000);
