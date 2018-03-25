<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="icon" href="img/yoda4.ico">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
  <title>Chase</title>
<?php 
$choixnavig="";
$choixnavig=isset($_POST['navigateur'])?$_POST['navigateur']:$choixnavig;
if(!isset($_POST['accesausite'])){
  $_POST['accesausite']="";
}
if(!empty($choixnavig)){  ?>

</head>
<body id="chasepage">
  <div class="all"> 
    <h1 id="titre">Show</h1>
    <div class="cheval">  </div>
    <div class="bouton">
      <button id="bouton"  onclick="ajaxtxt()">CLIQUE!</button>
      <button id="bouton2"  onclick="cheval()">CLIQUE encore!</button>
      <button id="bouton3" onclick="playMickey()">encore!</button>
      <button id="bouton4"  onmouseover="catchme()">encore une fois!</button>
    </div>
    <?php if($choixnavig!="safari"){ ?>
    <div class='photo'><button class='btn-treehouse' href='#' onclick='confirmwebcam()'>Tu veux ta photo?</button></div>
    <?php } ?>
    <div class="mickey"></div>
    <div id="finfeu"></div>
    <div class="bouton" id="photobooth"></div>
    <img class="photomaton" src="" alt="">
  </div>
  <div class="firework">
    <canvas id="canvas">Canvas is not supported in your browser.  </canvas>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script> 

    var navig="<?php echo $choixnavig; ?>";

    var hauteurall=$(".all").height();
    var hauteur=window.innerHeight;
    var hauteurcanvas=hauteur-hauteurall;
    var hauteurvideo=hauteur-hauteurall;
    var largeurvideo;
    largeurvideo=(hauteurvideo/9)*16;
    var videoOn;
    var fireOn;
    var largeur=window.innerWidth;
    $("canvas").hide();
    function ajaxtxt(){
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
           // Typical action to be performed when the document is ready:
           document.getElementById("titre").innerHTML = xhttp.responseText;
        }
      };
      xhttp.open("POST", "data/data.txt", true);
      xhttp.send();
      $("canvas").css("cursor", "url(img/yoda4cursor.cur),crosshair");
      $("#finfeu").html("<div class='bouton'> <button class='fin' onclick='endfires()'>Fin au feu</button></div>");
      hauteurcanvas;
    }
