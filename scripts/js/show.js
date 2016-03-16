function doShow() {

    var slides = $('#show img');
    var active = slides.filter(':visible');
    var next =  active.next().length ? active.next() : slides.first();

    
    active.fadeOut(2000);
    $('#show').animate({
        width: next.width()
        }, 2000);
    next.fadeIn(2000).offset($('#show img.active').offset());
    active.removeClass('active');
    next.addClass('active');
    
}
$(document).ready(function(){
    $('#show').width(334);
    $('#show img:first-child').offset({left: $('#show').offset().left, top: $('#show').offset().top});
    
    setInterval(doShow, 5000);
});
