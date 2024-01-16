var box1 = document.getElementById("box1");
var box2 = document.getElementById("box2");
var btn1 = document.getElementById("btn1");
var btn2 = document.getElementById("btn2");
var iconclothe = document.getElementById("icon-clothe");
var iconopen = document.getElementById("icon-open");
var boxnotifmassage = document.getElementById("box-notif-massage");
var iconclothe2 = document.getElementById("icon-clothe2");
var iconopen2 = document.getElementById("icon-open2");
var boxnotifmassage2 = document.getElementById("box-notif-massage2");

function togelbox1()
{
    btn1.classList.add("header-active");
    btn2.classList.remove("header-active");
    box1.classList.remove("hide-box");
    box2.classList.add("hide-box");
}


function togelbox2()
{
    btn2.classList.add("header-active");
    btn1.classList.remove("header-active");
    box2.classList.remove("hide-box");
    box1.classList.add("hide-box");
}


function togelbox()
{
    iconclothe.classList.toggle("hide-icon");
    iconopen.classList.toggle("hide-icon");
    boxnotifmassage.classList.toggle("hide-box-notif");
}


function togelbox3()
{
    iconclothe2.classList.toggle("hide-icon");
    iconopen2.classList.toggle("hide-icon");
    boxnotifmassage2.classList.toggle("hide-box-notif");
}