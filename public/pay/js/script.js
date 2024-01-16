//  open box notif ......................................................

var iconnotif = document.getElementById("icon-notif");
var boxnotif = document.getElementById("box-show-notif");
var boxnotifclo = document.getElementById("box-notif-clothe");
var boxnotifclo = document.getElementById("box-notif-clothe");
var  txtmessagenotifone = document.getElementById("header-one-notif");
var  txtmessagenotiftwo = document.getElementById("header-two-notif");
var  txtmessagenotifthree = document.getElementById("header-three-notif");
var  txtmessagenotiffour = document.getElementById("header-four-notif");
var  boxnotifmobile = document.getElementById("box-notif-mobile");
var  messagenotifpersonal = document.getElementById("message-notif-personal");
var  messagenotifgeneral = document.getElementById("message-notif-general");
var  messagenotifpersonalM = document.getElementById("message-notif-personal-mobile");
var  messagenotifgeneralM = document.getElementById("message-notif-general-mobile");


var openmenu = document.querySelectorAll(".open-menu");

openmenu.forEach(openmenu => {
    openmenu.addEventListener('mouseover', function handleClick(event) {
        boxnotif.classList.remove("hide-item");
        iconnotif.classList.add("nav-right-icon-active");
    });
});


var overmenu = document.querySelectorAll(".over-menu");

overmenu.forEach(overmenu => {
    overmenu.addEventListener('mouseover', function handleClick(event) {
        boxnotifclo.classList.remove("hide-item");
    });
});


var exitmenu = document.querySelectorAll(".exit-menu");

exitmenu.forEach(exitmenu => {
    exitmenu.addEventListener('mouseover', function handleClick(event) {
        boxnotifclo.classList.add("hide-item");
        boxnotif.classList.add("hide-item");
        iconnotif.classList.remove("nav-right-icon-active");
    });
});


var clothemenu = document.querySelectorAll(".clothe-menu");

clothemenu.forEach(clothemenu => {
    clothemenu.addEventListener('click', function handleClick(event) {
        boxnotifclo.classList.add("hide-item");
        boxnotif.classList.add("hide-item");
        iconnotif.classList.remove("nav-right-icon-active");
    });
});


var personal = document.querySelectorAll(".personal");

personal.forEach(personal => {
    personal.addEventListener('click', function handleClick(event) {
        txtmessagenotifone.classList.add("item-notif-active");
        txtmessagenotiftwo.classList.remove("item-notif-active");
        messagenotifpersonal.classList.remove("hide-item");
        messagenotifgeneral.classList.add("hide-item");
    });
});


var general = document.querySelectorAll(".general");

general.forEach(general => {
    general.addEventListener('click', function handleClick(event) {
        txtmessagenotifone.classList.remove("item-notif-active");
        txtmessagenotiftwo.classList.add("item-notif-active");
        messagenotifpersonal.classList.add("hide-item");
        messagenotifgeneral.classList.remove("hide-item");
    });
});



var personalM = document.querySelectorAll(".personal-mobile");

personalM.forEach(personalM => {
    personalM.addEventListener('click', function handleClick(event) {
        txtmessagenotifthree.classList.add("item-notif-active");
        txtmessagenotiffour.classList.remove("item-notif-active");
        messagenotifpersonalM.classList.remove("hide-item");
        messagenotifgeneralM.classList.add("hide-item");
    });
});


var generalM = document.querySelectorAll(".general-mobile");

generalM.forEach(generalM => {
    generalM.addEventListener('click', function handleClick(event) {
        txtmessagenotifthree.classList.remove("item-notif-active");
        txtmessagenotiffour.classList.add("item-notif-active");
        messagenotifpersonalM.classList.add("hide-item");
        messagenotifgeneralM.classList.remove("hide-item");
    });
});


var clothemenuM = document.querySelectorAll(".clothe-menu-mobile");

clothemenuM.forEach(clothemenuM => {
    clothemenuM.addEventListener('click', function handleClick(event) {
        boxnotifmobile.classList.toggle("hide-item");
    });
});



//  hover menu .....................................................................


