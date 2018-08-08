//programming radio button interactivity pt.1
function formText(){
    var len = document.myForm.ans1.length;
    for (i=0; i<len; i++){
        if(document.myForm.ans1[i].checked){
            rsvp = document.myForm.ans1[i].value; //return value of checked radio box
            //when this statement is true set variable and have it break out of loop
            break;
        }
    }
    alert("Your RSVP is: " + rsvp); //returned checked button value
}


/*
//programming text area element interactivity
function disTxt(){
    document.write(document.forms["myForm"]["myTa"].value);
}*/

/*
//programming test and button element interactivity
function calNums(){
    alert(Number(document.forms["myForm"]["iName"].value) + Number(document.forms["myForm"]["iName2"].value));
}*/

/*
//accessing form elements with javascript
function disName(){
    alert(document.forms["myForm"]["vname"].value)
}*/


/*
//Adding parameters to a function part 1 and 2
function myStuff(theTxt, theTxt2){
    alert(theTxt + "\n" + theTxt2);
}*/



/*
//calling a function based on an event
function myStuff(){
    alert("I just created my first function")
}
*/

/*
//creating custom functions

function myStuff(){
    document.write("I just created my first function");
}

//calling a function
myStuff();/*

/*
//creating basic math functions
var myNum = 156.25;

document.write(Math.floor(myNum)); //floor and round both round the number to the nearest integer
//logarithm = Math.log
//tangent = Math.tan
//Square Root = Math.sqrt
*/


/*
//basic string functions
var myWord = "This is my word.";

document.write(myWord.charAt(5));
*/



/*
//converting numbers to strings
var sNum1 = 4;
var sNum2 = 6;

document.write(String(sNum1) + String(sNum2));
*/



/*
//converting strings to numbers
var sNum1 = "4";
var sNum2 = "6";

document.write(Number(sNum1) + Number(sNum2));
*/


/*
//adding date and time
var myDate = new Date;

document.write(myDate.toLocaleTimeString());
*/

/*
//Do While Loop

var i = 5;

do{
    document.write(i + "<br>");
    i++;
}

while(i < 30){

} */

/*for(var i=0; i<10; i++){
    document.write("The count is " + i + "<br>");
}*/

/*
Switch statements

var question1 = prompt("Enter a number to find out what day of the week it is");
var theDay;
switch(question1)
{
    case "1":
        theDay = "That day is Monday";
        break;
    case "2":
        theDay = "That day is Tuesday";
        break;
}

document.write(theDay);

*/