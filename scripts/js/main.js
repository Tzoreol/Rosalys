function doShow() {

    var slides = $('#show img');
    var active = slides.filter(':visible');
    var next =  active.next().length ? active.next() : slides.first();

    var showWidth = $('#show').width();
    var nextWidth = next.width();
    active.fadeOut(2000);
    next.fadeIn(2000).offset({left: $('#show').offset().left +(showWidth-nextWidth)/2, top: $('#show').offset().top});
}
$(document).ready(function(){
    var showWidth = $('#show').width();
    var imgWidth = $('#show img').width();
    $('#show img').offset({left: $('#show').offset().left +(showWidth-imgWidth)/2, top: $('#show').offset().top});
    setInterval(doShow, 5000);
});
