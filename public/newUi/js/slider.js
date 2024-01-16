var swiper2 = new Swiper(".mySwiper2", {
    slidesPerView: "auto",
    spaceBetween: 0,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
});

var swiper3 = new Swiper(".mySwiper3", {
    slidesPerView: "auto",
    spaceBetween: 20,
});



var swiper = new Swiper(".mySwiper", {
    loop: true,
    slidesPerView: "auto",
    spaceBetween: 20,
    centeredSlides: true,
    autoplay: {
        delay: 8000,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});


// chenge box gift

var boxmessagegift1 = document.getElementById("box-message-gift1");
var boxmessagegift2 = document.getElementById("box-message-gift2");
var boxmessagegift3 = document.getElementById("box-message-gift3");
var boxmessagegift4 = document.getElementById("box-message-gift4");
var boxmessagegift5 = document.getElementById("box-message-gift5");
var boxmessagegift6 = document.getElementById("box-message-gift6");


var boxitemgift1 = document.getElementById("box-item-gift1");
var boxitemgift2 = document.getElementById("box-item-gift2");
var boxitemgift3 = document.getElementById("box-item-gift3");
var boxitemgift4 = document.getElementById("box-item-gift4");
var boxitemgift5 = document.getElementById("box-item-gift5");
var boxitemgift6 = document.getElementById("box-item-gift6");



// logo gift cart box

var img1boxitem = document.getElementById("img1-box-item");
var img2boxitem = document.getElementById("img2-box-item");
var img3boxitem = document.getElementById("img3-box-item");
var img4boxitem = document.getElementById("img4-box-item");
var img5boxitem = document.getElementById("img5-box-item");
var img6boxitem = document.getElementById("img6-box-item");
var img7boxitem = document.getElementById("img7-box-item");
var img8boxitem = document.getElementById("img8-box-item");
var img9boxitem = document.getElementById("img9-box-item");
var img10boxitem = document.getElementById("img10-box-item");
var img11boxitem = document.getElementById("img11-box-item");
var img12boxitem = document.getElementById("img12-box-item");
var img13boxitem = document.getElementById("img13-box-item");
var img14boxitem = document.getElementById("img14-box-item");
var img15boxitem = document.getElementById("img15-box-item");
var img16boxitem = document.getElementById("img16-box-item");
var img17boxitem = document.getElementById("img17-box-item");
var img18boxitem = document.getElementById("img18-box-item");



function chengegift1()
{
    boxmessagegift1.classList.remove("hidebox");
    boxmessagegift2.classList.add("hidebox");
    boxmessagegift3.classList.add("hidebox");
    boxmessagegift4.classList.add("hidebox");
    boxmessagegift5.classList.add("hidebox");
    boxmessagegift6.classList.add("hidebox");

    img1boxitem.classList.remove("hidebox");
    img3boxitem.classList.remove("hidebox");

    img4boxitem.classList.remove("hidebox");
    img6boxitem.classList.add("hidebox");

    img7boxitem.classList.remove("hidebox");
    img9boxitem.classList.add("hidebox");

    img10boxitem.classList.remove("hidebox");
    img12boxitem.classList.add("hidebox");

    img13boxitem.classList.remove("hidebox");
    img15boxitem.classList.add("hidebox");

    img16boxitem.classList.remove("hidebox");
    img18boxitem.classList.add("hidebox");

    boxitemgift1.classList.add("box-active-gift1");
    boxitemgift2.classList.remove("box-active-gift2");
    boxitemgift3.classList.remove("box-active-gift3");
    boxitemgift4.classList.remove("box-active-gift4");
    boxitemgift5.classList.remove("box-active-gift5");
    boxitemgift6.classList.remove("box-active-gift6");

    img1boxitem.classList.add("hidetest");
    img2boxitem.classList.add("hidetest");
    img3boxitem.classList.remove("hidetest");

    img4boxitem.classList.remove("hidetest");
    img5boxitem.classList.remove("hidetest");
    img6boxitem.classList.remove("hidetest");

    img7boxitem.classList.remove("hidetest");
    img8boxitem.classList.remove("hidetest");
    img9boxitem.classList.remove("hidetest");

    img10boxitem.classList.remove("hidetest");
    img11boxitem.classList.remove("hidetest");
    img12boxitem.classList.remove("hidetest");

    img13boxitem.classList.remove("hidetest");
    img14boxitem.classList.remove("hidetest");
    img15boxitem.classList.remove("hidetest");

    img16boxitem.classList.remove("hidetest");
    img17boxitem.classList.remove("hidetest");
    img18boxitem.classList.remove("hidetest");
}

function chengegift2()
{
    boxmessagegift1.classList.add("hidebox");
    boxmessagegift2.classList.remove("hidebox");
    boxmessagegift3.classList.add("hidebox");
    boxmessagegift4.classList.add("hidebox");
    boxmessagegift5.classList.add("hidebox");
    boxmessagegift6.classList.add("hidebox");

    img1boxitem.classList.remove("hidebox");
    img3boxitem.classList.remove("hidebox");

    img4boxitem.classList.add("hidebox");
    img6boxitem.classList.remove("hidebox");

    img7boxitem.classList.remove("hidebox");
    img9boxitem.classList.add("hidebox");

    img10boxitem.classList.remove("hidebox");
    img12boxitem.classList.add("hidebox");

    img13boxitem.classList.remove("hidebox");
    img15boxitem.classList.add("hidebox");

    img16boxitem.classList.remove("hidebox");
    img18boxitem.classList.add("hidebox");

    boxitemgift1.classList.remove("box-active-gift1");
    boxitemgift2.classList.add("box-active-gift2");
    boxitemgift3.classList.remove("box-active-gift3");
    boxitemgift4.classList.remove("box-active-gift4");
    boxitemgift5.classList.remove("box-active-gift5");
    boxitemgift6.classList.remove("box-active-gift6");


    img1boxitem.classList.remove("hidetest");
    img2boxitem.classList.remove("hidetest");
    img3boxitem.classList.add("hidetest");

    img4boxitem.classList.add("hidetest");
    img5boxitem.classList.add("hidetest");
    img6boxitem.classList.remove("hidetest");

    img7boxitem.classList.remove("hidetest");
    img8boxitem.classList.remove("hidetest");
    img9boxitem.classList.remove("hidetest");

    img10boxitem.classList.remove("hidetest");
    img11boxitem.classList.remove("hidetest");
    img12boxitem.classList.remove("hidetest");
}


function chengegift3()
{
    boxmessagegift1.classList.add("hidebox");
    boxmessagegift2.classList.add("hidebox");
    boxmessagegift3.classList.remove("hidebox");
    boxmessagegift4.classList.add("hidebox");
    boxmessagegift5.classList.add("hidebox");
    boxmessagegift6.classList.add("hidebox");

    img1boxitem.classList.remove("hidebox");
    img3boxitem.classList.add("hidebox");

    img4boxitem.classList.remove("hidebox");
    img6boxitem.classList.add("hidebox");

    img7boxitem.classList.add("hidebox");
    img9boxitem.classList.remove("hidebox");

    img10boxitem.classList.remove("hidebox");
    img12boxitem.classList.add("hidebox");

    img13boxitem.classList.remove("hidebox");
    img15boxitem.classList.add("hidebox");

    img16boxitem.classList.remove("hidebox");
    img18boxitem.classList.add("hidebox");

    boxitemgift1.classList.remove("box-active-gift1");
    boxitemgift2.classList.remove("box-active-gift2");
    boxitemgift3.classList.add("box-active-gift3");
    boxitemgift4.classList.remove("box-active-gift4");
    boxitemgift5.classList.remove("box-active-gift5");
    boxitemgift6.classList.remove("box-active-gift6");

    img1boxitem.classList.remove("hidetest");
    img2boxitem.classList.remove("hidetest");
    img3boxitem.classList.add("hidetest");

    img4boxitem.classList.remove("hidetest");
    img5boxitem.classList.remove("hidetest");
    img6boxitem.classList.remove("hidetest");

    img7boxitem.classList.add("hidetest");
    img8boxitem.classList.add("hidetest");
    img9boxitem.classList.remove("hidetest");

    img10boxitem.classList.remove("hidetest");
    img11boxitem.classList.remove("hidetest");
    img12boxitem.classList.remove("hidetest");

    img13boxitem.classList.remove("hidetest");
    img14boxitem.classList.remove("hidetest");
    img15boxitem.classList.remove("hidetest");

    img16boxitem.classList.remove("hidetest");
    img17boxitem.classList.remove("hidetest");
    img18boxitem.classList.remove("hidetest");
}

function chengegift4()
{
    boxmessagegift1.classList.add("hidebox");
    boxmessagegift2.classList.add("hidebox");
    boxmessagegift3.classList.add("hidebox");
    boxmessagegift4.classList.remove("hidebox");
    boxmessagegift5.classList.add("hidebox");
    boxmessagegift6.classList.add("hidebox");

    img1boxitem.classList.remove("hidebox");
    img3boxitem.classList.add("hidebox");

    img4boxitem.classList.remove("hidebox");
    img6boxitem.classList.add("hidebox");

    img7boxitem.classList.remove("hidebox");
    img9boxitem.classList.add("hidebox");

    img10boxitem.classList.add("hidebox");
    img12boxitem.classList.remove("hidebox");

    img13boxitem.classList.remove("hidebox");
    img15boxitem.classList.add("hidebox");

    img16boxitem.classList.remove("hidebox");
    img18boxitem.classList.add("hidebox");

    boxitemgift1.classList.remove("box-active-gift1");
    boxitemgift2.classList.remove("box-active-gift2");
    boxitemgift3.classList.remove("box-active-gift3");
    boxitemgift4.classList.add("box-active-gift4");
    boxitemgift5.classList.remove("box-active-gift5");
    boxitemgift6.classList.remove("box-active-gift6");

img1boxitem.classList.remove("hidetest");
    img2boxitem.classList.remove("hidetest");
    img3boxitem.classList.add("hidetest");

    img4boxitem.classList.remove("hidetest");
    img5boxitem.classList.remove("hidetest");
    img6boxitem.classList.remove("hidetest");

    img7boxitem.classList.remove("hidetest");
    img8boxitem.classList.remove("hidetest");
    img9boxitem.classList.remove("hidetest");

    img10boxitem.classList.add("hidetest");
    img11boxitem.classList.add("hidetest");
    img12boxitem.classList.remove("hidetest");

    img13boxitem.classList.remove("hidetest");
    img14boxitem.classList.remove("hidetest");
    img15boxitem.classList.remove("hidetest");

    img16boxitem.classList.remove("hidetest");
    img17boxitem.classList.remove("hidetest");
    img18boxitem.classList.remove("hidetest");
}

function chengegift5()
{
    boxmessagegift1.classList.add("hidebox");
    boxmessagegift2.classList.add("hidebox");
    boxmessagegift3.classList.add("hidebox");
    boxmessagegift4.classList.add("hidebox");
    boxmessagegift5.classList.remove("hidebox");
    boxmessagegift6.classList.add("hidebox");

    img1boxitem.classList.remove("hidebox");
    img3boxitem.classList.add("hidebox");

    img4boxitem.classList.remove("hidebox");
    img6boxitem.classList.add("hidebox");

    img7boxitem.classList.remove("hidebox");
    img9boxitem.classList.add("hidebox");

    img10boxitem.classList.remove("hidebox");
    img12boxitem.classList.add("hidebox");

    img13boxitem.classList.add("hidebox");
    img15boxitem.classList.remove("hidebox");

    img16boxitem.classList.remove("hidebox");
    img18boxitem.classList.add("hidebox");

    boxitemgift1.classList.remove("box-active-gift1");
    boxitemgift2.classList.remove("box-active-gift2");
    boxitemgift3.classList.remove("box-active-gift3");
    boxitemgift4.classList.remove("box-active-gift4");
    boxitemgift5.classList.add("box-active-gift5");
    boxitemgift6.classList.remove("box-active-gift6");

    img1boxitem.classList.remove("hidetest");
    img2boxitem.classList.remove("hidetest");
    img3boxitem.classList.add("hidetest");

    img4boxitem.classList.remove("hidetest");
    img5boxitem.classList.remove("hidetest");
    img6boxitem.classList.remove("hidetest");

    img7boxitem.classList.remove("hidetest");
    img8boxitem.classList.remove("hidetest");
    img9boxitem.classList.remove("hidetest");

    img10boxitem.classList.remove("hidetest");
    img11boxitem.classList.remove("hidetest");
    img12boxitem.classList.remove("hidetest");

    img13boxitem.classList.add("hidetest");
    img14boxitem.classList.add("hidetest");
    img15boxitem.classList.remove("hidetest");

    img16boxitem.classList.remove("hidetest");
    img17boxitem.classList.remove("hidetest");
    img18boxitem.classList.remove("hidetest");
}

function chengegift6()
{
    boxmessagegift1.classList.add("hidebox");
    boxmessagegift2.classList.add("hidebox");
    boxmessagegift3.classList.add("hidebox");
    boxmessagegift4.classList.add("hidebox");
    boxmessagegift5.classList.add("hidebox");
    boxmessagegift6.classList.remove("hidebox");

    img1boxitem.classList.remove("hidebox");
    img3boxitem.classList.add("hidebox");

    img4boxitem.classList.remove("hidebox");
    img6boxitem.classList.add("hidebox");

    img7boxitem.classList.remove("hidebox");
    img9boxitem.classList.add("hidebox");

    img10boxitem.classList.remove("hidebox");
    img12boxitem.classList.add("hidebox");

    img13boxitem.classList.remove("hidebox");
    img15boxitem.classList.add("hidebox");

    img16boxitem.classList.add("hidebox");
    img18boxitem.classList.remove("hidebox");

    boxitemgift1.classList.remove("box-active-gift1");
    boxitemgift2.classList.remove("box-active-gift2");
    boxitemgift3.classList.remove("box-active-gift3");
    boxitemgift4.classList.remove("box-active-gift4");
    boxitemgift5.classList.remove("box-active-gift5");
    boxitemgift6.classList.add("box-active-gift6");

    img1boxitem.classList.remove("hidetest");
    img2boxitem.classList.remove("hidetest");
    img3boxitem.classList.add("hidetest");

    img4boxitem.classList.remove("hidetest");
    img5boxitem.classList.remove("hidetest");
    img6boxitem.classList.remove("hidetest");

    img7boxitem.classList.remove("hidetest");
    img8boxitem.classList.remove("hidetest");
    img9boxitem.classList.remove("hidetest");

    img10boxitem.classList.remove("hidetest");
    img11boxitem.classList.remove("hidetest");
    img12boxitem.classList.remove("hidetest");

    img13boxitem.classList.remove("hidetest");
    img14boxitem.classList.remove("hidetest");
    img15boxitem.classList.remove("hidetest");

    img16boxitem.classList.add("hidetest");
    img17boxitem.classList.add("hidetest");
    img18boxitem.classList.remove("hidetest");
}


// cenge hover mobile


var boxitemgift1m = document.getElementById("box-item-gift1-mo");
var boxitemgift2m = document.getElementById("box-item-gift2-mo");
var boxitemgift3m = document.getElementById("box-item-gift3-mo");
var boxitemgift4m = document.getElementById("box-item-gift4-mo");
var boxitemgift5m = document.getElementById("box-item-gift5-mo");
var boxitemgift6m = document.getElementById("box-item-gift6-mo");



var img1boxitemm = document.getElementById("img1-box-item-m");
var img2boxitemm = document.getElementById("img3-box-item-m");
var img3boxitemm = document.getElementById("img4-box-item-m");
var img4boxitemm = document.getElementById("img6-box-item-m");
var img5boxitemm = document.getElementById("img7-box-item-m");
var img6boxitemm = document.getElementById("img9-box-item-m");
var img7boxitemm = document.getElementById("img10-box-item-m");
var img8boxitemm = document.getElementById("img12-box-item-m");
var img9boxitemm = document.getElementById("img13-box-item-m");
var img10boxitemm = document.getElementById("img15-box-item-m");
var img11boxitemm = document.getElementById("img16-box-item-m");
var img12boxitemm = document.getElementById("img18-box-item-m");



function chengegift1m()
{
    boxmessagegift1.classList.remove("hidebox");
    boxmessagegift2.classList.add("hidebox");
    boxmessagegift3.classList.add("hidebox");
    boxmessagegift4.classList.add("hidebox");
    boxmessagegift5.classList.add("hidebox");
    boxmessagegift6.classList.add("hidebox");

    boxitemgift1m.classList.add("box-active-gift1");
    boxitemgift2m.classList.remove("box-active-gift2");
    boxitemgift3m.classList.remove("box-active-gift3");
    boxitemgift4m.classList.remove("box-active-gift4");
    boxitemgift5m.classList.remove("box-active-gift5");
    boxitemgift6m.classList.remove("box-active-gift6");

    img1boxitemm.classList.add("hidebox");
    img2boxitemm.classList.remove("hidebox");
    img3boxitemm.classList.remove("hidebox");
    img4boxitemm.classList.add("hidebox");
    img5boxitemm.classList.remove("hidebox");
    img6boxitemm.classList.add("hidebox");
    img7boxitemm.classList.remove("hidebox");
    img8boxitemm.classList.add("hidebox");
    img9boxitemm.classList.remove("hidebox");
    img10boxitemm.classList.add("hidebox");
    img11boxitemm.classList.remove("hidebox");
    img12boxitemm.classList.add("hidebox");
}

function chengegift2m()
{
    boxmessagegift1.classList.add("hidebox");
    boxmessagegift2.classList.remove("hidebox");
    boxmessagegift3.classList.add("hidebox");
    boxmessagegift4.classList.add("hidebox");
    boxmessagegift5.classList.add("hidebox");
    boxmessagegift6.classList.add("hidebox");

    boxitemgift1m.classList.remove("box-active-gift1");
    boxitemgift2m.classList.add("box-active-gift2");
    boxitemgift3m.classList.remove("box-active-gift3");
    boxitemgift4m.classList.remove("box-active-gift4");
    boxitemgift5m.classList.remove("box-active-gift5");
    boxitemgift6m.classList.remove("box-active-gift6");

    img1boxitemm.classList.remove("hidebox");
    img2boxitemm.classList.add("hidebox");
    img3boxitemm.classList.add("hidebox");
    img4boxitemm.classList.remove("hidebox");
    img5boxitemm.classList.remove("hidebox");
    img6boxitemm.classList.add("hidebox");
    img7boxitemm.classList.remove("hidebox");
    img8boxitemm.classList.add("hidebox");
    img9boxitemm.classList.remove("hidebox");
    img10boxitemm.classList.add("hidebox");
    img11boxitemm.classList.remove("hidebox");
    img12boxitemm.classList.add("hidebox");
}

function chengegift3m()
{
    boxmessagegift1.classList.add("hidebox");
    boxmessagegift2.classList.add("hidebox");
    boxmessagegift3.classList.remove("hidebox");
    boxmessagegift4.classList.add("hidebox");
    boxmessagegift5.classList.add("hidebox");
    boxmessagegift6.classList.add("hidebox");

    boxitemgift1m.classList.remove("box-active-gift1");
    boxitemgift2m.classList.remove("box-active-gift2");
    boxitemgift3m.classList.add("box-active-gift3");
    boxitemgift4m.classList.remove("box-active-gift4");
    boxitemgift5m.classList.remove("box-active-gift5");
    boxitemgift6m.classList.remove("box-active-gift6");

    img1boxitemm.classList.remove("hidebox");
    img2boxitemm.classList.add("hidebox");
    img3boxitemm.classList.remove("hidebox");
    img4boxitemm.classList.add("hidebox");
    img5boxitemm.classList.add("hidebox");
    img6boxitemm.classList.remove("hidebox");
    img7boxitemm.classList.remove("hidebox");
    img8boxitemm.classList.add("hidebox");
    img9boxitemm.classList.remove("hidebox");
    img10boxitemm.classList.add("hidebox");
    img11boxitemm.classList.remove("hidebox");
    img12boxitemm.classList.add("hidebox");
}

function chengegift4m()
{
    boxmessagegift1.classList.add("hidebox");
    boxmessagegift2.classList.add("hidebox");
    boxmessagegift3.classList.add("hidebox");
    boxmessagegift4.classList.remove("hidebox");
    boxmessagegift5.classList.add("hidebox");
    boxmessagegift6.classList.add("hidebox");

    boxitemgift1m.classList.remove("box-active-gift1");
    boxitemgift2m.classList.remove("box-active-gift2");
    boxitemgift3m.classList.remove("box-active-gift3");
    boxitemgift4m.classList.add("box-active-gift4");
    boxitemgift5m.classList.remove("box-active-gift5");
    boxitemgift6m.classList.remove("box-active-gift6");

    img1boxitemm.classList.remove("hidebox");
    img2boxitemm.classList.add("hidebox");
    img3boxitemm.classList.remove("hidebox");
    img4boxitemm.classList.add("hidebox");
    img5boxitemm.classList.remove("hidebox");
    img6boxitemm.classList.add("hidebox");
    img7boxitemm.classList.add("hidebox");
    img8boxitemm.classList.remove("hidebox");
    img9boxitemm.classList.remove("hidebox");
    img10boxitemm.classList.add("hidebox");
    img11boxitemm.classList.remove("hidebox");
    img12boxitemm.classList.add("hidebox");
}

function chengegift5m()
{
    boxmessagegift1.classList.add("hidebox");
    boxmessagegift2.classList.add("hidebox");
    boxmessagegift3.classList.add("hidebox");
    boxmessagegift4.classList.add("hidebox");
    boxmessagegift5.classList.remove("hidebox");
    boxmessagegift6.classList.add("hidebox");

    boxitemgift1m.classList.remove("box-active-gift1");
    boxitemgift2m.classList.remove("box-active-gift2");
    boxitemgift3m.classList.remove("box-active-gift3");
    boxitemgift4m.classList.remove("box-active-gift4");
    boxitemgift5m.classList.add("box-active-gift5");
    boxitemgift6m.classList.remove("box-active-gift6");

    img1boxitemm.classList.remove("hidebox");
    img2boxitemm.classList.add("hidebox");
    img3boxitemm.classList.remove("hidebox");
    img4boxitemm.classList.add("hidebox");
    img5boxitemm.classList.remove("hidebox");
    img6boxitemm.classList.add("hidebox");
    img7boxitemm.classList.remove("hidebox");
    img8boxitemm.classList.add("hidebox");
    img9boxitemm.classList.add("hidebox");
    img10boxitemm.classList.remove("hidebox");
    img11boxitemm.classList.remove("hidebox");
    img12boxitemm.classList.add("hidebox");
}

function chengegift6m()
{
    boxmessagegift1.classList.add("hidebox");
    boxmessagegift2.classList.add("hidebox");
    boxmessagegift3.classList.add("hidebox");
    boxmessagegift4.classList.add("hidebox");
    boxmessagegift5.classList.add("hidebox");
    boxmessagegift6.classList.remove("hidebox");

    boxitemgift1m.classList.remove("box-active-gift1");
    boxitemgift2m.classList.remove("box-active-gift2");
    boxitemgift3m.classList.remove("box-active-gift3");
    boxitemgift4m.classList.remove("box-active-gift4");
    boxitemgift5m.classList.remove("box-active-gift5");
    boxitemgift6m.classList.add("box-active-gift6");

    img1boxitemm.classList.remove("hidebox");
    img2boxitemm.classList.add("hidebox");
    img3boxitemm.classList.remove("hidebox");
    img4boxitemm.classList.add("hidebox");
    img5boxitemm.classList.remove("hidebox");
    img6boxitemm.classList.add("hidebox");
    img7boxitemm.classList.remove("hidebox");
    img8boxitemm.classList.add("hidebox");
    img9boxitemm.classList.remove("hidebox");
    img10boxitemm.classList.add("hidebox");
    img11boxitemm.classList.add("hidebox");
    img12boxitemm.classList.remove("hidebox");
}



// hover menu gift

function hovermenugift1()
{
    img1boxitem.classList.toggle("hidebox");
    img2boxitem.classList.toggle("hidebox");
}


function hovermenugift2()
{
    img4boxitem.classList.toggle("hidebox");
    img5boxitem.classList.toggle("hidebox");
}


function hovermenugift3()
{
    img7boxitem.classList.toggle("hidebox");
    img8boxitem.classList.toggle("hidebox");
}


function hovermenugift4()
{
    img10boxitem.classList.toggle("hidebox");
    img11boxitem.classList.toggle("hidebox");
}


function hovermenugift5()
{
    img13boxitem.classList.toggle("hidebox");
    img14boxitem.classList.toggle("hidebox");
}

function hovermenugift6()
{
    img16boxitem.classList.toggle("hidebox");
    img17boxitem.classList.toggle("hidebox");
}