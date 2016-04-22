$('.toggle').click(function(e) {
  var toggle = this;
  
  e.preventDefault();
  
  $(toggle).toggleClass('toggle--on')
         .toggleClass('toggle--off')
         .addClass('toggle--moving');
  
  setTimeout(function() {
    $(toggle).removeClass('toggle--moving');
  }, 200)
});