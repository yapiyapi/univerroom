
$(function () {
    var $likeBtn = $(".icon.heart");
    var liked = $(".left_area");

    $likeBtn.click(function () {
    $likeBtn.toggleClass("active");

    if ($likeBtn.hasClass("active")) {
        $(this).find("img").attr({
            src: "https://cdn-icons-png.flaticon.com/512/803/803087.png"
        });
    } else {
        $(this).find("i").removeClass("fas").addClass("far");
        $(this).find("img").attr({
        src: "https://cdn-icons-png.flaticon.com/512/812/812327.png"
        });
    }
    });
}); 

function test(){
  var result ='<?php php_func(); ?>';
  $.ajax({url:"../html/post.php", success:function(result){
    var a = $(".left_area").val();
    $(".left_area").text(a);}
})
} 