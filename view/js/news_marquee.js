$(function(){
$('div.inner_area marquee').marquee('smooth_m').mouseover(function () {
  $(this).trigger('stop');
}).mouseout(function () {
  $(this).trigger('start');
}).mousemove(function (event) {
  if ($(this).data('drag') == true) {
    this.scrollLeft = $(this).data('scrollX') + ($(this).data('x') - event.clientX);
  }
}).mousedown(function (event) {
  $(this).data('drag', true).data('x', event.clientX).data('scrollX', this.scrollLeft);
}).mouseup(function () {
  $(this).data('drag', false);
});
});
