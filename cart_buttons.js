var plam_tree = 1;
document.getElementById("results_buttons").innerHTML = plam_tree;

document.getElementById("increment").addEventListener("click", () => {
    document.getElementById("results_buttons").innerHTML = ++plam_tree;
    total_price();
});

document.getElementById("decrement").addEventListener("click", () => {
    if (plam_tree > 0) {
        document.getElementById("results_buttons").innerHTML = --plam_tree;
    }
    total_price();
});

var Pomegranate_tree = 1;
document.getElementById("results_buttons_1").innerHTML = Pomegranate_tree;

document.getElementById("increment_1").addEventListener("click", () => {
    document.getElementById("results_buttons_1").innerHTML = ++Pomegranate_tree;
    total_price();
});

document.getElementById("decrement_1").addEventListener("click", () => {
    if (Pomegranate_tree > 0) {
        document.getElementById("results_buttons_1").innerHTML = --Pomegranate_tree;
    }
    total_price();
});

var Lilac = 1;
document.getElementById("results_buttons_2").innerHTML = Lilac;

document.getElementById("increment_2").addEventListener("click", () => {
    document.getElementById("results_buttons_2").innerHTML = ++Lilac;
    total_price();
});

document.getElementById("decrement_2").addEventListener("click", () => {
    if (Lilac > 0) {
        document.getElementById("results_buttons_2").innerHTML = --Lilac;
    }
    total_price();
});

const Plam_price_for_one = 10;
const Pomegranate_price_for_one = 2;
const Lilac_price_for_one = 2.5;

// Function to sum the all prices on the cart
function total_price() {
    const quantity = [plam_tree, Pomegranate_tree, Lilac];
    const prices = [Plam_price_for_one, Pomegranate_price_for_one, Lilac_price_for_one];
    let total = 0;

    for (let i = 0; i < prices.length; i++) {
        total += prices[i] * quantity[i];
    }

    // the benefit of the tofixed for numbers of float after the comma x.00
    document.getElementById("total_all_prices").innerHTML = total.toFixed(2);
    document.getElementById("total_all_prices_1").innerHTML = total.toFixed(2);

}

// Initialize the total price 
total_price();


// for pay cart
 // Function to calculate the total bill
 function calculateBill() {
    // Get the input values
    

    // Validate inputs
    if ( isNaN(age) || age <= 0) {
        document.getElementById('result').innerText = "Please enter valid inputs.";
        return;
    }
    else{        document.getElementById('result').innerText = "";
    }

    

    // Apply a 10% discount if the customer is above 60 years old
    if (age > 60) {
        total = total - (total * 0.10); // Subtract 10% discount
    }

    // Display the result
    document.getElementById('result').innerHTML = `
        Total Bill: $${total.toFixed(2)} 
        ${age > 60 ? '(10% Senior Discount Applied)' : ''}
    `;
}
