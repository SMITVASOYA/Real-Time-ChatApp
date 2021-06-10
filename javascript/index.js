const form = document.getElementById("form");
let errortxt = document.getElementById("error-txt");

form.onsubmit = (e) => {
    e.preventDefault();
}
var indexsubmit = document.getElementById("indexsubmit");

indexsubmit.onclick = (e) => {
    e.preventDefault();
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "php/signup.php", true);

    xhr.onload = () => {

        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                let data = xhr.response;

                if (data == "success") {
                    location.href = "user.php";
                }
                else {
                    errortxt.textContent = data;
                    errortxt.style.display = "block";
                }


            }
        }
    }
    let formdata = new FormData(form);
    xhr.send(formdata);
}

function eye() {
    if (document.getElementById("password").type == "text") {
        document.getElementById("password").type = "password";
        document.getElementById("eye").style.color = "#ccc";
        document.getElementById("eye").className = "fa fa-eye-slash";
    }
    else {
        document.getElementById("password").type = "text"; document.getElementById("eye").className = "fa fa-eye";
        document.getElementById("eye").style.color = "black";
    }
}


function eyeslash() {
    document.getElementById("eye").className = "fa fa-eye-slash";
    document.getElementById("password").type = "password";
    document.getElementById("eye").style.color = "rgb(148, 148, 148)";
}
