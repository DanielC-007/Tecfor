passarInfo();

function passarInfo() {
    var bnt1 = document.getElementById("setabnt1");
    var bnt2 = document.getElementById("setabnt2");
    var box1 = document.getElementById("box1");

    if (bnt1.style.visibility === "hidden") {
        bnt1.style.visibility = "visible";
        bnt2.style.visibility = "hidden";
    } else {
        bnt1.style.visibility = "hidden";
        bnt2.style.visibility = "visible";
    }
}