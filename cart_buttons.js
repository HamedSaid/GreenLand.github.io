// this code control the  of results_buttons for quantity of plam_tree
var plam_tree = 1;
document.getElementById("results_buttons").innerHTML = plam_tree;

document.getElementById("increment").addEventListener("click", () => {
    document.getElementById("results_buttons").innerHTML = ++plam_tree;
    total_price();
});

document.getElementById("decrement").addEventListener("click", () => {
    if (plam_tree > 1) {
        document.getElementById("results_buttons").innerHTML = --plam_tree;
    }
    total_price();
});


// this code control the  of results_buttons_1 for quantity of Pomegranate_tree
var Pomegranate_tree = 1;
document.getElementById("results_buttons_1").innerHTML = Pomegranate_tree;

document.getElementById("increment_1").addEventListener("click", () => {
    document.getElementById("results_buttons_1").innerHTML = ++Pomegranate_tree;
    total_price();
});

document.getElementById("decrement_1").addEventListener("click", () => {
    if (Pomegranate_tree > 1) {
        document.getElementById("results_buttons_1").innerHTML = --Pomegranate_tree;
    }
    total_price();
});

// this code control the  of results_buttons_1 for quantity of Lilac
var Lilac = 1;
document.getElementById("results_buttons_2").innerHTML = Lilac;

document.getElementById("increment_2").addEventListener("click", () => {
    document.getElementById("results_buttons_2").innerHTML = ++Lilac;
    total_price();
});

document.getElementById("decrement_2").addEventListener("click", () => {
    if (Lilac > 1) {
        document.getElementById("results_buttons_2").innerHTML = --Lilac;
    }
    total_price();
});

// intialize variables of prices of trees
const Plam_price_for_one = 10;
const Pomegranate_price_for_one = 2;
const Lilac_price_for_one = 2.5;

// Function to sum the all prices on the cart
function total_price() {
    const quantity = [plam_tree, Pomegranate_tree, Lilac];
    const prices = [Plam_price_for_one, Pomegranate_price_for_one, Lilac_price_for_one];
    let total = 0;
    // use loop to count the total
    for (let i = 0; i < prices.length; i++) {
        total += prices[i] * quantity[i];
    }

    // the benefit of the tofixed for numbers of float after the comma x.00
    document.getElementById("total_all_prices").innerHTML = total.toFixed(2);
    localStorage.setItem('total_price', total.toFixed(2));
}

// Initialize the total price 
total_price();




