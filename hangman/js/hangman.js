//VARIABLES
var selectedWord = "";
var selectedHint = "";
var board = [];
var remainingGuesses = 6;
var words = [{word: "snake", hint: "It's a reptile" },
             {word: "monkey", hint: "It's a mammal" },
             {word: "beetle", hint: "It's an insect" }];

             
             
// Creating an array of available letters
var alphabet = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 
                'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 
                'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];


//LISTENER
window.onload = startGame();

//When clicking each letter do something
$("#letters").on("click", ".letter", function(){
    checkLetter($(this).attr("id"));
    disableButton($(this));
});

// Reload page when clicking on the replay button
$(".replayBtn").on("click", function() {
    location.reload();
});

//Display Hint
$(".hintButton").on("click", function(){
    $("#word").append("<br>");
    $("#word").append("<span class='hint'> Hint: " + selectedHint + "</span>");
    remainingGuesses--;
    $(".hintButton").hide();
    updateMan();

});




//FUNCTIONS
function startGame(){
    pickWord();
    initBoard(); //initalize board
    createLetters();
    updateBoard();
}

function initBoard(){
    for(var letter in selectedWord){ //in assigns letter to current index of selected word
        board.push("_");
    }
}

function pickWord(){
    var randomInt = Math.floor(Math.random() * words.length);
    selectedWord = words[randomInt].word.toUpperCase();
    selectedHint = words[randomInt].hint;
    
}

//create the letters inside the letters div
function createLetters(){
    for(var letter of alphabet){
        $("#letters").append("<button class='letter' id='" + letter + "'>" + letter + "</button>");
    }
}

function checkLetter(letter){
    var positions = new Array();
    
    for(var i = 0; i < selectedWord.length; i++){
        if(letter == selectedWord[i]){
            positions.push(i);
        }
    }
    
    if(positions.length > 0){
        updateWord(positions, letter);
        
        if(!board.includes('_')){
            endGame(true);
        }
    } else{
        remainingGuesses -= 1;
        updateMan();
    }
    
    if(remainingGuesses <= 0){
        endGame(false);
    }
}


function updateWord(positions, letter){
    for(var pos of positions){
        board[pos] = letter;
    }
    
    updateBoard();
}


// Helper function for replacing specific indexes in a string
function replaceAt(str, index, value) {
    return str.substr(0, index) + value + str.substr(index + value.length);
}


function updateBoard(){
    $("#word").empty();
    
    for(var i=0; i < board.length; i++){
        $("word").append(board[i] + " ");
    }
    
    for(var letter of board){
    document.getElementById("word").innerHTML += letter + " ";
    }
}

function updateMan(){
    $("#hangImg").attr("src", "img/stick_" + (6 - remainingGuesses) + ".png");
}

function endGame(win){
    $("#letters").hide();
    
    if(win){
        $('#won').show();
    } else{
        $('#lost').show();
    }
}

function disableButton(btn){
    btn.prop("disabled", true);
    btn.attr("class", "btn btn-danger");
}