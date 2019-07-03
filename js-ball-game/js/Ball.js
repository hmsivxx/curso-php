
class Ball {
  constructor(left, top){
    this.left = left;
    this.top = top;
  }

  addBall() {
    let ball = document.createElement("div");
    ball.setAttribute("class", "ball");
    ball.setAttribute("style", "width: 40px; height: 40px; border-radius: 20px; position: absolute; background-color: #000;");
    ball.setAttribute("style", "left: "+this.left+"px; top: "+this.top+"px;");
    ball.setAttribute("onclick", "ball.blowOff(this)");

    document.body.appendChild(ball);
  }

  blowOff(element){
    document.body.removeChild(element);
  }
}
/*
addBall(){
  let ball = document.createElement("div");
  ball.setAttribute("class", "ball");
  let left = Math.floor(Math.random() * 500 + 1);
  let top = Math.floor(Math.random() * 400 + 1);
  ball.setAttribute("style", "width: 40px; height: 40px; border-radius: 20px; position: absolute; background-color: #000;");
  ball.setAttribute("style", "left: "+left+"px; top: "+top+"px;");
  ball.setAttribute("onclick", "ball.blowOff(this)");

  document.body.appendChild(ball);

  setInterval(1000);
  setInterval(function(){
    let size = 40;
    ball.setAttribute("style", "width: "+size+"px; height: "+size+"px;");
    if (size == 1){
      console.log("You LOST");
      return 0;
    }
    size--;
  }, 100);

}
*/
