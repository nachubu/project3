// $(document).ready(function() {
//     $(".tabs-menu a").click(function(event) {
//         event.preventDefault();
//         $(this).parent().addClass("current");
//         $(this).parent().siblings().removeClass("current");
//         var tab = $(this).attr("href");
//         $(".tab-content").not(tab).css("display", "none");
//         $(tab).fadeIn();
//     });
// });

//working piece of code
$(document).ready(function() {
    $(".nav a").click(function(event) {
        event.preventDefault();
        $(this).parent().addClass("current");
        $(this).parent().siblings().removeClass("current");
        var tab = $(this).attr("href");
        $(".tab-content").not(tab).css("display", "none");
        $(tab).fadeIn();
    });
});

// $(document).ready(function() {
//     $(".nav a").click(function(event) {
//         event.preventDefault();
//         $(this).parent().addClass("current");
//         $(this).parent().siblings().removeClass("current");
//         // var tab = $(this).attr("href");
//         $('#page-wrapper').load('fragment.html');
//         // $(".tab-content").not(tab).css("display", "none");
//         // $(tab).fadeIn();
//     });
// });
