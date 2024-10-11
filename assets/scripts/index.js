function passarInfo() {
    var bnt1 = document.getElementById("setabnt1");
    var bnt2 = document.getElementById("setabnt2");
    var box1 = document.getElementById("box1");
    var box2 = document.getElementById("box2");

    if (bnt1.style.visibility == "hidden" || bnt2.style.visibility == "visible") {
        bnt1.style.visibility = "visible";
        bnt2.style.visibility = "hidden";
        box1.style.animation = "opacidadeOff 1s";
        box2.style.animation = "opacidadeOn 1s";
        box1.style.visibility = "hidden";
        box2.style.visibility = "visible";
    } else {
        bnt1.style.visibility = "hidden";
        bnt2.style.visibility = "visible";
        box1.style.animation = "opacidadeOn 1s";
        box2.style.animation = "opacidadeOff 1s";
        box1.style.visibility = "visible";
        box2.style.visibility = "hidden";
    }
}