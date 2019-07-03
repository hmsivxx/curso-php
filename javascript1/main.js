resetNumbers();

function verify(){
  var number1 = document.getElementById("number1").innerHTML;
  var number2 = document.getElementById("number2").value;

  if (number1 == number2) {
    alert("You got it");
  }else {
    alert("Try again dude");
  }
}

function resetNumbers(){
  document.getElementById("number1").innerHTML = "";

  var randomNumber = Math.floor(Math.random() * 100 + 1);

  document.getElementById("number1").innerHTML = randomNumber;
}
