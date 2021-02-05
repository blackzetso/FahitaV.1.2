

// get element nake function Order status
let status = document.querySelector(".status-value");

const orderStatus  = ()=>{
    if(status.textContent == "جاري التوصيل"){
        status.classList.add("connecting")
    }
    else if(status.textContent == "تم التوصيل"){
        status.classList.add("delivered")
    }
}
orderStatus();