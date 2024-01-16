var counter = document.getElementById("counter");

var x = 1;

var boxplus1 = document.getElementById("box-plus1");

var boxminus1 = document.getElementById("box-minus1");


function plus()
{
    x ++;
    counter.innerHTML = x;
}


function minus()
{
    if(x > 1)
    {
        x --;
        counter.innerHTML = x;
    }
}