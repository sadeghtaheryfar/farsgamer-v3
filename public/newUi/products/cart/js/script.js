var message1 = document.getElementById("message1");
var message2 = document.getElementById("message2");
var message3 = document.getElementById("message3");


function showmessage1()
{
    message1.classList.toggle("hide-icon2")
}


function showmessage2()
{
    message2.classList.toggle("hide-icon2")
}


function showmessage3()
{
    message3.classList.toggle("hide-icon2")
}


var swiper = new Swiper(".mySwiper3", {
    loop: true,
    slidesPerView: 1,
    spaceBetween: 20,
    centeredSlides: true,
    grabCursor: true,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
});


var swiper2 = new Swiper(".mySwiper2", {
    spaceBetween: 10,
    grabCursor: true,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    thumbs: {
        swiper: swiper,
    },
});



// show box slider

var messageboxmoreslider = document.getElementById("message-box-more-slider");

function showboxslider()
{
    messageboxmoreslider.classList.toggle("hide-icon2");
}


var messageboxmoreslider2 = document.getElementById("message-box-more-slider2");

function showboxslider2()
{
    messageboxmoreslider2.classList.toggle("hide-icon2");
}


var messageboxmoreslider3 = document.getElementById("message-box-more-slider3");

function showboxslider3()
{
    messageboxmoreslider2.classList.toggle("hide-icon2");
    messageboxmoreslider3.classList.toggle("hide-icon2");
}


function showboxslider4()
{
    messageboxmoreslider2.classList.add("hide-icon2");
    messageboxmoreslider3.classList.toggle("hide-icon2");
}



//  chenge box header 


var  item1headerbox2 = document.getElementById("item1-header-box2");
var  item2headerbox2 = document.getElementById("item2-header-box2");
var  item3headerbox2 = document.getElementById("item3-header-box2");


function chengeloc1()
{
    window.scrollTo(0, 750);
}

function chengeloc2()
{
    window.scrollTo(0, 1280);
}

function chengeloc3()
{
    window.scrollTo(0, 1980);
}



function chengeBoxHeader()
{
    var testalki = document.body;
    locUser = testalki.scrollTop;

    if(locUser < 1300)
    {
        item1headerbox2.classList.add("item-header-box2-active");
        item2headerbox2.classList.remove("item-header-box2-active");
        item3headerbox2.classList.remove("item-header-box2-active");
    }

    if(locUser < 2000 && locUser > 1279)
    {
        item1headerbox2.classList.remove("item-header-box2-active");
        item2headerbox2.classList.add("item-header-box2-active");
        item3headerbox2.classList.remove("item-header-box2-active");
    }

    if(locUser > 1979)
    {
        item1headerbox2.classList.remove("item-header-box2-active");
        item2headerbox2.classList.remove("item-header-box2-active");
        item3headerbox2.classList.add("item-header-box2-active");
    }
}