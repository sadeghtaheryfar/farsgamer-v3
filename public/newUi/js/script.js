var menue = "0";
    
var aside = document.getElementById("aside");

var clotheMenu = document.getElementById("clothe-menu");

var boxnotifclothe = document.getElementById("box-notif-clothe");

var clotheboxnotife = document.getElementById("clotheboxnotife");

var bacboxnotif = document.getElementById("bac-box-notif");

var test = document.getElementById("test");


function openmenu()
{
    if(aside.style.display = "none")
    {
        aside.style.display = "flex";
        clotheMenu.style.display = "flex";
    }
}

function clothemenu()
{
    if(aside.style.display = "flex")
    {
        aside.style.display = "none";
        clotheMenu.style.display = "none";
    }
}


var iconnotif = document.getElementById("icon-notif");

function myfuncoaw()
{
    var boxnotif = document.getElementById("test");
    boxnotif.classList.add("show");
    iconnotif.classList.add("nav-right-icon-active");
}


function myfuncoaw5()
{
    var boxnotif = document.getElementById("test");
    boxnotif.classList.remove("show");
}


function myfuncoaw3()
{
    var boxnotifclo = document.getElementById("box-notif-clothe");
    boxnotifclo.classList.add("show");
}


function myfuncoaw4()
{
    var boxnotifclo = document.getElementById("box-notif-clothe");
    boxnotifclo.classList.toggle("show");
    var boxnotif = document.getElementById("test");
    boxnotif.classList.toggle("show");
    iconnotif.classList.remove("nav-right-icon-active");
}


function myfuncoaw2()
{
    var boxnotif = document.getElementById("test2");
    var boxnotifclo = document.getElementById("box-notif-clothe");
    boxnotif.classList.toggle("show");
    boxnotifclo.classList.toggle("show");
}



function cheangeheader1()
{
    var  txtmessagenotif1 = document.getElementById("header1-notif");
    var  txtmessagenotif2 = document.getElementById("header2-notif");
    var  messagenotif1 = document.getElementById("message-notif1");
    var  messagenotif2 = document.getElementById("message-notif2");

    txtmessagenotif1.classList.add("item-notif-active");
    txtmessagenotif2.classList.remove("item-notif-active");

    messagenotif1.classList.remove("hide-icon2");
    messagenotif2.classList.add("hide-icon2");
}


function cheangeheader2()
{
    var  txtmessagenotif1 = document.getElementById("header1-notif");
    var  txtmessagenotif2 = document.getElementById("header2-notif");
    var  messagenotif1 = document.getElementById("message-notif1");
    var  messagenotif2 = document.getElementById("message-notif2");

    txtmessagenotif2.classList.add("item-notif-active");
    txtmessagenotif1.classList.remove("item-notif-active");

    messagenotif2.classList.remove("hide-icon2");
    messagenotif1.classList.add("hide-icon2");
}


function cheangeheader3()
{
    var  txtmessagenotif3 = document.getElementById("header3-notif");
    var  txtmessagenotif4 = document.getElementById("header4-notif");
    var  messagenotif3 = document.getElementById("message-notif3");
    var  messagenotif4 = document.getElementById("message-notif4");

    txtmessagenotif3.classList.add("item-notif-active");
    txtmessagenotif4.classList.remove("item-notif-active");

    messagenotif3.classList.remove("hide-icon2");
    messagenotif4.classList.add("hide-icon2");
}


function cheangeheader4()
{
    var  txtmessagenotif3 = document.getElementById("header3-notif");
    var  txtmessagenotif4 = document.getElementById("header4-notif");
    var  messagenotif3 = document.getElementById("message-notif3");
    var  messagenotif4 = document.getElementById("message-notif4");

    txtmessagenotif4.classList.add("item-notif-active");
    txtmessagenotif3.classList.remove("item-notif-active");

    messagenotif4.classList.remove("hide-icon2");
    messagenotif3.classList.add("hide-icon2");
}



//  hover menu ..................................................




var  iconmenu1 = document.getElementById("icon-menu1")
var  iconmenu2 = document.getElementById("icon-menu2")


