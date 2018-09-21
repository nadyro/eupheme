/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {
//    $(".containers").each(function(){
//       $(this).click(function(){
//           $(this).css({
//            position: "absolute"
//        }).animate({
//            right: 0
//        }, 1000);
//       });
//    });
$(".img_profile_post").click(function(){
   var post_id = $(this).attr("post-id");
        viewProfile(post_id);
});
    var clicks = 0;
    var clicks_books = 0;
    $(".whatsuponeupheme").click(function () {
        if (clicks == 0) {
            $(".un_post").show();
            clicks++;
        }
        else {
            $(".un_post").hide();
            clicks--;
        }
//      $(".un_livre").hide();
    });
    $(".added_books").click(function () {
        if (clicks_books == 0) {
            $(".container_posts").css({
                position: "absolute",
                left:''
            }).animate({
                right: 0
            }, 1000);
                $(".un_livre").show(700);
            clicks_books++;
        } else {
            $(".un_livre").hide();
            $(".container_posts").css({
//                position: "absolute",
                right:''
            }).animate({
                left: 0
            }, 1000);
            clicks_books--;
        }
    });
});

