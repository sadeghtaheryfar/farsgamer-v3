var menue = "0";
    
var asidemobile = document.getElementById("aside-mobile");

var clotheMenu = document.getElementById("clothe-menu");

var boxnotifclothe = document.getElementById("box-notif-clothe");

var clotheboxnotife = document.getElementById("clotheboxnotife");

var bacboxnotif = document.getElementById("bac-box-notif");

var test = document.getElementById("test");

var massageboxfilter = document.getElementById("massage-box-filter");

var img1boxfilter = document.getElementById("img1-box-filter");

var img2boxfilter = document.getElementById("img2-box-filter");


var massageboxfilter2 = document.getElementById("massage-box-filter2");

var img1boxfilter2 = document.getElementById("img1-box-filter2");

var img2boxfilter2 = document.getElementById("img2-box-filter2");

var img1toggelbutton = document.getElementById("img1-toggel-button");

var img2toggelbutton = document.getElementById("img2-toggel-button");

var boxmassageordering = document.getElementById("box-massage-ordering");

var boxmassagefilter = document.getElementById("box-massage-filter");

var boxmassagefilterradio = document.getElementById("box-massage-filter-radio");

var boxmassagefilterrange = document.getElementById("box-massage-filter-range");

var img3toggebutton = document.getElementById("img3-toggel-button");

var img4toggelbutton = document.getElementById("img4-toggel-button");

var img4toggelbutton1 = document.getElementById("img4-toggel-button1");

var img4toggelbutton2 = document.getElementById("img4-toggel-button2");



function togglemenu()
{
    asidemobile.classList.toggle("hide-menu");
    clotheMenu.classList.toggle("hide-menu");
}


function togglebuttonfilter1()
{
    img2toggelbutton.classList.toggle("hide-toggel-button");
    img1toggelbutton.classList.toggle("hide-toggel-button");
}


function togglebuttonfilter2()
{
    img2toggelbutton.classList.toggle("hide-toggel-button");
    img1toggelbutton.classList.toggle("hide-toggel-button");
}


function togglebuttonfilter3()
{
    img4toggelbutton.classList.toggle("hide-toggel-button");
    img3toggebutton.classList.toggle("hide-toggel-button");
}


function togglebuttonfilter4()
{
    img4toggelbutton.classList.toggle("hide-toggel-button");
    img3toggebutton.classList.toggle("hide-toggel-button");
}


function togglebuttonfilter5()
{
    img4toggelbutton.classList.toggle("hide-toggel-button");
    img3toggebutton.classList.toggle("hide-toggel-button");
}


function toggleordering()
{
    boxmassageordering.classList.toggle("hide-icon-filter");
}

function toggelfilterboxto()
{
    boxmassagefilter.classList.toggle("hide-icon-filter");
}


function toggelraidiorbox()
{
    boxmassagefilterradio.classList.toggle("hide-icon-filter");
}


function toggelrangebox()
{
    boxmassagefilterrange.classList.toggle("hide-icon-filter");
}



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



// ssssssssssssssssssssssssssssssssssssssss


const rangeInput2 = document.querySelectorAll(".range-input2 input"),
priceInput2 = document.querySelectorAll(".price-input2 h2"),
range2 = document.querySelector(".slider2 .progress2");
let priceGap2 = 1000;
range2.style.right = 0;
range2.style.left = 0;
priceInput2.forEach(input =>{
    input.addEventListener("input", e =>{
        let minPrice = parseInt(priceInput2[0].innerHTML),
        maxPrice = parseInt(priceInput2[1].innerHTML);
        
        if((maxPrice - minPrice >= priceGap2) && maxPrice <= rangeInput2[1].max){
            if(e.target.className === "input-min2"){
                rangeInput2[0].value = minPrice;
                range2.style.left = ((minPrice / rangeInput2[0].max) * 100) + "%";
            }else{
                rangeInput2[1].value = maxPrice;
                range2.style.right = 100 - (maxPrice / rangeInput2[1].max) * 100 + "%";
            }
        }
    });
});
rangeInput2.forEach(input =>{
    input.addEventListener("input", e =>{
        let minVal = parseInt(rangeInput2[0].value),
        maxVal = parseInt(rangeInput2[1].value);
        if((maxVal - minVal) < priceGap2){
            if(e.target.className === "range-min2"){
                rangeInput2[0].value = maxVal - priceGap2;
            }else{
                rangeInput2[1].value = minVal + priceGap2;
            }
        }else{
            priceInput2[0].innerHTML = minVal;
            priceInput2[1].innerHTML = maxVal;
            range2.style.left = ((minVal / rangeInput2[0].max) * 100) + "%";
            range2.style.right = 100 - (maxVal / rangeInput2[1].max) * 100 + "%";
        }
    });
});


