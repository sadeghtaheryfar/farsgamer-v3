var box1 = document.getElementById("box1");
var box2 = document.getElementById("box2");
var btn1 = document.getElementById("btn1");
var btn2 = document.getElementById("btn2");
var boxcommentsmudal = document.getElementById("box-comments-mudal");

var star41 = document.getElementById("star-41");
var star411 = document.getElementById("star-411");
var star42 = document.getElementById("star-42");
var star422 = document.getElementById("star-422");
var star43 = document.getElementById("star-43");
var star433 = document.getElementById("star-433");
var star44 = document.getElementById("star-44");
var star444 = document.getElementById("star-444");
var star45 = document.getElementById("star-45");
var star455 = document.getElementById("star-455");

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


function clothecommentsmudal()
{
    boxcommentsmudal.classList.toggle("hide-comments-mudal");
}


function star41f()
{
    star41.classList.remove("hide-star");
    star411.classList.add("hide-star");

    star42.classList.add("hide-star");
    star422.classList.remove("hide-star");

    star43.classList.add("hide-star");
    star433.classList.remove("hide-star");

    star44.classList.add("hide-star");
    star444.classList.remove("hide-star");

    star45.classList.add("hide-star");
    star455.classList.remove("hide-star");
}


function star422f()
{
    star41.classList.remove("hide-star");
    star411.classList.add("hide-star");

    star42.classList.remove("hide-star");
    star422.classList.add("hide-star");

    star43.classList.add("hide-star");
    star433.classList.remove("hide-star");

    star44.classList.add("hide-star");
    star444.classList.remove("hide-star");

    star45.classList.add("hide-star");
    star455.classList.remove("hide-star");
}


function star433f()
{
    star41.classList.remove("hide-star");
    star411.classList.add("hide-star");

    star42.classList.remove("hide-star");
    star422.classList.add("hide-star");

    star43.classList.remove("hide-star");
    star433.classList.add("hide-star");

    star44.classList.add("hide-star");
    star444.classList.remove("hide-star");

    star45.classList.add("hide-star");
    star455.classList.remove("hide-star");
}


function star444f()
{
    star41.classList.remove("hide-star");
    star411.classList.add("hide-star");

    star42.classList.remove("hide-star");
    star422.classList.add("hide-star");

    star43.classList.remove("hide-star");
    star433.classList.add("hide-star");

    star44.classList.remove("hide-star");
    star444.classList.add("hide-star");

    star45.classList.add("hide-star");
    star455.classList.remove("hide-star");
}


function star455f()
{
    star41.classList.remove("hide-star");
    star411.classList.add("hide-star");

    star42.classList.remove("hide-star");
    star422.classList.add("hide-star");

    star43.classList.remove("hide-star");
    star433.classList.add("hide-star");

    star44.classList.remove("hide-star");
    star444.classList.add("hide-star");

    star45.classList.remove("hide-star");
    star455.classList.add("hide-star");
}