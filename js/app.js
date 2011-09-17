$(document).ready(function() {
// Clears default form values when clicked
    jQuery.fn.cleardefault = function() {
    return this.focus(function() {
      if( this.value == this.defaultValue ) {
        this.value = "";
      }
    }).blur(function() {
      if( !this.value.length ) {
        this.value = this.defaultValue;
      }
    });
  };
  $(".clearit input, .clearit textarea, .clearit").cleardefault();
});

$(function() {
	$("ul.navi").tabs("div#slides > div.slide", {
	  effect: 'fade',
	  fadeInSpeed: 1000,
	  });
});

$(function() {

	// prosses slides
	$(".scrollable").scrollable();

});