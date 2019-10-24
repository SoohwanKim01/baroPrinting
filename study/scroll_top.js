var topEle = $('#topBtn');
var delay = 1000;
topEle.on('click', function() {
    $('html, body').stop().animate({scrollTop: 0}, delay);
});