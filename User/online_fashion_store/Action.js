var x1 = 'btn-';
var x2 = 'item-';
var x3 = 'Total';
var x4 = 'Discount';
var x5 = 'Total-price';

var price = 0;
var discount = 0;
var total = 0;
let i = 1;
var apply = false;

var btn1 = document.getElementById(`${x1}apply`);
btn1.disabled = true;

var btn2 = document.getElementById(`${x1}buy`);
btn2.disabled = true;

document.getElementById(`${x1}apply`).addEventListener("click", function(){
  const promoCode = document.getElementById("promo-code");
  if(promoCode.value == "SELL200"){
    apply = true;
    discount = (price * 20) / 100;
    total = total - discount;
    document.getElementById(x4).innerText = discount.toFixed(2);
    document.getElementById(x3).innerText = total.toFixed(2);
  }
});

function display(){
    document.getElementById(x5).innerText = price.toFixed(2);
    document.getElementById(x4).innerText = discount.toFixed(2);
    document.getElementById(x3).innerText = total.toFixed(2);
}
function updateDisplay() {

    if (price >= 200 && apply == true) {
        discount = (price * 20) / 100;
    } else {
        discount = 0;
    }
    total = price - discount;

    display();

    if (price > 0) {
        btn2.disabled = false;
    } else {
        btn2.disabled = true;
    }

    if (price >= 200) {
        btn1.disabled = false;
    } else {
        btn1.disabled = true;
    }
}

function addItem(itemId, itemName, itemPrice) {
    document.getElementById(itemId).addEventListener("click", function() {
        const itemSelect = document.getElementById("item-box");
        const p = document.createElement("p");
        p.innerText = i + itemName;
        itemSelect.appendChild(p);
        price += itemPrice;

        updateDisplay();

        i++;
    });
}

addItem(`${x2}1`, ".K. Accessories", 39.00);
addItem(`${x2}2`, ".K. Accessories", 25.00);
addItem(`${x2}3`, ".Home Cooker", 49.00);
addItem(`${x2}4`, ".Sports Back Cap", 49.00);
addItem(`${x2}5`, ".Full Jersey Set", 69.00);
addItem(`${x2}6`, ".Sports cates", 159.00);
addItem(`${x2}7`, ".Single Relax Chair", 185.00);
addItem(`${x2}8`, ".Children play", 299.00);
addItem(`${x2}9`, ".Flexible Sofa", 339.00);

document.getElementById("go-home").addEventListener("click", function(){
    window.location.reload();
});

updateDisplay();