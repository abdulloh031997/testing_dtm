<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Security Survey</title>
  <meta name="description" content="Survey">
  <meta name="author" content="Luke Lehane">

 <style>
     /*Fonts
------------------------------------------------- */

@import 'https://fonts.googleapis.com/css?family=Montserrat|Open+Sans';

/* Grid
–––––––––––––––––––––––––––––––––––––––––––––––––– */

/*mobile first - container starts with 20px padding either side*/
.container {
  position: relative;
  width: 100%;
  /*change below to alter max-width of content*/
  max-width: 1024px;
  margin: 0 auto;
  padding: 0 20px;
  box-sizing: border-box; 
}
.column {
  margin-bottom: 1.5rem;
  width: 100%;
  float: left;
  box-sizing: border-box; 
}

/*For devices larger than 640px grid turns on and margins either side of container become 5% with no pixel padding*/
@media (min-width: 640px) {
  .container {
    width: 90%;
    padding: 0; }
  .column {
    margin-left: 4%; }
  .column:first-child {
    margin-left: 0; }

  .full-width.column              { width: 100%; margin-left: 0; }  

  .one-half.column                { width: 48%; }

  .one-third.column               { width: 30.6666666667%; }
  .two-thirds.column              { width: 65.3333333333%; }

  .one-quarter.column             { width: 22%; }
  .two-quarter.column             { width: 48%; }
  .three-quarter.column           { width: 74%; }

  .one-half.column                { width: 48%; }

            

}

/* Clearing
–––––––––––––––––––––––––––––––––––––––––––––––––– */

/* Self Clearing Goodness */
.container:after,
.row:after,
.clearfix {
  content: "";
  display: table;
  clear: both; }

/* END OF GRID */

body {
  font-family: 'Open Sans', sans-serif;
  font-size: 16px;
  color: #444444;
  background-color: #f1f1f1;
  margin: 0;
}

h1, h2, h3, h4 {
  font-family: 'Barclaycard Co Lt', sans-serif;
  color: #018fd0;
  margin-top: 0;
}

h1 {
  font-size: 54px;
}

h2 {
  font-size: 36px;
}

h3 {
  color: #5224a0;
  font-size: 26px;
}

/*Dummy BC header*/

.dummyheader {
  width: 100%;
  padding: 0;
  margin: 0 0 40px 0;
  box-shadow: 0px 3px 3px #eeeeee;
}

/*Question Components*/

.center {
  text-align: center;
}

.questions_box {
  background-color: #ffffff;
  padding: 60px;
  text-align: left;
  max-width: 960px;
}

.button {
  font-family: 'Barclaycard Co Lt',Tahoma,sans-serif;
  margin: 10px 0 0 0;
  float: right;
  cursor: pointer;

  font-size: 1em;
  border: none;
  padding: 10px 15px;
  line-height: 18px;
  -moz-border-radius: 3px;
  -webkit-border-radius: 3px;
  -o-border-radius: 3px;
  border-radius: 3px;
  vertical-align: baseline;
  background: #075da8;
  color: white;
  text-decoration: none !important;
  display: inline-block;
  -webkit-font-smoothing: subpixel-antialiased;
  -webkit-transition: background-color 200ms ease-in-out;
  -moz-transition: background-color 200ms ease-in-out;
  -o-transition: background-color 200ms ease-in-out;
  transition: background-color 200ms ease-in-out;
}

.button:hover {
  background-color: #059fdb !important;
  color: white;
}

#question-2, #question-3, #question-4, #question-5, #question-6, #question-7, #question-8, #question-9, #question-10, #question-11 {
  display: none;
}

#progress_bar {
  background-color: #018fd0;
  width: 10%;
  height: 10px;
  transition: all 100ms ease-in-out;
}
 </style>

</head>

