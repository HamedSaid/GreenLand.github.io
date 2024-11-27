
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


function PlayPageChange() {
    coverPage.style.display =  "none";
    playPage.style.display =  "block";
} 


// play page
// this only work when coverPage ==> not displayed
var scoreElement = document.getElementById("score");
var timeElement = document.getElementById("time");

var score = 0;
var time = 0;

scoreElement.innerHTML = "score= " + score;
timeElement.innerHTML = "time= " + time;

