function submitRegistration() {
    var data = {
        vorname: document.getElementById("vorname").value,
        nachname: document.getElementById("nachname").value,
        geburtstag: document.getElementById("geburtstag").value,
        email: document.getElementById("email").value
    }

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(xhttp.response);
            document.getElementById("vorname").value = "";
            document.getElementById("nachname").value = "";
            document.getElementById("geburtstag").value = "";
            document.getElementById("email").value = "";
        }
    };
    xhttp.open("POST", "test.php", true);
    xhttp.setRequestHeader("Content-type", "application/json");

    xhttp.send(JSON.stringify(data));


}