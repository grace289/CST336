var gameScreen;
var output;
var bullets;
var ship;
var enemies = new Array();
var gameTimer;

var restartButton;

var leftArrowDown = false;
var rightArrowDown = false;

//global variabes and global constant that determines the speed at which the background moves
//use two backgrounds to ensure the background always moves
var bg1;
var bg2;
const BG_SPEED = 4;

//sets width and height of game screen
const GS_WIDTH = 800;
const GS_HEIGHT = 600;

var score = 0;


// replay
function replay()
{
	location.reload();
}

// display score
function display_score()
{
	$("#score").html("Your Score : " + score);
}


function init(){
	gameScreen = document.getElementById('gameScreen');
	gameScreen.style.width = GS_WIDTH + 'px';
	gameScreen.style.height = GS_HEIGHT + 'px';
	
	output = document.getElementById('output');

	ship = document.createElement('IMG');
	ship.src = 'millennium_falcon.png';
	ship.className = 'gameObject';
	ship.style.width = '68px';
	ship.style.height = '68px';
	ship.style.top = '500px';
	ship.style.left = '366px';
	
	//create two img elements for the background and add them to the gameScreen
	bg1 = document.createElement('IMG');
	bg1.className = 'gameObject';
	bg1.src = 'bg.jpg';
	bg1.style.width = '800px';
	bg1.style.height = '1422px';
	bg1.style.left = '0px';
	bg1.style.top = '0px';
	gameScreen.appendChild(bg1);
	
	bg2 = document.createElement('IMG');
	bg2.className = 'gameObject';
	bg2.src = 'bg.jpg';
	bg2.style.width = '800px';
	bg2.style.height = '1422px';
	bg2.style.left = '0px';
	bg2.style.top = '-1422px';
	gameScreen.appendChild(bg2);
	
	bullets = document.createElement('DIV');
	bullets.className = 'gameObject';
	bullets.style.width = gameScreen.style.width;
	bullets.style.height = gameScreen.style.height;
	bullets.style.left = '0px';
	bullets.style.top = '0px';
	gameScreen.appendChild(bullets);
	
	gameScreen.appendChild(ship);
	
	for(var i = 0; i < 10; i++){
		var enemy = new Image();
		enemy.className = 'gameObject';
		enemy.style.width = '64px';
		enemy.style.height = '64px';
		enemy.src = 'Tiefighter.png';
		gameScreen.appendChild(enemy);
		placeEnemyShip(enemy);
		enemies[i] = enemy;
	}
	

	gameTimer = setInterval(gameloop, 50);
	
}

function gameloop(){
	
	//make background continuously move
	var bgY = parseInt(bg1.style.top) + BG_SPEED;
	if(bgY > GS_HEIGHT){
		bg1.style.top = -1 * parseInt(bg1.style.height) + 'px';
	}
	else bg1.style.top = bgY + 'px';
	
	bgY = parseInt(bg2.style.top) + BG_SPEED;
	if(bgY > GS_HEIGHT){
		bg2.style.top = -1 * parseInt(bg2.style.height) + 'px';
	}
	else bg2.style.top = bgY + 'px';

	if(leftArrowDown){
		var newX = parseInt(ship.style.left);
		if(newX > 0) ship.style.left = newX - 20 + 'px';
		else ship.style.left = '0px';
	}

	if(rightArrowDown){
		var newX = parseInt(ship.style.left);
		var maxX = GS_WIDTH - parseInt(ship.style.width);
		if(newX <  maxX) ship.style.left = newX + 20 + 'px';
		else ship.style.left = maxX + 'px';
	}
	
	var b = bullets.children;
	for(var i = 0; i < b.length; i ++){
		var newY = parseInt(b[i].style.top) - b[i].speed;
		if(newY < 0) bullets.removeChild(b[i]);
		else{
			 b[i].style.top = newY + 'px';
			 for(var j=0; j<enemies.length; j++){
			 	if(hittest(b[i], enemies[j]) ){
					score++;
			 		bullets.removeChild(b[i]);
			 		explode(enemies[j]);
			 		placeEnemyShip(enemies[j]);
			 		break;
			 	}
			 }
		}
	}

	
	for(var i=0; i < enemies.length; i++){
		var newY = parseInt(enemies[i].style.top);
		if(newY > GS_HEIGHT) placeEnemyShip(enemies[i]);
		else enemies[i].style.top = newY + enemies[i].speed + 'px';
		
		if(hittest(enemies[i], ship) ){
			explode(ship);
			explode(enemies[i]);
			display_score();
			ship.style.top = '-10000px';
			placeEnemyShip(enemies[i]);
		}
	}
}

