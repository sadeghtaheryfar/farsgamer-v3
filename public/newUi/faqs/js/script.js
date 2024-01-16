//  اعتبار سنجی فرم 

(function () {
    document.getElementById('form1').addEventListener('submit', calTotal);

    function calTotal(event) {
        const te1 =document.getElementById('code-prudect').value;
        const te2 =document.getElementById('mobile1').value;
        const errorenumber =document.getElementById('errore-number');
        const errorepeudect =document.getElementById('errore-prudect');

        if(te2 ==='' || te2.length != 11)
        {
            event.preventDefault();
            errorenumber.classList.add("hide");
            if(te1 ==='' )
            {
                errorepeudect.classList.add("hide");
                event.preventDefault();
            }else
            {
                errorepeudect.classList.remove("hide");
            }
        }else
        {
            if(te1 ==='' )
            {
                errorepeudect.classList.add("hide");
                event.preventDefault();
            }else
            {
                errorepeudect.classList.remove("hide");
            }
            errorenumber.classList.remove("hide");
        }
    }
})();