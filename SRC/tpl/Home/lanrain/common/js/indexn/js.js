/**
 * Created by Administrator on 14-7-22.
 */
$(function () {
    //第一块
    $(".ne_one li:first").css({ "background": "none" });
    $(".ne_one li").hover(function () {
        $(this).stop(true, true).animate({ "margin-top": "-5px" });
    }, function () {
        $(this).stop(true, true).animate({ "margin-top": "0px" });
    });

    //热门产品
    $(".two_c li:last").css({ "padding-right": "0px" });
    $(".two_c li").hover(function () {
        $(this).stop(true, true).animate({ "margin-top": "-8px" });
    }, function () {
        $(this).stop(true, true).animate({ "margin-top": "0px" });
    });

    //专家团队
    $(".eight_u li").live({
        mouseenter:
            function () {
                $(this).stop(true, true).animate({ "margin-top": "-5px" });
            },
        mouseleave:
            function () {
                $(this).stop(true, true).animate({ "margin-top": "0px" });
            }
    });
});
$(function () {

    //navigation 下拉菜单
    $(".navigation span").hover(function () {
        var czlen = $(this).find(".nav_ul a").length;
        var czhei = czlen * 40;
        $(this).find('.nav_ul').stop().show().animate({ height: czhei }, 500);
    }, function () {
        $(this).find('.nav_ul').stop().animate({ height: 0 }, 500, function () { $(this).hide() });
    });

    //doctor
    $(".doctor").hover(function () {
        var czlen = $(this).find(".doctor_ul a").length;
        var czhei = czlen * 77;
        $(this).find('.doctor_ul').stop().show().animate({ height: czhei }, 500);
    }, function () {
        $(this).find('.doctor_ul').stop().animate({ height: 0 }, 500, function () { $(this).hide() });
    });

    //选择我们的企业、选择我们的企业家
    $(".choice_head span").click(function () {
        var index = $(this).index();
        $(".choice_head span").removeClass("hover").eq(index).addClass("hover");
        $(".business").hide().eq(index).show();
    });
    $(".choice_head1 span").click(function () {
        var index = $(this).index();
        $(".choice_head1 span").removeClass("hover").eq(index).addClass("hover");
        $(".ganyuan").hide().eq(index).show();
    });

    //荣誉资质、关于我们
    $(".hon_abo_head span").click(function () {
        var index = $(this).index();
        $(".hon_abo_head span").removeClass("hover").eq(index).addClass("hover");
        $(".honor_whole").hide().eq(index).show();
    });

    //新闻资讯、健康知识
    $(".new_heal_head span").click(function () {
        var index = $(this).index();
        $(".new_heal_head span").removeClass("hover").eq(index).addClass("hover");
        $(".cms_5").hide().eq(index).show();
    });


    //优质资源文字说明上浮
    $(".resource_k").live({
        mouseenter:
            function () {
                $(this).find(".opa").stop().animate({ top: "-44px" });
            },
        mouseleave:
            function () {
                $(this).find(".opa").stop().animate({ top: "1px" });
            }
    });

    //国康会员健康中心说明文字上浮
    $(".resource_five1_one").live({
        mouseenter:
            function () {
                $(this).find(".opa").stop().animate({ top: "-50px" });
            },
        mouseleave:
            function () {
                $(this).find(".opa").stop().animate({ top: "1px" });
            }
    });
    $(".resource_five1_two").live({
        mouseenter:
            function () {
                $(this).find(".opa").stop().animate({ top: "-50px" });
            },
        mouseleave:
            function () {
                $(this).find(".opa").stop().animate({ top: "1px" });
            }
    });
    $(".resource_five2").live({
        mouseenter:
            function () {
                $(this).find(".opa").stop().animate({ top: "-60px" });
            },
        mouseleave:
            function () {
                $(this).find(".opa").stop().animate({ top: "1px" });
            }
    });
    $(".resource_five3").live({
        mouseenter:
            function () {
                $(this).find(".opa").stop().animate({ top: "-50px" });
            },
        mouseleave:
            function () {
                $(this).find(".opa").stop().animate({ top: "1px" });
            }
    });

    //帮助中心
    $(".help_serv").click(function () {
        //        $(".help_serv").removeClass("hover").next().hide();
        //        $(this).addClass("hover").next().slideDown(1000);
        //        return false;
        $(this).next(".help_servic").slideToggle(1000);
    });

    //人力资源
    $(".bo").click(function () {
        $(".bo").removeClass("cz_current").next().hide();
        $(this).addClass("cz_current").next().slideDown(800);

        return false;
    });

    //关于我们展开收缩块
    //    $(".about_banner1").click(function() {
    //        $(".about_banner1_zhan").show(50);
    //		$(".about_banner1").hide();
    //    });
    $(".about_banner1_zhan").hover(function () {
      
            $(this).animate({ "height": "190px", "margin-top": "-140px" });
            if ($(this).find(".about_banner1_zhan_ri").hasClass("jia")) {
                $(this).find(".about_banner1_zhan_ri").removeClass("jia").addClass("jian");
            }
            else {
                $(this).find(".about_banner1_zhan_ri").addClass("jian");
            }
            //        $(this).animate({"height":"50px","margin-top":"0"});
        
    }, function () {
        $(this).animate({ "height": "50px", "margin-top": "0px" });
        if ($(this).find(".about_banner1_zhan_ri").hasClass("jian")) {
            $(this).find(".about_banner1_zhan_ri").removeClass("jian").addClass("jia");
        }
        else {
            $(this).find(".about_banner1_zhan_ri").addClass("jia");
        }
    });


    //关于我们左边栏目
    $(".about_co").hover(function () {
        $(".about_co").next().hide();
        $(".about_cont_left2_ct:first").hide();
        $(this).next().slideDown(300);
    }, function () {
        $(".about_cont_left2_ct:first").hide();
    });
    $(".about_cont_left1").hover(function () {
        $(".about_co").next().hide();
        $(".about_cont_left2_ct:first").slideDown(300);
    })

    //客服
    $(window).scroll(function () {
        var h_num = $(window).scrollTop();
        if (h_num > 93) {
            $('.custom_service').addClass('fixer');


        } else {
            $('.custom_service').removeClass('fixer');
        }
    });

    //    返回顶部
    function backtop() {
        var backtop = $("<a class='a_3'></a>")
        $("body").append(backtop);

        var fn = function () {
            $('html,body').animate({
                scrollTop: '0px'
            }, 1000);
            return false;
        }
        $('.a_3').bind('click', fn);
    }
    backtop();

    $(".custom_close").click(function () {
        $(".custom_service").css("display", "none");
    });

});



