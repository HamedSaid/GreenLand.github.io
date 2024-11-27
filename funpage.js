
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

var imags = ["statics/inhomePageEdit.jpg","statics/plam.jpg"];
var names = ["homePage", "plam"];

var score = 0;
var time = 10.0;

function playGame() {
    scoreElement.innerHTML = "score= " + score;
    timeElement.innerHTML =  "time = " + time;






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


function randomimage() {
    
}



function gameOver() {
    scoreElement2.innerHTML = "score= " + score;
    timeElement2.innerHTML =  "time = " + time;

    gameOverPage.style.display = "block";
}