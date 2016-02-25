
/*function datumbepalen() {
    var x = document.getElementById("wedstrijd").value;
    document.getElementById("result").innerHTML = "You selected: " + x;
}
*/
function datumbepalen(tegenstanderid){
/*document.getElementById("datum").innerHTML = tegenstanderid;*/
    if (tegenstanderid == "") {
        document.getElementById("datum").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("datum").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","phpscript.php?q="+tegenstanderid,true);
        xmlhttp.send();
}
}

function keepselected(tegenstanderid, datum){
/*document.getElementById("datum").innerHTML = tegenstanderid;*/
    if (tegenstanderid == "") {
        document.getElementById("datum").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("datum").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","phpscript.php?q="+tegenstanderid + "&datum="+datum,true);
        xmlhttp.send();
}
}