function fire(){
    new Audio("sounds/blaster_sound_effect.mp3").play();
	var bulletWidth = 4;
	var bulletHeight = 10;
	var bullet = document.createElement('DIV');
	bullet.className = 'gameObject';
	bullet.style.backgroundColor = 'green';
	bullet.style.width = bulletWidth;
	bullet.style.height = bulletHeight;
	bullet.speed = 20;
	bullet.style.top = parseInt(ship.style.top) - bulletHeight + 'px';
	var shipX = parseInt(ship.style.left) + parseInt(ship.style.width)/2;
	bullet.style.left = (shipX - bulletWidth/2) + 'px';
	bullets.appendChild(bullet);

}

function placeEnemyShip(e){
	e.speed = Math.floor(Math.random()*10) + 6;
	
	var maxX = GS_WIDTH - parseInt(e.style.width);
	var newX = Math.floor(Math.random()*maxX);
	e.style.left = newX + 'px';
	
	var newY = Math.floor(Math.random()*600) - 1000;
	e.style.top = newY + 'px';
}

//based on distance between the midpoints of two objects
function hittest(a,b){
	var aW = parseInt(a.style.width);
	var aH = parseInt(a.style.height);
	
	//get center point of object a
	var aX = parseInt(a.style.left) + aW/2;
	var aY = parseInt(a.style.top) + aH/2;
	
	//get radius of object a (average of height and width / 2)
	var aR = (aW + aH) / 4;
	
	var bW = parseInt(b.style.width);
	var bH = parseInt(b.style.height);
	
	//get center point of object b
	var bX = parseInt(b.style.left) + bW/2;
	var bY = parseInt(b.style.top) + bH/2;
	
	//get radius of object b (average of height and width / 2)
	var bR = (bW + bH) / 4;
	
	var minDistance = aR + bR;
	
	var cXs = (aX - bX) * (aX - bX); //change in X squared
	var cYs = (aY - bY) * (aY - bY); // change in Y squared
	
	var distance = Math.sqrt(cXs + cYs);
	
	if(distance < minDistance) return true;
	else return false;
	
}

function explode(obj){
	var explosion = document.createElement('IMG');
	explosion.src = 'explosion.gif?x=' + Date.now();
	explosion.className = 'gameObject';
	explosion.style.width = obj.style.width;
	explosion.style.height = obj.style.height;
	explosion.style.left = obj.style.left;
	explosion.style.top = obj.style.top;
	gameScreen.appendChild(explosion);
	new Audio("sounds/explosion_sound_effect.mp3").play();
}



//LISTENERS

// firing
$(document).on('keypress',function(event)
{
	if(event.which == 32)
	{
		fire();
	}
});

$(document).on('keydown',function(event)
{
	if(event.which == 37)
	{
		leftArrowDown = true;
	}
	if(event.which == 39)
	{
		rightArrowDown = true;
	}
});

$(document).on('keyup',function(event)
{
	if(event.which == 37)
	{
		leftArrowDown = false;
	}
	if(event.which == 39)
	{
		rightArrowDown = false;
	}
});


// Reload page when clicking on the replay button
$(".replayBtn").on("click", function() {
    location.reload();
});