<body>


  <div class="container">	
    <div class="row">
  	  <div class="two-thirds column">
        <h2>Security Survey</h2>

        <div id="progress_bar"></div>
  	  	<form class="questions_box">

  	  		<div id="question-1">
  	  		  <h2>Question 1</h2>
  	  			<h3>Do you worry about becoming a victim of fraud?</h3>
  	  			<input id="question-1-answer-a" type="radio" name="favelang" value=1> What's fraud?<br>
  				  <input id="question-1-answer-b" type="radio" name="favelang" value=2> Not at all<br>
  				  <input id="question-1-answer-c" type="radio" name="favelang" value=3> Yes, I worry about it a lot<br>
  				  <div id="submit1" class="button">Submit Answer</div>
            <div class="clearfix"></div>
  			  </div>

  			 <div id="question-2">
  				 <h2>Question 2</h2>
  				 <h3>Do you cover your pin when getting out cash?</h3>
  	  		 <input id="question-2-answer-a" type="radio" name="favelang" value="1"> No<br>
  				 <input id="question-2-answer-b" type="radio" name="favelang" value="2"> Sometimes<br>
  				 <input id="question-2-answer-c" type="radio" name="favelang" value="3"> All the time<br>
  				 <div id="submit2" class="button">Submit Answer</div>
           <div class="clearfix"></div>
  			 </div>
  			
  			 <div id="question-3">	
  				 <h2>Question 3</h2>
  				 <h3>Do you trust an email pertaining to be from your back asking for your password?</h3>
  	  		 <input id="question-3-answer-a" type="radio" name="favelang" value="1"> Yes, it's the bank afterall<br>
  				 <input id="question-3-answer-b" type="radio" name="favelang" value="2"> If it looks official, yes<br>
  				 <input id="question-3-answer-c" type="radio" name="favelang" value="3"> No way, a bank will never ask for your account password<br>
  				 <div id="submit3" class="button">Submit Answer</div>
           <div class="clearfix"></div>
  			 </div>

         <div id="question-4">
            <h2>Question 4</h2>
            <h3>Do you shred important documents after use?</h3>
            <input id="question-1-answer-a" type="radio" name="favelang" value="1"> No<br>
            <input id="question-1-answer-b" type="radio" name="favelang" value="2"> I rip them up and then throw them away<br>
            <input id="question-1-answer-c" type="radio" name="favelang" value="3"> Yes, shredding is the only way to ensure that no one gets to the information on them!<br>
            <div id="submit4" class="button">Submit Answer</div>
            <div class="clearfix"></div>
          </div>

          <div id="question-5">
            <h2>Question 5</h2>
            <h3>Do you share your PIN with anyone?</h3>
            <input id="question-1-answer-a" type="radio" name="favelang" value="1"> Yes, anyone that asks for it<br>
            <input id="question-1-answer-b" type="radio" name="favelang" value="2"> Not really, but sometimes I let my partner get cash out for me<br>
            <input id="question-1-answer-c" type="radio" name="favelang" value="3"> Never!<br>
            <div id="submit5" class="button">Submit Answer</div>
            <div class="clearfix"></div>
          </div>

          <div id="question-6">
            <h2>Question 6</h2>
            <h3>Do you cover your PIN when drawing out cash?</h3>
            <input id="question-1-answer-a" type="radio" name="favelang" value="1"> No<br>
            <input id="question-1-answer-b" type="radio" name="favelang" value="2"> Yes, but only if a shady character is standing behind me<br>
            <input id="question-1-answer-c" type="radio" name="favelang" value="3"> Yes, every time.<br>
            <div id="submit6" class="button">Submit Answer</div>
            <div class="clearfix"></div>
          </div>

          <div id="question-7">
            <h2>Question 7</h2>
            <h3>Do you check our bank statement regularly?</h3>
            <input id="question-1-answer-a" type="radio" name="favelang" value="1"> No, I haven't got time for such things<br>
            <input id="question-1-answer-b" type="radio" name="favelang" value="2"> I give it a quick glance when I remember<br>
            <input id="question-1-answer-c" type="radio" name="favelang" value="3"> Yes, every month I make sure I know exactly what transaction is what<br>
            <div id="submit7" class="button">Submit Answer</div>
            <div class="clearfix"></div>
          </div>

          <div id="question-8">
            <h2>Question 8</h2>
            <h3>Do you keep extra cash under your bed?</h3>
            <input id="question-1-answer-a" type="radio" name="favelang" value="1"> Yes, thousands of pounds in wads of £100s<br>
            <input id="question-1-answer-b" type="radio" name="favelang" value="2"> Just a bit for a rainy day<br>
            <input id="question-1-answer-c" type="radio" name="favelang" value="3"> No, that would be risky<br>
            <div id="submit8" class="button">Submit Answer</div>
            <div class="clearfix"></div>
          </div>

          <div id="question-9">
            <h2>Question 9</h2>
            <h3>Do you use different passwords for different accounts?</h3>
            <input id="question-1-answer-a" type="radio" name="favelang" value="1"> No, I'd never be able to remember them all<br>
            <input id="question-1-answer-b" type="radio" name="favelang" value="2"> Yes, and I have them all written down in a book called clearly labelled 'passwords'<br>
            <input id="question-1-answer-c" type="radio" name="favelang" value="3"> Yes, I remember them all in my head<br>
            <div id="submit9" class="button">Submit Answer</div>
            <div class="clearfix"></div>
          </div>

          <div id="question-10">
            <h2>Question 10</h2>
            <h3>Do you make sure your passwords are hard to guess?</h3>
            <input id="question-1-answer-a" type="radio" name="favelang" value="1"> No, I need to remember them so they are usually 'password123'<br>
            <input id="question-1-answer-b" type="radio" name="favelang" value="2"> I have one really strong password that I use for everything<br>
            <input id="question-1-answer-c" type="radio" name="favelang" value="3"> Yes, and I remember them all in my head with a special memory technique<br>
            <div id="submit10" class="button">Submit Answer</div>
            <div class="clearfix"></div>
          </div>

         <div id="question-11"> 
           <h2>Thanks for answering!</h2>
           <h3>Your security score is</h3>
           <h1 id=printtotalscore></h1>
           <p id=printscoreinfo></p>

         </div>


  				
  	  	</form>

  	  </div>
  	</div>
  </div>

