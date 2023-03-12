// cash
let cashs = document.querySelectorAll('.cash');
let SumCash = 0;
cashs.forEach((item) => {
    SumCash += +item.innerHTML;
});
document.querySelector('.TotalCash').innerHTML = SumCash;

// terminal
let terminal = document.querySelectorAll('.terminal');
let SumTerminal = 0;
terminal.forEach((item) => {
    SumTerminal += +item.innerHTML;
});
document.querySelector('.TotalTerminal').innerHTML = SumTerminal;

// Summa
document.querySelector('.TotalSumma').innerHTML = SumCash + SumTerminal;

// Tovar
let product = document.querySelectorAll('.product');
let SumProduct = 0;
product.forEach((item) => {
    SumProduct += +item.innerHTML;
});
document.querySelector('.TotalProduct').innerHTML = SumProduct;

// Rasxod
let cost = document.querySelectorAll('.cost');
let SumCost = 0;
cost.forEach((item) => {
    SumCost += +item.innerHTML;
});
document.querySelector('.TotalCost').innerHTML = SumCost;

// Totalcashier

document.querySelector('.Totalcashier').innerHTML  = (SumCash + SumTerminal) - (SumCost);