var  iconmenu1 = document.getElementById("icon-menu1");
var  iconmenu2 = document.getElementById("icon-menu2");
var  iconmenu3 = document.getElementById("icon-menu3");
var  iconmenu4 = document.getElementById("icon-menu4");
var  iconmenu5 = document.getElementById("icon-menu5");
var  iconmenu6 = document.getElementById("icon-menu6");
var  iconmenu7 = document.getElementById("icon-menu7");
var  iconmenu8 = document.getElementById("icon-menu8");
var  iconmenu9 = document.getElementById("icon-menu9");
var  iconmenu10 = document.getElementById("icon-menu10");
var  iconmenu11 = document.getElementById("icon-menu11");
var  iconmenu12 = document.getElementById("icon-menu12");
var  iconmenu13 = document.getElementById("icon-menu13");
var  iconmenu14 = document.getElementById("icon-menu14");
var  iconmenu15 = document.getElementById("icon-menu15");
var  iconmenu16 = document.getElementById("icon-menu16");
var  iconmenu17 = document.getElementById("icon-menu17");
var  iconmenu18 = document.getElementById("icon-menu18");
var  iconmenu19 = document.getElementById("icon-menu19");
var  iconmenu20 = document.getElementById("icon-menu20");
var  iconmenu22 = document.getElementById("icon-menu22");
var  iconmenu23 = document.getElementById("icon-menu23");

var menu1 = document.getElementById("menu1");
var menu2 = document.getElementById("menu2");
var menu3 = document.getElementById("menu3");
var menu4 = document.getElementById("menu4");
var menu5 = document.getElementById("menu5");
var menu6 = document.getElementById("menu6");
var menu7 = document.getElementById("menu7");
var menu8 = document.getElementById("menu8");
var menu9 = document.getElementById("menu9");
var menu10 = document.getElementById("menu10");


if(menu2 != undefined)
{
    menu2.addEventListener('mouseover', function handleClick(event) {
        iconmenu2.classList.remove("hide-item");
        iconmenu1.classList.add("hide-item");
    });


    menu2.addEventListener('mouseout', function handleClick(event) {
        iconmenu2.classList.add("hide-item");
        iconmenu1.classList.remove("hide-item");
    });
}


if(menu3 != undefined)
{
    menu3.addEventListener('mouseover', function handleClick(event) {
        iconmenu4.classList.remove("hide-item");
        iconmenu3.classList.add("hide-item");
    });


    menu3.addEventListener('mouseout', function handleClick(event) {
        iconmenu4.classList.add("hide-item");
        iconmenu3.classList.remove("hide-item");
    });
}

if(menu4 != undefined)
{
    menu4.addEventListener('mouseover', function handleClick(event) {
        iconmenu6.classList.remove("hide-item");
        iconmenu5.classList.add("hide-item");
    });


    menu4.addEventListener('mouseout', function handleClick(event) {
        iconmenu6.classList.add("hide-item");
        iconmenu5.classList.remove("hide-item");
    });
}

if(menu5 != undefined)
{
    menu5.addEventListener('mouseover', function handleClick(event) {
        iconmenu8.classList.remove("hide-item");
        iconmenu7.classList.add("hide-item");
    });


    menu5.addEventListener('mouseout', function handleClick(event) {
        iconmenu8.classList.add("hide-item");
        iconmenu7.classList.remove("hide-item");
    });
}

if(menu6 != undefined)
{
    menu6.addEventListener('mouseover', function handleClick(event) {
        iconmenu23.classList.remove("hide-item");
        iconmenu22.classList.add("hide-item");
    });


    menu6.addEventListener('mouseout', function handleClick(event) {
        iconmenu23.classList.add("hide-item");
        iconmenu22.classList.remove("hide-item");
    });
}

if(menu7 != undefined)
{
    menu7.addEventListener('mouseover', function handleClick(event) {
        iconmenu10.classList.remove("hide-item");
        iconmenu9.classList.add("hide-item");
    });


    menu7.addEventListener('mouseout', function handleClick(event) {
        iconmenu10.classList.add("hide-item");
        iconmenu9.classList.remove("hide-item");
    });
}

if(menu8 != undefined)
{
    menu8.addEventListener('mouseover', function handleClick(event) {
        iconmenu12.classList.remove("hide-item");
        iconmenu11.classList.add("hide-item");
    });


    menu8.addEventListener('mouseout', function handleClick(event) {
        iconmenu12.classList.add("hide-item");
        iconmenu11.classList.remove("hide-item");
    });
}

if(menu9 != undefined)
{
    menu9.addEventListener('mouseover', function handleClick(event) {
        iconmenu14.classList.remove("hide-item");
        iconmenu13.classList.add("hide-item");
    });


    menu9.addEventListener('mouseout', function handleClick(event) {
        iconmenu14.classList.add("hide-item");
        iconmenu13.classList.remove("hide-item");
    });
}


//  toggle menu mobile ................................................................


var sidebarpc = document.getElementById("sidebar-pc");
var messagefortnitestoremobile = document.getElementById("message-fortnite-store-mobile");
var messagegamingstoremobile = document.getElementById("message-gaming-store-mobile");
var boxclothemenumobile = document.getElementById("box-clothe-menu-mobile");
var iconforniteheaderstore = document.getElementById("icon-fornite-header-store");
var icongamingheaderstore = document.getElementById("icon-gaming-header-store");
var sizeWidth = document.body.offsetWidth;


