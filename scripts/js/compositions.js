$(document).ready(function() {
    $('html,body').scrollTop(0);
    
    var plaisirDoffrirPosition = $('#plaisir_doffrir').offset().top;
    var anniversairePosition = $('#anniversaire').offset().top;
    var deuilPosition = $('#deuil').offset().top;
    var mariagePosition = $('#mariage').offset().top;
    var seminairesPosition = $('#seminaires').offset().top;
    
   $('span[name="plaisir_doffrir"]').addClass('active');
    
    $('.thumbnail').click(function() {
        var src = $(this).attr('src');
        $('#fade img').attr('src', src);
        $('#fade img').css('opacity',0);
         
       $('#fade').fadeIn('slow', function() {
        var maxH = $(window).height() * .8;
        var h = $('#fade img').height();
        var w = $('#fade img').width();
        
        var height = ((h*1000)/w) <= maxH ? ((h*1000)/w) : maxH;
        var width = (height== maxH) ? ((w*height)/h) : 1000;
        
        $('#fade img').height(1);
        $('#fade img').height(1);
        $('#fade img').css('opacity',1);
 
          $('#fade img').animate({
              width: width,
              left: ($(window).width()/2) - (width/2)
          },
          1000,
          function() {
               $('#fade img').animate({
              height: height,
              top: ($(window).height()/2) - (height/2)
          },
          1000);
          });
       });
   });
   
   $('span[name="plaisir_doffrir"]').click(function() {
       $('span.active').removeClass('active');
       $(this).addClass('active');
       
       $('html,body').animate({
           scrollTop: 0
       }, 'slow');
   })
   
   $('span[name="anniversaire"]').click(function() {
       $('span.active').removeClass('active');
       $(this).addClass('active');
       
       
       if($('html,body').scrollTop() < anniversairePosition) {
       $('html,body').animate({
           scrollTop: anniversairePosition - $('header').height()
       }, 'slow');
       }
   })
   
   $('span[name="deuil"]').click(function() {
       $('span.active').removeClass('active');
       $(this).addClass('active');
       
       
       if($('html,body').scrollTop() < deuilPosition) {
       $('html,body').animate({
           scrollTop: deuilPosition - $('header').height()
       }, 'slow');
       }
   })
   
   $('span[name="mariage"]').click(function() {
       $('span.active').removeClass('active');
       $(this).addClass('active');
       
       
       if($('html,body').scrollTop() < mariagePosition) {
       $('html,body').animate({
           scrollTop: mariagePosition - $('header').height()
       }, 'slow');
       }
   })
   
   $('span[name="seminaires"]').click(function() {
       $('span.active').removeClass('active');
       $(this).addClass('active');
       
       
       if($('html,body').scrollTop() < seminairesPosition) {
       $('html,body').animate({
           scrollTop: seminairesPosition - $('header').height()
       }, 'slow');
       }
   })
});