// get element in make function plus ab reducse
let Weight = document.querySelector(".value"),
btnPlus = document.querySelector(".btn-plus"),
btnReduce = document.querySelector(".btn-reduce");
let i = 1;

Weight.textContent = 1;
btnPlus.onclick = ()=>{plus()}
btnReduce.onclick = ()=>{reduce()}

const plus = ()=>{
    Weight.textContent = i = i + .5;
    calculate()
}
const reduce = ()=>{
    if(Weight.textContent <= 0.5){
    }
    else{
        Weight.textContent = i = i - 0.5;
        calculate()
    }
} 
//get element use in calculate Weight
let salaryItem = document.querySelector(".salary-item"),
salaryAll = document.querySelector(".salary-all");



//calculate Weight
const calculate = ()=>{
    
    salaryAll.textContent = salaryItem.textContent * Weight.textContent
}
calculate();


