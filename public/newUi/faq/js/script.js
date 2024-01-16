var acc0 = document.getElementById("accordion1");
var icoop0 = document.getElementById("iconacaopen1");

var acc2 = document.getElementById("accordion2");
var icoop2 = document.getElementById("iconacaopen2");

var acc3 = document.getElementById("accordion3");
var icoop3 = document.getElementById("iconacaopen3");

var acc4 = document.getElementById("accordion4");
var icoop4 = document.getElementById("iconacaopen4");

var acc5 = document.getElementById("accordion5");
var icoop5 = document.getElementById("iconacaopen5");

    acc0.addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
        panel.style.display = "none";
        icoop0.classList.remove("rotate");
    } else {
        panel.style.display = "block";
        icoop0.classList.add("rotate");
    }
    });

    acc2.addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
        panel.style.display = "none";
        icoop2.classList.remove("rotate");
    } else {
        panel.style.display = "block";
        icoop2.classList.add("rotate");
    }
    });

    acc3.addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
        panel.style.display = "none";
        icoop3.classList.remove("rotate");
    } else {
        panel.style.display = "block";
        icoop3.classList.add("rotate");
    }
    });

    acc4.addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
            icoop4.classList.remove("rotate");
        } else {
            panel.style.display = "block";
            icoop4.classList.add("rotate");
        }
        });

        acc5.addEventListener("click", function() {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.display === "block") {
                panel.style.display = "none";
                icoop5.classList.remove("rotate");
            } else {
                panel.style.display = "block";
                icoop5.classList.add("rotate");
            }
            });