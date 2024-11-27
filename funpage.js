
// // this file for funpage.html

// this for make the play button move
var playbutton = document.getElementById("play");
var width_button = playbutton.style.width;
var height_button = playbutton.style.height;

console.log(width_button)
console.log(height_button)

function moving() {
    if (playbutton.style.width < 200) {
        playbutton.style.width = `${500}`;
        playbutton.style.height = 5;
    }
    else {
        playbutton.style.width = width_button;
        playbutton.style.height = height_button;
    }
}

setInterval(moving, 1000)



// move to play page
var coverPage = document.getElementById("coverPage");
var playPage = document.getElementById("playPage");
var gameOverPage = document.getElementById("gameOverPage");

function startPlay() {
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
var qesiElement = document.getElementById("qesi");

var imgElement1 = document.getElementById("img1");
var imgElement2 = document.getElementById("img2");
var imgElement3 = document.getElementById("img3");

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

var answer_index = Math.floor(Math.random() * imags.length);
var quesion = names[answer_index]; 

function playGame() {
    scoreElement.innerHTML = "score= " + score;
    timeElement.innerHTML =  "time = " + time;
    
    qesiElement.innerHTML =  "find the image of '" + quesion + "'";
    

    // change images randomly
    randomimages()

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


function randomimages() {
    var ranIndex1 = Math.floor(Math.random() * imags.length);
    var ranIndex2 = Math.floor(Math.random() * imags.length);
    var ranIndex3 = Math.floor(Math.random() * imags.length);
    var ranIndex4 = Math.floor(Math.random() * imags.length);
    var ranIndex5 = Math.floor(Math.random() * imags.length);
    var ranIndex6 = Math.floor(Math.random() * imags.length);
    var ranIndex7 = Math.floor(Math.random() * imags.length);
    var ranIndex8 = Math.floor(Math.random() * imags.length);
    var ranIndex9 = Math.floor(Math.random() * imags.length);

    //for answer
    var srcsList = [ranIndex1, ranIndex2, ranIndex3,ranIndex4,ranIndex5,ranIndex6,ranIndex7,ranIndex8,ranIndex9];
    var randSrcIndex = Math.floor(Math.random() * srcsList.length);
    
    // check that the images will no repeat
    while(ranIndex1 == ranIndex2) {
        ranIndex2 = Math.floor(Math.random() * imags.length);
    }

    while(ranIndex3 == ranIndex2 || ranIndex3 == ranIndex1) {
        ranIndex3 = Math.floor(Math.random() * imags.length);
    }

    // to make sure that the answer will apper
    imags[randSrcIndex] = srcsList[randSrcIndex]; 


    imgElement1.src = imags[ranIndex1];
    imgElement2.src = imags[ranIndex2];
    imgElement3.src = imags[ranIndex3];
    return
}



function gameOver() {
    scoreElement2.innerHTML = "score= " + score;
    timeElement2.innerHTML =  "time = " + time;

    gameOverPage.style.display = "block";
}