$("#bouton").click(function(){
      $("#canvas").show();
        loop();
        hauteurcanvas;
    });

    function endfires(){
      $('.fin').hide();
      $("#canvas").hide();
        hauteurcanvas;
    }
    
    function catchme(){
      var top=Math.floor((Math.random() * 500) + 1);
      var left=Math.floor((Math.random() * 800) + 1);
      $("#bouton4").css({
        "position":"absolute",
        "top":top,
        "left":left
      });
      var audioplayer = new Audio('data/encoreunefois.mp3');
      audioplayer.play();
        hauteurcanvas;
    }
    
    function cheval(){
      $(".cheval").html("<img id='cheval' src='img/transparent.png' />").slideDown();
      var left=["0","200","400","600"];
      var top=["0","135","270"];
      $.each(top,function(i,val){
        $.each(left,function(key,value){
          $("#cheval").delay(300).animate({
          "background-position-y": "-"+val+"px",
          "background-position-x": "-"+value+"px"
          },1);
        });
      });
        hauteurcanvas;
      $(".cheval").delay(3600).slideUp();

        hauteurcanvas;  
      return false;
    }

    var myvar;
    var compte=1;    
    function playMickey(){
      compte++;
      if(compte%2!=0){
        $(".mickey").html("");
        clearInterval(myvar);
        hauteurcanvas;
        compte=1;
      }else{
        $(".mickey").html("<img id='mickey' src='img/transparent2.png' />  <div class='bouton'>   <button class='stop' onclick='stopbutton()'>PAUSE</button></div>");
        mickey();
        myvar=setInterval(mickey,1600);
        hauteurcanvas;
      }
    }
      
    function mickey(){
      var gauche=["850","1000","1150","1300"];
      var haut=["60","260"];
      $.each(haut,function(keyb,valueb){
        $.each(gauche,function(itou,valeur){
          $("#mickey").delay(200).animate({
            "background-position-y": "-"+valueb+"px",
            "background-position-x": "-"+valeur+"px"
          },1);
       });
      });
    }
    $('.stop').onclick = function(){stopbutton()};
    
    function stopbutton(){
      $("#mickey").stop();
      clearInterval(myvar);
      compte=1;
      $(".mickey").html("<img id='mickey' src='img/transparent2.png' /><button class='play' onclick='playMickey()'>PLAY</button>");
    }

    $(".photomaton").hide();
    var confirmation=0;
    var video;
    var localstream;
    var conserver=0;
        hauteurcanvas;
    function confirmwebcam(){
      confirmation=confirm("Nous avons besoin d'accéder à la webcam, \nle temps de prendre la photo.");
      if(confirmation==1){
        $(".photo").hide();
        $(".photomaton").after("<canvas id='canvasvideo'></canvas>");
        $("#canvasvideo").hide();
        $(".firework").prepend("<video id='MediaStreamVideo' class='camera_stream'></video>");
        stopbutton();
        hauteurcanvas;
        $(".mickey").html("");
        var stream;
        largeurvideo=(hauteurvideo/9)*16;
        videoOn="on";
        $("#MediaStreamVideo").css({"width":largeurvideo,"max-width":"700px","height":hauteurvideo, "max-height":"400px"});
        video = document.getElementById('MediaStreamVideo');
        $("#photobooth").html("<button id='smile' onclick='takeSnapshot()'>PHOTO</button><div class='bouton'><button onclick='stopphotomaton()'>Quitter le photomaton</button>");
        navigator.getUserMedia = navigator.getUserMedia ||
                         navigator.webkitGetUserMedia ||
                         navigator.mozGetUserMedia;
        if (navigator.getUserMedia) {
          navigator.getUserMedia(
            {video: true}, // Options
            function(stream){

            // Create an object URL for the video stream and
            // set it as src of our HTLM video element.
            video.src = window.URL.createObjectURL(stream);
            localstream=stream;
              // Play the video element to show the stream to the user.
              video.onloadedmetadata = function(e) {
            video.play();
         };
      },
      function(err) {
         console.log("The following error occurred: " + err.name);
      }
   );
} else {
   console.log("getUserMedia not supported");
}
    }
  }
    var data;
    var photoprise;
    function takeSnapshot(){

        hauteurcanvas;
      var hidden_canvas = document.getElementById('canvasvideo'),
        videoht = document.querySelector('video.camera_stream'),
        image = document.querySelector('img.photomaton'),
        // Get the exact size of the video element.
        width = videoht.videoWidth,
        height = videoht.videoHeight,
        // Context object for working with the canvas.
        context = hidden_canvas.getContext('2d');
        

      photoprise="oui";
      conserver=1;
      // Set the canvas to the same dimensions as the video.
      hidden_canvas.width = width;
      hidden_canvas.height = height;
      // Draw a copy of the current frame from the video on the canvas.
      context.drawImage(videoht, 0, 0, width, height);
      // Get an image dataURL from the canvas.
      data = hidden_canvas.toDataURL('image/png');
      // Set the dataURL as source of an image element, showing the captured photo.
      image.setAttribute('src', data); 
      $("#MediaStreamVideo").css({
        "width":"435px",
        "display":"inline-block",
        "float":"right",
        "margin-right":"5%",
        "margin-top":"1%"
      });
      $(".photomaton").css({
        "width":"505px",
        "display":"inline-block",
        "float":"left",
        "margin-top":"1%",
        "margin-left":"5%",
        "border": "solid 2px rgba(75,213,238,0.7)"

      });
      $(".fireworks").slideUp(100).hide();
      $(".photomaton").slideDown(100);
      $("#photobooth").html("<div class='bouton'><?php if($choixnavig=="chrome"){ ?><button><a id='savephoto' href='#' download='selfie.png'>enregistrer</a></button><?php } ?><button onclick='takeSnapshot()'>recommencer</button></div><div class='bouton'><button onclick='stopphotomaton()'>Quitter le photomaton</button></div> ");
      document.getElementById('savephoto').href = data;
    }
    
    var regrets=0;
    function stopphotomaton(){
      <?php if($choixnavig=="chrome"){ ?>
      if(photoprise=="oui"){
        regrets=confirm("Si vous n'avez pas enregistré la photo, elle sera perdue, cliquez sur cancel si vous avez des regrets.");
      }
      if(regrets==1||conserver==0){ <?php }?>
        video.pause();
        video.src = "";
        localstream.getTracks()[0].stop();
        $("#photobooth").html("");
        $(".photo").show();
        $(".photomaton").slideUp(1);
        $("video").slideUp(1);
        videoOn="off";
        hauteurcanvas;
      }
      <?php if($choixnavig=="chrome"){ ?>
    }<?php }?>

    //******************FIREWORKS************************
    // when animating on canvas, it is best to use requestAnimationFrame instead of setTimeout or setInterval
