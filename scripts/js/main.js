function doShow() {

    var slides = $('#show img');
    var active = slides.filter(':visible');
    var next =  active.next().length ? active.next() : slides.first();

    var showWidth = $('#show').width();
    var nextWidth = next.width();
    active.fadeOut(2000);
    next.fadeIn(2000).offset({left: $('#show').offset().left +(showWidth-nextWidth)/2, top: $('#show').offset().top});
    $('#show').width(next.width());
}
$(document).ready(function(){
    $('#show').width(334);
    $('#show img:first-child').offset({left: $('#show').offset().left, top: $('#show').offset().top});
    
    setInterval(doShow, 5000);
});
