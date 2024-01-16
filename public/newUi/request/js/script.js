(function () {
    document.getElementById('form1').addEventListener('submit', calTotal);

    function calTotal(event) {
        event.preventDefault();
        const boxmassage =document.getElementById('box-massage');
        boxmassage.classList.toggle("hide");
    }
})();

function clotheboxmas() {
        const boxmassage =document.getElementById('box-massage');
        boxmassage.classList.toggle("hide");
}