<script>
    /*------------------*/
//Store answers and then add them up

// create an empty object to store answers
var answers = {};

// get each question div element

var question_one = document.getElementById('question-1');
var question_two = document.getElementById('question-2');
var question_three = document.getElementById('question-3');
var question_four = document.getElementById('question-4');
var question_five = document.getElementById('question-5');
var question_six = document.getElementById('question-6');
var question_seven = document.getElementById('question-7');
var question_eight = document.getElementById('question-8');
var question_nine = document.getElementById('question-9');
var question_ten = document.getElementById('question-10');


// create event listeners so that when a radio button is clicked the 'value' is added to answers object as a value. All answers from the same question are stored in the same object property so choices overright each other!

// create a function that adds HTML input values to new properties in answers object. 'parseInt' converts string to number.

function storeAnswer(question_number, event) {
  if (event.target.type === 'radio') {
    console.log(event.target.value);
    answers['question'+question_number] = parseInt(event.target.value);
  }
}

//add event listener to each question div. Click event calls storeAnswer function with corresponding question number passed as an argument so that correct object property is created

question_one.addEventListener('click', function(event) {
  storeAnswer(1, event);
});

question_two.addEventListener('click', function(event) {
  storeAnswer(2, event);
});

question_three.addEventListener('click', function(event) {
  storeAnswer(3, event);
});

question_four.addEventListener('click', function(event) {
  storeAnswer(4, event);
});

question_five.addEventListener('click', function(event) {
  storeAnswer(5, event);
});

question_six.addEventListener('click', function(event) {
  storeAnswer(6, event);
});

question_seven.addEventListener('click', function(event) {
  storeAnswer(7, event);
});

question_eight.addEventListener('click', function(event) {
  storeAnswer(8, event);
});