// not supported in all browsers though and sometimes needs a prefix, so we need a shim
window.requestAnimFrame = ( function() {
  return window.requestAnimationFrame ||
        window.webkitRequestAnimationFrame ||
        window.mozRequestAnimationFrame ||
        function( callback ) {
          window.setTimeout( callback, 1000 / 60 );
        };
})();
if(videoOn=='on'){
  hauteurcanvas=hauteurcanvas-$("video").height;
}
console.log(hauteurcanvas);
// now we will setup our basic variables for the demo
var canvas = document.getElementById( 'canvas' ),
    ctx = canvas.getContext( '2d' ),
    // full screen dimensions
    cw = window.innerWidth-20%(window.innerWidth),
    ch = hauteurcanvas,
    // firework collection
    fireworks = [],
    // particle collection
    particles = [],
    // starting hue
    hue = 120,
    // when launching fireworks with a click, too many get launched at once without a limiter, one launch per 5 loop ticks
    limiterTotal = 5,
    limiterTick = 0,
    // this will time the auto launches of fireworks, one launch per 80 loop ticks
    timerTotal = 80,
    timerTick = 0,
    mousedown = false,
    // mouse x coordinate,
    mx,
    // mouse y coordinate
    my;
    
// set canvas dimensions
canvas.width = cw;
canvas.height = ch;

// now we are going to setup our function placeholders for the entire demo

// get a random number within a range
function random( min, max ) {
  return Math.random() * ( max - min ) + min;
}

// calculate the distance between two points
function calculateDistance( p1x, p1y, p2x, p2y ) {
  var xDistance = p1x - p2x,
      yDistance = p1y - p2y;
  return Math.sqrt( Math.pow( xDistance, 2 ) + Math.pow( yDistance, 2 ) );
}

// create firework
function Firework( sx, sy, tx, ty ) {
  // actual coordinates
  this.x = sx;
  this.y = sy;
  // starting coordinates
  this.sx = sx;
  this.sy = sy;
  // target coordinates
  this.tx = tx;
  this.ty = ty;
  // distance from starting point to target
  this.distanceToTarget = calculateDistance( sx, sy, tx, ty );
  this.distanceTraveled = 0;
  // track the past coordinates of each firework to create a trail effect, increase the coordinate count to create more prominent trails
  this.coordinates = [];
  this.coordinateCount = 3;
  // populate initial coordinate collection with the current coordinates
  while( this.coordinateCount-- ) {
    this.coordinates.push( [ this.x, this.y ] );
  }
  this.angle = Math.atan2( ty - sy, tx - sx );
  this.speed = 2;
  this.acceleration = 1.05;
  this.brightness = random( 50, 70 );
  // circle target indicator radius
  this.targetRadius = 1;
}

// update firework
Firework.prototype.update = function( index ) {
  // remove last item in coordinates array
  this.coordinates.pop();
  // add current coordinates to the start of the array
  this.coordinates.unshift( [ this.x, this.y ] );
  
  // cycle the circle target indicator radius
  if( this.targetRadius < 8 ) {
    this.targetRadius += 0.3;
  } else {
    this.targetRadius = 1;
  }
  
  // speed up the firework
  this.speed *= this.acceleration;
  
  // get the current velocities based on angle and speed
  var vx = Math.cos( this.angle ) * this.speed,
      vy = Math.sin( this.angle ) * this.speed;
  // how far will the firework have traveled with velocities applied?
  this.distanceTraveled = calculateDistance( this.sx, this.sy, this.x + vx, this.y + vy );
  
  // if the distance traveled, including velocities, is greater than the initial distance to the target, then the target has been reached
  if( this.distanceTraveled >= this.distanceToTarget ) {
    createParticles( this.tx, this.ty );
    // remove the firework, use the index passed into the update function to determine which to remove
    fireworks.splice( index, 1 );
  } else {
    // target not reached, keep traveling
    this.x += vx;
    this.y += vy;
  }
}

// draw firework
Firework.prototype.draw = function() {
  ctx.beginPath();
  // move to the last tracked coordinate in the set, then draw a line to the current x and y
  ctx.moveTo( this.coordinates[ this.coordinates.length - 1][ 0 ], this.coordinates[ this.coordinates.length - 1][ 1 ] );
  ctx.lineTo( this.x, this.y );
  ctx.strokeStyle = 'hsl(' + hue + ', 100%, ' + this.brightness + '%)';
  ctx.stroke();
  
  ctx.beginPath();
  // draw the target for this firework with a pulsing circle
  ctx.arc( this.tx, this.ty, this.targetRadius, 0, Math.PI * 2 );
  ctx.stroke();
}

// create particle
function Particle( x, y ) {
  this.x = x;
  this.y = y;
  // track the past coordinates of each particle to create a trail effect, increase the coordinate count to create more prominent trails
  this.coordinates = [];
  this.coordinateCount = 5;
  while( this.coordinateCount-- ) {
    this.coordinates.push( [ this.x, this.y ] );
  }
  // set a random angle in all possible directions, in radians
  this.angle = random( 0, Math.PI * 2 );
  this.speed = random( 1, 10 );
  // friction will slow the particle down
  this.friction = 0.95;
  // gravity will be applied and pull the particle down
  this.gravity = 1;
  // set the hue to a random number +-50 of the overall hue variable
  this.hue = random( hue - 50, hue + 50 );
  this.brightness = random( 50, 80 );
  this.alpha = 1;
  // set how fast the particle fades out
  this.decay = random( 0.015, 0.03 );
}

