var geom_count = 0;
var elec_count = 0;
var alg_count = 0;
var light_count = 0;
var metals_nonmetals_count = 0;
var circles_count = 0;
var coal_petro_count = 0;
var selected_topics = 0;

/*Code for moving bubbles randomly around the screen*/
$(document).ready(function(){
  $('.moving').each(function() {
    animateDiv(this.id);
  });
});

function makeNewPosition(){

  // Get viewport dimensions (remove the dimension of the div)
  var h = $(window).height() - 150;
  var w = $(window).width() - 150;

  var nh = 140 + Math.floor(Math.random() * h);
  var nw = Math.floor(Math.random() * w);

  return [nh,nw];

}

function animateDiv(targetid){
  var $target = $('#' + targetid);
  var newq = makeNewPosition();
  var oldq = $target.offset();
  var speed = calcSpeed([oldq.top, oldq.left], newq);

  $('#' + targetid).animate({ top: newq[0], left: newq[1] }, speed, function(){
    animateDiv(targetid);
  });

}

function calcSpeed(prev, next) {

  var x = Math.abs(prev[1] - next[1]);
  var y = Math.abs(prev[0] - next[0]);

  var greatest = x > y ? x : y;

  var speedModifier = 0.02;

  var speed = Math.ceil(greatest/speedModifier);

  return speed;

}

/*Code to modify the bubbles when clicked*/

$('#a').click(function() {
  $(this).blur();
  $(this).toggleClass("selected-bubble");
  geom_count++;
  geom_count % 2 == 0 ? geom_count = 0 : geom_count = 1;
  $('#geom-counter').val(geom_count);
  buttonClicks();
})

$('#b').click(function() {
  $(this).blur();
  $(this).toggleClass("selected-bubble");
  elec_count++;
  elec_count % 2 == 0 ? elec_count = 0 : elec_count = 1;
  $('#elec-counter').val(elec_count);
  buttonClicks();
})

$('#c').click(function() {
  $(this).blur();
  $(this).toggleClass("selected-bubble");
  alg_count++;
  alg_count % 2 == 0 ? alg_count = 0 : alg_count = 1;
  $('#alg-counter').val(alg_count);
  buttonClicks();
})

$('#d').click(function() {
  $(this).blur();
  $(this).toggleClass("selected-bubble");
  light_count++;
  light_count % 2 == 0 ? light_count = 0 : light_count = 1;
  $('#light-counter').val(light_count);
  buttonClicks();
})

$('#e').click(function() {
  $(this).blur();
  $(this).toggleClass("selected-bubble");
  metals_nonmetals_count++;
  metals_nonmetals_count % 2 == 0 ? metals_nonmetals_count = 0 : metals_nonmetals_count = 1;
  $('#metals-nonmetals-counter').val(metals_nonmetals_count);
  buttonClicks();
})

$('#f').click(function() {
  $(this).blur();
  $(this).toggleClass("selected-bubble");
  circles_count++;
  circles_count % 2 == 0 ? circles_count = 0 : circles_count = 1;
  $('#circles-counter').val(circles_count);
  buttonClicks();
})

$('#g').click(function() {
  $(this).blur();
  $(this).toggleClass("selected-bubble");
  coal_petro_count++;
  coal_petro_count % 2 == 0 ? coal_petro_count = 0 : coal_petro_count = 1;
  $('#coal-petro-counter').val(coal_petro_count);
  buttonClicks();
})

/*Code to modify the bubbles when clicked ENDS*/

/*Code to change the header at the top of the page */
function buttonClicks() {
  selected_topics = geom_count + elec_count + alg_count + light_count + metals_nonmetals_count + circles_count + coal_petro_count;
  if (selected_topics == 0) {
    $('#feedback-text').html("This will help us in providing feedback suited specifically for you.");
  } else if (selected_topics == 1) {
    $('#feedback-text').html("Select 2 more.");
  } else if (selected_topics == 2) {
    $('#feedback-text').html("Nearly done! Choose 1 more.");
  } else if (selected_topics > 2) {
    $('#feedback-text').html("");
    $('#feedback-text').append("<input type='submit' name='interests-selected' class='proceed-button' value='CONTINUE >>' />");
  }
}
