$(document).ready(function () {
    $(".change_baneer_valid").hide();
    $(".conteneur_img_profile").hover(function () {
        $(".change_baneer").animate({
            height: "20px",
            padding: "10px 0"
        });
        $(".change_baneer p").css("display", "inline-block");
    }, function () {
        $(".change_baneer").animate({
            height: "0",
            padding: "0"
        });
//        $(".change_baneer_valid").hide();
        $(".change_baneer p").hide("slow");
    });
    var clicks = 0;
    $(".change_baneer").click(function (e) {
        if (clicks === 0) {
            e.preventDefault();
            clicks++;
            $(".change_baneer_valid").show("slow");
            $("#bg_image_profile").trigger("click");
        } else {
            clicks--;
            $(".change_baneer_valid").hide("slow");
        }
    });
    $(".change_baneer_valid").click(function () {
        $(".form_bg_profile").submit();
    });
    $(".range_bg").change(function () {
        $(".overlay_conteneur_profile").css({
            display: "block",
            width: 0
        });
        $(".conteneur_img_profile").css({
            background: "url(" + $(".bg_conteneur_img_profile_val").val() + ")",
            'background-position-x': "100%"

        }).animate({
            'background-position-y': $(".range_bg").val() + '%'
        }, 2000);
        $.ajax({
            url: "userprofile/changebackground",
            type: "GET",
            data: {
                bg_pos_y: $(".range_bg").val()
            },
            complete: function () {
                $(".overlay_conteneur_profile").animate({
                    width: "100%"
                }, 2000).fadeOut();
            }
        });
    });
    if ($(".mot_de_passe_invalide_profile").val() == 0) {
        $(".image_mot_de_passe_invalide_profile_0").show("slow");
        $(".message_mot_de_passe_invalide_profile_0").show("slow");
    }
    if ($('.new_mdp_conf_new_mdp_not_equal').val() == 1) {
        $(".image_mot_de_passe_invalide_profile_1").show("slow");
        $(".message_mot_de_passe_invalide_profile_1").show("slow");
    }

    $(".mes_livres").click(function () {
        var post_id = readCookie("cookie_users");

        $.ajax({
            url: "livres/modifierlivres",
            type: "GET",
            data: {
                profile_livre: post_id
            },
            complete: function () {
                console.log(post_id);
                location.href = this.url;
            }
        });
    });
    var clicks = 0;
    $(".cadre_img_profile").click(function (e) {
        if (clicks == 0) {
            e.preventDefault();
            $(this).animate({
                width: "500px",
                height: "500px"
            }, 500);
            $(".header_img").css({
                height: "500px"
            });
            $(".nom_profile").css({
                height: "50px",
                "font-size": "22px"
            });
            $(".nom_profile span").css({
                transform: "translateY(-50%) translateX(-50%)",
                position: "absolute",
                top: "50%"
            });
            clicks++;
        } else {
            $(this).animate({
                width: "7%",
                height: "100px"
            }, 1000);
            $(".header_img").animate({
                height: "100px"
            }, 1000);
            $(".nom_profile").css({
                height: "auto",
                "font-size": "16px"
            });
            $(".nom_profile span").css({
                transform: "",
                position: "",
                top: ""
            });
            clicks--;
        }
    });
});