if(sidebarpc != undefined)
{
    window.onresize = function (){
        var sizeWidth = document.body.offsetWidth;

        if(sizeWidth < 1025)
        {
            sidebarpc.classList.add("hide-item");
            boxclothemenumobile.classList.add("hide-item");
        }else
        {
            sidebarpc.classList.remove("hide-item");
        }
    }

    if(sizeWidth < 1025)
    {
        sidebarpc.classList.add("hide-item");
        boxclothemenumobile.classList.add("hide-item");
    }else
    {
        sidebarpc.classList.remove("hide-item");
    }
}



var openmenuM = document.querySelectorAll(".open-menu-mobile");

openmenuM.forEach(openmenuM => {
    openmenuM.addEventListener('click', function handleClick(event) {
        sidebarpc.classList.toggle("hide-item");
        boxclothemenumobile.classList.toggle("hide-item");
    });
});

//   script notifiction page  .......................................................

var toggleboxnotif1 = document.querySelectorAll(".toggle-box-notif1");
var boxnotifmassage1 = document.getElementById("box-notif-massage1");
var iconclothenotif = document.getElementById("icon-clothe-notif");
var iconopennotif = document.getElementById("icon-open-notif");

toggleboxnotif1.forEach(toggleboxnotif1 => {
    toggleboxnotif1.addEventListener('click', function handleClick(event) {
        console.log();
        boxnotifmassage1.classList.toggle("hide-item");
        iconclothenotif.classList.toggle("hide-item");
        iconopennotif.classList.toggle("hide-item");
    });
});

//  modal script   ................................................................

var radio1 = document.getElementById("radio1");
var radio2 = document.getElementById("radio2");
var btndisablemodal1 = document.getElementById("btn-disable-modal1");
var btnnextmodal = document.getElementById("btn-next-modal");
var btnpaymodal1 = document.getElementById("btn-pay-modal1");
var btnpaymodal2 = document.getElementById("btn-pay-modal2");
var btndisablemodal2 = document.getElementById("btn-disable-modal2");
var btnpaymodal3 = document.getElementById("btn-pay-modal3");
var btndisablemodal3 = document.getElementById("btn-disable-modal3");
var tickcircleradio1 = document.getElementById("tick-circle-radio1");
var tickcircleradio2 = document.getElementById("tick-circle-radio2");

if (radio1) {
    radio1.addEventListener('click', function handleClick(event) {
        btndisablemodal1.classList.add("hide-item");
        btnnextmodal.classList.remove("hide-item");
        btnpaymodal1.classList.add("hide-item");
        tickcircleradio1.classList.remove("hide-item");
        tickcircleradio2.classList.add("hide-item");
    });
}

if (radio2) {
    radio2.addEventListener('click', function handleClick(event) {
        btndisablemodal1.classList.add("hide-item");
        btnnextmodal.classList.add("hide-item");
        btnpaymodal1.classList.remove("hide-item");
        tickcircleradio1.classList.add("hide-item");
        tickcircleradio2.classList.remove("hide-item");
    });

}



var selectpricecarts = document.querySelectorAll(".select-price-carts");

selectpricecarts.forEach(selectpricecarts => {
    selectpricecarts.addEventListener('click', function handleClick(event) {
        btnpaymodal2.classList.remove("hide-item");
        btndisablemodal2.classList.add("hide-item");
    });
});


var selectpricecarts2 = document.querySelectorAll(".select-price-carts2");

selectpricecarts2.forEach(selectpricecarts2 => {
    selectpricecarts2.addEventListener('click', function handleClick(event) {
        btnpaymodal3.classList.remove("hide-item");
        btndisablemodal3.classList.add("hide-item");
    });
});

//  timre payment script   ................................................................

var Numberitempaysoon = document.getElementById("number-item-pay-soon");

var counter = 12;

var x = setInterval(function () {
    if(counter != 0)
    {
        counter--;
        Numberitempaysoon.innerHTML = counter;
    }else
    {
        counter = 12;
    }
}, 1000);

//  sliders script   ................................................................

var swiper = new Swiper(".mySwiper-cards-home", {
    slidesPerView: "auto",
    spaceBetween: 20,
    pagination: {
        el: ".swiper-pagination-cards",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-prev-cards",
        prevEl: ".swiper-button-next-cards",
    },
});

var swiper = new Swiper(".mySwiper-trainings-home", {
    slidesPerView: "auto",
    spaceBetween: 0,
    pagination: {
        el: ".swiper-pagination-trainings",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-prev-trainings",
        prevEl: ".swiper-button-next-trainings",
    },
});


var swiper = new Swiper(".mySwiper-trainings-mobile", {
    slidesPerView: "auto",
    spaceBetween: 15,
});