// update particle
Particle.prototype.update = function( index ) {
  // remove last item in coordinates array
  this.coordinates.pop();
  // add current coordinates to the start of the array
  this.coordinates.unshift( [ this.x, this.y ] );
  // slow down the particle
  this.speed *= this.friction;
  // apply velocity
  this.x += Math.cos( this.angle ) * this.speed;
  this.y += Math.sin( this.angle ) * this.speed + this.gravity;
  // fade out the particle
  this.alpha -= this.decay;
  
  // remove the particle once the alpha is low enough, based on the passed in index
  if( this.alpha <= this.decay ) {
    particles.splice( index, 1 );
  }
}

// draw particle
Particle.prototype.draw = function() {
  ctx. beginPath();
  // move to the last tracked coordinates in the set, then draw a line to the current x and y
  ctx.moveTo( this.coordinates[ this.coordinates.length - 1 ][ 0 ], this.coordinates[ this.coordinates.length - 1 ][ 1 ] );
  ctx.lineTo( this.x, this.y );
  ctx.strokeStyle = 'hsla(' + this.hue + ', 100%, ' + this.brightness + '%, ' + this.alpha + ')';
  ctx.stroke();
}

// create particle group/explosion
function createParticles( x, y ) {
  // increase the particle count for a bigger explosion, beware of the canvas performance hit with the increased particles though
  var particleCount = 30;
  while( particleCount-- ) {
    particles.push( new Particle( x, y ) );
  }
}

// main demo loop
function loop() {
  // this function will run endlessly with requestAnimationFrame
  requestAnimFrame( loop );
  
  // increase the hue to get different colored fireworks over time
  //hue += 0.5;
  
  // create random color
  hue= random(0, 360 );
  
  // normally, clearRect() would be used to clear the canvas
  // we want to create a trailing effect though
  // setting the composite operation to destination-out will allow us to clear the canvas at a specific opacity, rather than wiping it entirely
  ctx.globalCompositeOperation = 'destination-out';
  // decrease the alpha property to create more prominent trails
  ctx.fillStyle = 'rgba(0, 0, 0, 0.5)';
  ctx.fillRect( 0, 0, cw, ch );
  // change the composite operation back to our main mode
  // lighter creates bright highlight points as the fireworks and particles overlap each other
  ctx.globalCompositeOperation = 'lighter';
  
  // loop over each firework, draw it, update it
  var i = fireworks.length;
  while( i-- ) {
    fireworks[ i ].draw();
    fireworks[ i ].update( i );
  }
  
  // loop over each particle, draw it, update it
  var i = particles.length;
  while( i-- ) {
    particles[ i ].draw();
    particles[ i ].update( i );
  }
  
  // launch fireworks automatically to random coordinates, when the mouse isn't down
  if( timerTick >= timerTotal ) {
    if( !mousedown ) {
      // start the firework at the bottom middle of the screen, then set the random target coordinates, the random y coordinates will be set within the range of the top half of the screen
      fireworks.push( new Firework( cw / 2, ch, random( 0, cw ), random( 0, ch / 2 ) ) );
      timerTick = 0;
    }
  } else {
    timerTick++;
  }
  
  // limit the rate at which fireworks get launched when mouse is down
  if( limiterTick >= limiterTotal ) {
    if( mousedown ) {
      // start the firework at the bottom middle of the screen, then set the current mouse coordinates as the target
      fireworks.push( new Firework( cw / 2, ch, mx, my ) );
      limiterTick = 0;
    }
  } else {
    limiterTick++;
  }
}

// mouse event bindings
// update the mouse coordinates on mousemove
canvas.addEventListener( 'mousemove', function( e ) {
  mx = e.pageX - canvas.offsetLeft;
  my = e.pageY - canvas.offsetTop;
});

// toggle mousedown state and prevent canvas from being selected
canvas.addEventListener( 'mousedown', function( e ) {
  e.preventDefault();
  mousedown = true;
});

canvas.addEventListener( 'mouseup', function( e ) {
  e.preventDefault();
  mousedown = false;
});

// once the window loads, we are ready for some fireworks!
//--------------------------fin fireworks-----------------------//
  </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
<?php   
}else{
  echo "<a id='entree' href='yoda.php'><div class='bouton'><img src='img/yoda2.png'><br>Pour entrer, passez par yoda</div>";
 }
?>