function menu1()
{
    iconmenu1.classList.toggle("hide-icon2");
    iconmenu2.classList.toggle("hide-icon2");
}


var  iconmenu3 = document.getElementById("icon-menu3")
var  iconmenu4 = document.getElementById("icon-menu4")


function menu2()
{
    iconmenu3.classList.toggle("hide-icon2");
    iconmenu4.classList.toggle("hide-icon2");
}


var  iconmenu5 = document.getElementById("icon-menu5")
var  iconmenu6 = document.getElementById("icon-menu6")


function menu3()
{
    iconmenu5.classList.toggle("hide-icon2");
    iconmenu6.classList.toggle("hide-icon2");
}


var  iconmenu7 = document.getElementById("icon-menu7")
var  iconmenu8 = document.getElementById("icon-menu8")


function menu4()
{
    iconmenu7.classList.toggle("hide-icon2");
    iconmenu8.classList.toggle("hide-icon2");
}


var  iconmenu9 = document.getElementById("icon-menu9")
var  iconmenu10 = document.getElementById("icon-menu10")


function menu5()
{
    iconmenu9.classList.toggle("hide-icon2");
    iconmenu10.classList.toggle("hide-icon2");
}


var  iconmenu11 = document.getElementById("icon-menu11")
var  iconmenu12 = document.getElementById("icon-menu12")


function menu6()
{
    iconmenu11.classList.toggle("hide-icon2");
    iconmenu12.classList.toggle("hide-icon2");
}


var  iconmenu13 = document.getElementById("icon-menu13")
var  iconmenu133 = document.getElementById("icon-menu133")
var  iconmenu14 = document.getElementById("icon-menu14")


function menu7()
{
    iconmenu133.classList.toggle("hide-icon2");
    iconmenu14.classList.toggle("hide-icon2");
}


var  iconmenu15 = document.getElementById("icon-menu15")
var  iconmenu16 = document.getElementById("icon-menu16")


function menu8()
{
    iconmenu15.classList.toggle("hide-icon2");
    iconmenu16.classList.toggle("hide-icon2");
}

var  iconmenu17 = document.getElementById("icon-menu17")
var  iconmenu18 = document.getElementById("icon-menu18")
var  iconmenu19 = document.getElementById("icon-menu19")
var  iconmenu20 = document.getElementById("icon-menu20")

function menu9()
{
    iconmenu17.classList.toggle("hide-icon2");
    iconmenu18.classList.toggle("hide-icon2");
    iconmenu19.classList.toggle("hide-icon2");
    iconmenu20.classList.toggle("hide-icon2");
    showboxhover()
}


var  iconmenu22 = document.getElementById("icon-menu22")
var  iconmenu23 = document.getElementById("icon-menu23")


function menu10()
{
    iconmenu22.classList.toggle("hide-icon2");
    iconmenu23.classList.toggle("hide-icon2");
}


// hover menu box store

var clotheboxhoverstore = document.getElementById("clothe-box-hover-store");
var boxheverstore = document.getElementById("box-hever-store");


function showboxhover()
{
    boxheverstore.classList.remove("hide-icon2");
    clotheboxhoverstore.classList.add("hide-icon2")
}


function hideboxhover()
{
    clotheboxhoverstore.classList.remove("hide-icon2");
}



function showclothemenu()
{
    boxheverstore.classList.add("hide-icon2");
    clotheboxhoverstore.classList.add("hide-icon2");
}



//  toggle item menu mobile 


var massageboxfilter = document.getElementById("massage-box-filter");

var img1boxfilter = document.getElementById("img1-box-filter");

var img2boxfilter = document.getElementById("img2-box-filter");


function togglefilter()
{
    massageboxfilter.classList.toggle("hide-icon-filter");
    img1boxfilter.classList.toggle("hide-icon-filter");
    img2boxfilter.classList.toggle("hide-icon-filter");
}


function togglefilter2()
{
    massageboxfilter2.classList.toggle("hide-icon-filter");
    img1boxfilter2.classList.toggle("hide-icon-filter");
    img2boxfilter2.classList.toggle("hide-icon-filter");
}


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