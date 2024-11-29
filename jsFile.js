// this file is mostly for index.html

// get elements by ID
var titleElemnt = document.getElementById("title");
var imgsElemnt = document.getElementById("img");
// var dayElement = document.getElementById("day");


// array of images url
var imgs = ["statics/inhomePageEdit.jpg","statics/plam.jpg"];
var index = 0;
var opacity = 0;

// to change the style when the mouse move over the elemnt
function hoverJS() {
titleElemnt.style.backgroundColor = "rgb(42, 74, 70)";
titleElemnt.style.transformStyle = "preserve-3d";
titleElemnt.style.transitionDuration = "1000ms";
titleElemnt.style.transform = "translateY(-10px)";
}

titleElemnt.addEventListener("mouseover", hoverJS);

// if the mouse move out of elemnt 
titleElemnt.addEventListener("mouseout", function(){
titleElemnt.style.backgroundColor = "rgb(60, 107, 101, 0.8)";
titleElemnt.style.transformStyle = "preserve-3d";
titleElemnt.style.transitionDuration = "1000ms";
titleElemnt.style.transform = "translateY(+10px)";
});



// change image in 3seconds
function changeImg() {

if (index  < imgs.length-1 ){
    index++;
}
else {
    index = 0;
}

// to make the changes smooth
imgsElemnt.style.opacity = 0;
opacity = 0;


imgsElemnt.src = imgs[index];


setInterval(AddOpacity, 100); 
    
}
setInterval(changeImg, 3000);


function AddOpacity() {

if (opacity == 1){
    imgsElemnt.style.opacity = 0;
    opacity = 0;
}
else {
    opacity += 0.05
}
imgsElemnt.style.opacity =  `${opacity}`;
}

// add the day and time
// var today = new Date();
// dayElement.innerHTML = today;

/* This is a constructor function to create trees,seeds and flowers
objects so we can insert them in array after that to generate the table
*/

function Product(name, price, image) {
    this.name = name;
    this.price = price;
    this.image = image;
}

/* This function is to create a table with product data like name,price,image and add to cart button
which is assuming button to add a product in cart but it only shows an alert that the item has been added successfully

*/
function createTable(tableID, productsArray) {
    const tableBody = document.getElementById(tableID);
    let rows = '';
    for (const product of productsArray) {
        rows += `
            <tr>
                <td><img src="${product.image}" alt="${product.name}" class="productImg"></td>
                <td>${product.name}</td>
                <td>${product.price}</td>
                <td><button class="btn btnBackground" onclick="alert('${product.name} added successfully.')">Add to Cart</button></td>
            </tr>
        `;
    }
    tableBody.innerHTML = rows;
}

/*This function Search for information from the arrays
*/ 

function search(inputID, tableID, products) {
    const searchKey = document.getElementById(inputID).value.toLowerCase();
    let filteredProducts = [];
    for (const product of products) {
        if (product.name.toLowerCase().includes(searchKey)) {
            filteredProducts.push(product);
        }
    }
    createTable(tableID, filteredProducts);
}//end of function search