question_nine.addEventListener('click', function(event) {
  storeAnswer(9, event);
});

question_ten.addEventListener('click', function(event) {
  storeAnswer(10, event);
});


// create a function to add up all answers. I hate this because I've had to hard code the answer object's properties. Need to make BETTER

function totalScore() {
  var total_score =
  answers.question1+
  answers.question2+
  answers.question3+
  answers.question4+
  answers.question5+
  answers.question6+
  answers.question7+
  answers.question8+
  answers.question9+
  answers.question10;

  return total_score;

}

// create a function that returns information about score depending on what the score is

function getInfoBasedOnScore() {
  if(totalScore() < 11) {
    var score_info = "This is not good enough";
  } else if(totalScore() < 21) {
    var score_info = "This is quite a good score";
  } else {
    var score_info = "You are awesome";
  };

  return score_info;

}


/*-------------------------------------*/
/*Show and Hide questions on submit*/

// get each submit button element
var submit1 = document.getElementById('submit1');
var submit2 = document.getElementById('submit2');
var submit3 = document.getElementById('submit3');
var submit4 = document.getElementById('submit4');
var submit5 = document.getElementById('submit5');
var submit6 = document.getElementById('submit6');
var submit7 = document.getElementById('submit7');
var submit8 = document.getElementById('submit8');
var submit9 = document.getElementById('submit9');
var submit10 = document.getElementById('submit10');

// declare a function that toggles display style of question divs
// the function takes an argument which should be THE NEXT QUESTION number
function nextQuestion(question_number) {

  //get the last question number (the argument passed minus 1!)
  var current_question_number = question_number - 1;

  //turn both question number vars into strings
  var question_number = question_number.toString();
  var current_question_number = current_question_number.toString();

  //get the next question div element (concatenate next q number onto to 'question-')
  var el = document.getElementById('question-'+question_number);

  //get the current question div element
  var el2 = document.getElementById('question-'+current_question_number);
  
  //display next question
  el.style.display = "block";

  //hide current question
  el2.style.display = "none";
}

//add event listeners to each submit button element and call nextQuestion function on click. Also calling function to grow progress bar.
submit1.addEventListener('click', function() {
  
  nextQuestion(2);
  growProgressBar('20%');
});

submit2.addEventListener('click', function() {
  nextQuestion(3);
  growProgressBar('30%');
});

submit3.addEventListener('click', function() {
  nextQuestion(4);
  growProgressBar('40%');
});

submit4.addEventListener('click', function() {
  nextQuestion(5);
  growProgressBar('50%');
});

submit5.addEventListener('click', function() {
  nextQuestion(6);
  growProgressBar('60%');
});

submit6.addEventListener('click', function() {
  nextQuestion(7);
  growProgressBar('70%');
});

submit7.addEventListener('click', function() {
  nextQuestion(8);
  growProgressBar('80%');
});

submit8.addEventListener('click', function() {
  nextQuestion(9);
  growProgressBar('90%');
});

submit9.addEventListener('click', function() {
  nextQuestion(10);
  growProgressBar('100%');
});

submit10.addEventListener('click', function() {
  nextQuestion(11);
});


/*-------------------------------------*/
/*Display score and badge*/

submit10.addEventListener('click', function() {

  //print answers to questions by adding respective object properties to innerHTML of correct p elements on thank you page!
  document.getElementById("printtotalscore").innerHTML = totalScore();
  document.getElementById("printscoreinfo").innerHTML = getInfoBasedOnScore();


});

/*End of functionality -------------------------------------------------------------
------------------------------------------------------------------------------------
------------------------------------------------------------------------------------
--------------------------------------------------------------------------*/


/*Pretty things -----------------------------------------------------------------*/

function growProgressBar(percentage_width) {
  var bar = document.getElementById("progress_bar");
  bar.style.width = percentage_width;
}

/*----TO DO----*/
//display a report at the end showing all answers and info for each one

//Sometimes Always Never
</script>
</body>
</html>