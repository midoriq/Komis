window.onload = function() {
    console.log("zaladowano strone")
    var model = document.getElementById("model");
    var marka = document.getElementById("marka");
    if(marka.value == 0){
        model.disabled = true;
    }
}

function zmien(marka){
    console.log("dziala onchange");
    var model = document.getElementById("model");
    
    if(marka.value == 0){
        model.disabled = true;
    }
    else{
        model.disabled = false;
        console.log("siema, dziala warunek");
    }
}