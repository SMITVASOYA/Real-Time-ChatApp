let count = true;
document.getElementById("seremoji").addEventListener("click", function (e) {

    let str = "";
    if (count) {
        for (var i = 128512; i <= 128567; i++) {
            str += `<a onClick="reply_click(this.id)" href="#" id="${i}">  &#${i} </a>`;
        }
        document.getElementById("emoji").innerHTML = str;
        count = false;
        document.getElementById("emoji").style.display = "block";
        document.getElementById("emoji").style.position = "fixed";
        document.getElementById("emoji").style.top = "415px";
        document.getElementById("seremoji").className = "bi bi-keyboard";
    } else if (!count) {
        for (var i = 128512; i <= 128567; i++) {
            document.getElementById("emoji").innerHTML = "";
            document.getElementById("emoji").style.display = "none";
            document.getElementById("seremoji").className = "bi bi-emoji-smile";
        }
        count = true;
    }



});

function reply_click(clicked_id) {
    let trimemoji = document.getElementById(`${clicked_id}`).innerHTML;
    trimemoji = trimemoji.trim();

    var x = document.getElementById("msg").selectionStart;
    var y = document.getElementById("msg").value;
    document.getElementById("msg").value = trimemoji;


}
let form = document.getElementById("form"),
    sendbtn = document.getElementById("sendbtn"),
    inputfeild = document.getElementById("msg");

form.onsubmit = (e) => {
    e.preventDefault();
}

sendbtn.onclick = (e) => {
    e.preventDefault();
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "php/chat.php", true);

    xhr.onload = () => {

        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                let data = xhr.response;
                inputfeild.value = "";
                scrolltoBottom();

            }
        }
    }
    let formdata = new FormData(form);
    xhr.send(formdata);
}
let chatarea = document.getElementById("chatarea");
let chatareaa = document.querySelector(".chat-area");

chatareaa.onmouseenter = () => {
    chatareaa.classList.add("active");
}

chatareaa.onmouseleave = () => {
    chatareaa.classList.remove("active");
}

setInterval((e) => {
    let headerp = document.getElementById("headerp");
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/status.php", true);

    xhr.onload = () => {

        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                let data = xhr.response;
                headerp.innerHTML = data;
            }
        }
    }
    let formdata = new FormData(form);
    xhr.send(formdata);
}, 1000);


setInterval((e) => {

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/get-chat.php", true);

    xhr.onload = () => {

        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                let data = xhr.response;
                chatarea.innerHTML = data;
                if (!chatareaa.classList.contains("active")) {
                    scrolltoBottom();
                }
            }
        }
    }
    let formdata = new FormData(form);
    xhr.send(formdata);
}, 500);

function scrolltoBottom() {
    chatareaa.scrollTop = chatareaa.scrollHeight;
}