var motorCar = document.querySelector(".motorCar");
var motorCycle = document.querySelector(".motorCycle");
var threeWheel = document.querySelector(".threeWheel");
var commercial = document.querySelector(".commercial");

function seeData(id){
    if(id==1){
        motorCar.classList.remove("hidden");
        motorCycle.classList.add("hidden")
        threeWheel.classList.add("hidden")
        commercial.classList.add("hidden")
    }else if(id==2){
        motorCar.classList.add("hidden");
        motorCycle.classList.remove("hidden")
        threeWheel.classList.add("hidden")
        commercial.classList.add("hidden")
    }else if(id==3){
        motorCar.classList.add("hidden");
        motorCycle.classList.add("hidden")
        threeWheel.classList.remove("hidden")
        commercial.classList.add("hidden")
    }else{
        motorCar.classList.add("hidden");
        motorCycle.classList.add("hidden")
        threeWheel.classList.add("hidden")
        commercial.classList.remove("hidden")
    }
}