$(document).ready(function(){
$('.alx').delay(3000).slideUp();

 $(".media").slice(0, 5).show();
    $("#loadMore").on('click', function (e) {
        e.preventDefault();
        $(".media:hidden").slice(0, 4).slideDown();
        if ($(".media:hidden").length == 0) {
            $("#load").fadeOut('slow');
        }
        $('html,body').animate({
            scrollTop: $(this).offset().top
        }, 1500);
    });
    
});