const rangeInput = document.querySelectorAll(".range-input input"),
priceInput = document.querySelectorAll(".price-input h2"),
range = document.querySelector(".slider .progress");
let priceGap = 1000;
range.style.right = 0;
range.style.left = 0;
priceInput.forEach(input =>{
    input.addEventListener("input", e =>{
        let minPrice = parseInt(priceInput[0].innerHTML),
        maxPrice = parseInt(priceInput[1].innerHTML);
        
        if((maxPrice - minPrice >= priceGap) && maxPrice <= rangeInput[1].max){
            if(e.target.className === "input-min"){
                rangeInput[0].value = minPrice;
                range.style.left = ((minPrice / rangeInput[0].max) * 100) + "%";
            }else{
                rangeInput[1].value = maxPrice;
                range.style.right = 100 - (maxPrice / rangeInput[1].max) * 100 + "%";
            }
        }
    });
});
rangeInput.forEach(input =>{
    input.addEventListener("input", e =>{
        let minVal = parseInt(rangeInput[0].value),
        maxVal = parseInt(rangeInput[1].value);
        if((maxVal - minVal) < priceGap){
            if(e.target.className === "range-min"){
                rangeInput[0].value = maxVal - priceGap
            }else{
                rangeInput[1].value = minVal + priceGap;
            }
        }else{
            priceInput[0].innerHTML = minVal;
            priceInput[1].innerHTML = maxVal;
            range.style.left = ((minVal / rangeInput[0].max) * 100) + "%";
            range.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
        }
    });
});


// const rangeInputto = document.querySelectorAll(".range-input2 input");
// const priceInpto = document.querySelectorAll(".price-input2 h2");
// const rangeto = document.querySelector(".slider2 .progress2");
// let priceGapto = 1000;
// rangeto.style.right = 0;
// rangeto.style.left = 0;
// rangeInputto.forEach(input =>{
//     input.addEventListener("input", e =>{
//         let minPriceto = parseInt(priceInpto[0].innerHTML),
//         maxPriceto = parseInt(priceInpto[1].innerHTML);
        
//         if((maxPriceto - minPriceto >= priceGapto) && maxPriceto <= rangeInputto[1].max){
//             if(e.target.className === "input-min2"){
//                 rangeInputto[0].value = minPriceto;
//                 rangeto.style.left = ((minPriceto / rangeInputto[0].max) * 100) + "%";
//             }else{
//                 rangeInputto[1].value = maxPriceto;
//                 rangeto.style.right = 100 - (maxPriceto / rangeInputto[1].max) * 100 + "%";
//                 console.log("hi");
//             }
//         }
//     });
// });
// rangeInputto.forEach(input =>{
//     input.addEventListener("input", e =>{
//         let minVal = parseInt(rangeInputto[0].value),
//         maxVal = parseInt(rangeInputto[1].value);
//         if((maxVal - minVal) < priceGapto){
//             if(e.target.className === "range-min2"){
//                 rangeInputto[0].value = maxVal - priceGapto;
//             }else{
//                 rangeInputto[1].value = minVal + priceGapto;
//             }
//         }else{
//             priceInpto[0].innerHTML = minVal;
//             priceInpto[1].innerHTML = maxVal;
//             rangeto.style.left = ((minVal / rangeInputto[0].max) * 100) + "%";
//             rangeto.style.right = 100 - (maxVal / rangeInputto[1].max) * 100 + "%";
//         }
//     });
// });



//  hover menuu ........................................

var menue = "0";
    
var aside = document.getElementById("aside-mobile");

var clotheMenu = document.getElementById("clothe-menu");

var boxnotifclothe = document.getElementById("box-notif-clothe");

var clotheboxnotife = document.getElementById("clotheboxnotife");

var bacboxnotif = document.getElementById("bac-box-notif");

var test = document.getElementById("test");


function openmenu()
{
    aside.classList.toggle("hide-menu");
    clotheMenu.classList.toggle("hide-menu");
}


function myfuncoaw()
{
    var boxnotif = document.getElementById("test");
    boxnotif.classList.add("show");
    console.log("hi");
}

function myfuncoaw2()
{
    var boxnotif = document.getElementById("test2");
    var boxnotifclo = document.getElementById("box-notif-clothe");
    boxnotif.classList.add("show");
    boxnotifclo.classList.add("show");
}



// hover menu box store


var clotheboxhoverstore = document.getElementById("clothe-box-hover-store");
var boxheverstore = document.getElementById("box-hever-store");


function showboxhovern()
{
    boxheverstore.classList.remove("hide-icon2");
    clotheboxhoverstore.classList.add("hide-icon2")
}


function hideboxhovern()
{
    clotheboxhoverstore.classList.remove("hide-icon2");
}



function showclothemenun()
{
    boxheverstore.classList.add("hide-icon2");
    clotheboxhoverstore.classList.add("hide-icon2");
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
var  iconmenu14 = document.getElementById("icon-menu14")


function menu7()
{
    iconmenu13.classList.toggle("hide-icon2");
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
}


function menu10()
{
    iconmenu19.classList.toggle("hide-icon2");
    iconmenu20.classList.toggle("hide-icon2");
}