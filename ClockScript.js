var timer = setInterval(function() {//make a clock that updates every second
  myTimer();
}, 1000);

function myTimer() {//Clock function
  var d = new Date();//get current date/time
  document.getElementById("clock").innerHTML = d.toLocaleTimeString();//set inner HTML where this is implemented to contain local time info
}