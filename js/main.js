
//Navigation  
  var responsiveWidth = 990;
var _widthResize;

$(window).resize(function() {
    _widthResize = $(this).width() > responsiveWidth;
}).resize();

$('.navBox >ul >li').hover(function(){
  if(_widthResize){
    var _this = $(this);
    _this.addClass('active').children('.dropNav').stop(true, true).slideDown(300);        
  }  
} , function(){
  if(_widthResize){
    $(this).removeClass('active').children('.dropNav').stop(true, true).hide();
  }   
});

$('.dropNav').parent('li').click(function(e) {
  if(!_widthResize){
    $(this).children('.dropNav').stop(true, true).slideToggle(300);
    e.preventDefault();
  }    
});

(function($){
  $.fn.extend({

    sideNav : function(){
      if( $('.pageslideBg').length == 0 ) {
            $('<div />').attr( 'class', 'pageslideBg' ).appendTo( $('body') );      
        }
        var $btn = $(this),
          $pageslide = $($btn.attr("href")),
        $pageslideBg = $('.pageslideBg'),
        _width = $pageslide.width();
      $btn.click(function(){
        $pageslideBg.show();
        $pageslide.css({ 'display':'block'}).animate({'left':0 });
        return false;
      });
      $pageslideBg.click(function() {
        $(this).hide();
        $pageslide.animate({'left': _width*-1 + 'px' },function(){
          $(this).hide();
        });
        return false;
      });

      return this;
    }

  });
})(jQuery);

$("#openPageslide").sideNav();


//Slider
jQuery(document).ready(function ($) {

      setInterval(function () {
        moveRight();
    }, 3000);
  
  var slideCount = $('#slider ul li').length;
  var slideWidth = $('#slider ul li').width();
  var slideHeight = $('#slider ul li').height();
  var sliderUlWidth = slideCount * slideWidth;
  
  $('#slider').css({ width: slideWidth, height: slideHeight });
  
  $('#slider ul').css({ width: sliderUlWidth, marginLeft: - slideWidth });
  
    $('#slider ul li:last-child').prependTo('#slider ul');

    function moveLeft() {
        $('#slider ul').animate({
            left: + slideWidth
        }, 200, function () {
            $('#slider ul li:last-child').prependTo('#slider ul');
            $('#slider ul').css('left', '');
        });
    };

    function moveRight() {
        $('#slider ul').animate({
            left: - slideWidth
        }, 200, function () {
            $('#slider ul li:first-child').appendTo('#slider ul');
            $('#slider ul').css('left', '');
        });
    };

    $('a.control_prev').click(function () {
        moveLeft();
    });

    $('a.control_next').click(function () {
        moveRight();
    });

});