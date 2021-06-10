
let searchbtn1 = document.getElementById("searchbtn1");
let searchbtn2 = document.getElementById("searchbtn2");
let search = document.getElementById("search");

search.onfocus = () => {
    search.style.border = "2px solid black";
}
search.onblur = () => {
    search.style.border = "2px solid #ccc";
}

searchbtn2.style.fontSize = "20px";
searchbtn1.onclick = (e) => {
    e.preventDefault();
    search.select();
    if (searchbtn2.className == "fa fa-search") {
        searchbtn2.classList.remove("fa-search");
        searchbtn2.style.fontSize = "20px";
        searchbtn2.classList.add("fa-times-circle");
        e.preventDefault();
    }

    else if (searchbtn2.className == "fa fa-times-circle") {
        searchbtn2.classList.remove("fa-times-circle");
        searchbtn2.style.fontSize = "20px";
        searchbtn2.classList.add("fa-search");
        search.value = null;
        search.style.border = "2px solid #ccc";
        search.blur();
        e.preventDefault();

    }

}


search.addEventListener("keyup", (e) => {

    searchbtn2.classList.remove("fa-search");
    searchbtn2.style.fontSize = "20px";
    searchbtn2.classList.add("fa-times-circle");

    var searchTerm = search.value;
    searchTerm.trim();
    if (searchTerm != "" && e.code != 32) {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "php/search.php", true);

        xhr.onload = () => {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    let data = xhr.response;
                    contactlist[0].innerHTML = data;
                }
            }
        }

        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send(`searchTerm=${searchTerm}`);
    }
});

let contactlist = document.getElementsByClassName("contactlist");

setInterval((e) => {

    let xhr = new XMLHttpRequest();
    xhr.open("GET", "php/user.php", true);

    xhr.onload = () => {

        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (search.value == "") {
                    contactlist[0].innerHTML = data;
                }

            }
        }
    }
    xhr.send();


}, 1000);