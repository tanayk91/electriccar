var allIncomingDivs = [];
var div_click_count = 0;

/*Code to modify check mark and border*/
$('#nicd-div').click(function() {
  $('#nicd-radio').toggleClass("green-radio");
  $(this).toggleClass("green-border-div");

  if ($('#nicd-batt').val() == "first-unselected") {
    $('#nicd-batt').val("first-selected");
  } else {
    $('#nicd-batt').val("first-unselected");
  }
  //disable clicking events on all other divs
  div_click_count++;
  if (div_click_count % 2 != 0) {
    $('#nimh-div').css("pointer-events","none");
    $('#lead-acid-div').css("pointer-events","none");
    $('#li-ion-div').css("pointer-events","none");
    $('#li-ion-poly-div').css("pointer-events","none");
  } else {
    $('#nimh-div').css("pointer-events","auto");
    $('#lead-acid-div').css("pointer-events","auto");
    $('#li-ion-div').css("pointer-events","auto");
    $('#li-ion-poly-div').css("pointer-events","auto");
  }
});

$('#nimh-div').click(function() {
  $('#nimh-radio').toggleClass("green-radio");
  $(this).toggleClass("green-border-div");

  if ($('#nimh-batt').val() == "second-unselected") {
    $('#nimh-batt').val("second-selected");
  } else {
    $('#nimh-batt').val("second-unselected");
  }
  //disable clicking events on all other divs
  div_click_count++;
  if (div_click_count % 2 != 0) {
    $('#nicd-div').css("pointer-events","none");
    $('#lead-acid-div').css("pointer-events","none");
    $('#li-ion-div').css("pointer-events","none");
    $('#li-ion-poly-div').css("pointer-events","none");
  } else {
    $('#nicd-div').css("pointer-events","auto");
    $('#lead-acid-div').css("pointer-events","auto");
    $('#li-ion-div').css("pointer-events","auto");
    $('#li-ion-poly-div').css("pointer-events","auto");
  }
});

$('#lead-acid-div').click(function() {
  $('#lead-acid-radio').toggleClass("green-radio");
  $(this).toggleClass("green-border-div");

  if ($('#lead-acid-batt').val() == "third-unselected") {
    $('#lead-acid-batt').val("third-selected");
  } else {
    $('#lead-acid-batt').val("third-unselected");
  }
  //disable clicking events on all other divs
  div_click_count++;
  if (div_click_count % 2 != 0) {
    $('#nicd-div').css("pointer-events","none");
    $('#nimh-div').css("pointer-events","none");
    $('#li-ion-div').css("pointer-events","none");
    $('#li-ion-poly-div').css("pointer-events","none");
  } else {
    $('#nicd-div').css("pointer-events","auto");
    $('#nimh-div').css("pointer-events","auto");
    $('#li-ion-div').css("pointer-events","auto");
    $('#li-ion-poly-div').css("pointer-events","auto");
  }
});

$('#li-ion-div').click(function() {
  $('#li-ion-radio').toggleClass("green-radio");
  $(this).toggleClass("green-border-div");

  if ($('#li-ion-batt').val() == "fourth-unselected") {
    $('#li-ion-batt').val("fourth-selected");
  } else {
    $('#li-ion-batt').val("fourth-unselected");
  }
  //disable clicking events on all other divs
  div_click_count++;
  if (div_click_count % 2 != 0) {
    $('#nicd-div').css("pointer-events","none");
    $('#nimh-div').css("pointer-events","none");
    $('#lead-acid-div').css("pointer-events","none");
    $('#li-ion-poly-div').css("pointer-events","none");
  } else {
    $('#nicd-div').css("pointer-events","auto");
    $('#nimh-div').css("pointer-events","auto");
    $('#lead-acid-div').css("pointer-events","auto");
    $('#li-ion-poly-div').css("pointer-events","auto");
  }
});

$('#li-ion-poly-div').click(function() {
  $('#li-ion-poly-radio').toggleClass("green-radio");
  $(this).toggleClass("green-border-div");

  if ($('#li-ion-poly-batt').val() == "fifth-unselected") {
    $('#li-ion-poly-batt').val("fifth-selected");
  } else {
    $('#li-ion-poly-batt').val("fifth-unselected");
  }
  //disable clicking events on all other divs
  div_click_count++;
  if (div_click_count % 2 != 0) {
    $('#nicd-div').css("pointer-events","none");
    $('#nimh-div').css("pointer-events","none");
    $('#lead-acid-div').css("pointer-events","none");
    $('#li-ion-div').css("pointer-events","none");
  } else {
    $('#nicd-div').css("pointer-events","auto");
    $('#nimh-div').css("pointer-events","auto");
    $('#lead-acid-div').css("pointer-events","auto");
    $('#li-ion-div').css("pointer-events","auto");
  }
});
