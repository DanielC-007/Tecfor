function passarInfo() {
    var bnt1 = document.getElementById("setabnt1");
    var bnt2 = document.getElementById("setabnt2");
    var box1 = document.getElementById("box1");
    var box2 = document.getElementById("box2");

    if (box1.style.display == "none" || box2.style.display == "block") {
        bnt1.style.display = "none";
        bnt2.style.display = "block";
        box1.style.display = "block";
        box2.style.display = "none";
    } else {
        bnt1.style.display = "block";
        bnt2.style.display = "none";
        box1.style.display = "none";
        box2.style.display = "block";
    }
}