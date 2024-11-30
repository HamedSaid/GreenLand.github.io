 // this file for funpage.html


// move to play page
var coverPage = document.getElementById("coverPage");
var playPage = document.getElementById("playPage");
var gameOverPage = document.getElementById("gameOverPage");
const coverPageImages = setInterval(changeCoverImages, 1500)


// when the user click in coverPage (play new)
function startPlay() {
    clearInterval(coverPageImages)
    coverPage.style.display =  "none";
    playPage.style.display =  "block";
    playGame()
} 


// play page
// this only work when coverPage ==> not displayed
var scoreElement = document.getElementById("score");
var timeElement = document.getElementById("time");
var scoreElement2 = document.getElementById("score2");
var timeElement2 = document.getElementById("time2");
var discountElement = document.getElementById("discount");
var congratulationsEle = document.getElementById("congratulations");

var qesiElement = document.getElementById("qesi");

// variables to control the imags
var imgElement1 = document.getElementById("img1");
var imgElement2 = document.getElementById("img2");
var imgElement3 = document.getElementById("img3");

var imgElement4 = document.getElementById("img4");
var imgElement5 = document.getElementById("img5");
var imgElement6 = document.getElementById("img6");

var imgElement7 = document.getElementById("img7");
var imgElement8 = document.getElementById("img8");
var imgElement9 = document.getElementById("img9");


// list for sourse and there names 
var imags = [
            "statics/grapes.jpg","statics/plam.jpg", "statics/orange.jpg",
            "statics/straw.jpg", "statics/pog.jpg", "statics/mingt.jpg",
            "statics/papaya.jpg", "statics/lemon.jpg", "statics/fig.jpg"
            ];

var names = [
            "Grapes fruit", "plam tree","orange tree",
            "cherry fruit", "pomegranate tree", "mint tree",
            "Papaya fruit", "lemon tree", "fig tree"
            ];

var score = 0;
var time = 10.0;

var answer_index;
var quesion;


// the main part of the game
function playGame() {
    createAnswer()
    scoreElement.innerHTML = "score= " + score;
    timeElement.innerHTML =  "time = " + time;
    
    qesiElement.innerHTML =  "find the image of '" + quesion + "'";
    

    // change images randomly
    changeImages()

    function timegoOut() {
        if (time == 0) {
            playPage.style.display = "none"
            gameOver()
        }
        else {
            time -= 1;
            timeElement.innerHTML = "time = " + time; 
        }
    }
    setInterval(timegoOut, 1000)
}


// change images in the game from the basic of html
function changeImages() {
    // to make loop
    var imgElementsList = [
        imgElement1, imgElement2, imgElement3,
        imgElement4, imgElement5, imgElement6,
        imgElement7, imgElement8, imgElement9
                        ]

    
    // change sources for all imgs
    for (var i =0; i < imgElementsList.length; i++) {
        imgElementsList[i].src = imags[i]
    }
    

    // so the programme go outside this function after finish
    return
}



// if the time out
function gameOver() {
    
    var discount = 0;

    if (score >= 5) {
        discount = ( 1 / score) ;
        discountElement.innerHTML = "discount= " + discount;
        congratulationsEle.style.display = "block";
    }

    scoreElement2.innerHTML = "score= " + score;  
    gameOverPage.style.display = "block";

    
}


// this for checking if the user click in the correct answer
function checkAnswer(id) {
    if (answer_index == id) {
        console.log("correct answer");
        score++;
        time++;
        playGame()
    }
    
}

// create answers
function createAnswer() {
    answer_index = Math.floor(Math.random() * imags.length);
    quesion = names[answer_index];
    return
}


// this for change the images in the cover page
function changeCoverImages() {
    var coverImgElem1 = document.getElementById("coverImg1");
    var coverImgElem2 = document.getElementById("coverImg2");
    var coverImgElem3 = document.getElementById("coverImg3");
    var randomIndex;
    
    var coverImagesList = [
        coverImgElem1, coverImgElem2, coverImgElem3
    ]

    for (var i = 0; i < 3; i++) {
        randomIndex = Math.floor(Math.random() * imags.length)
        coverImagesList[i].src = imags[randomIndex]
    }
    return
}


